<?php

namespace rare\mysklad\Components\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use rare\mysklad\Exceptions\ApiResponseException;
use rare\mysklad\Exceptions\PosTokenException;
use rare\mysklad\Exceptions\RequestFailedException;
use rare\mysklad\Exceptions\ResponseParseException;

class MoySkladHttpClient
{
    const
        METHOD_GET = "GET",
        METHOD_POST = "POST",
        METHOD_PUT = "PUT",
        METHOD_DELETE = "DELETE",
        HTTP_CODE_SUCCESS = [200, 201, 307, 303];

    private $preRequestSleepTime = 200;

    private
        $posEndpoint = "https://online.moysklad.ru/api/posap/1.0/",
        $access_token;

    public function __construct($access_token, $subdomain = "online")
    {
        $this->access_token = $access_token;
        $this->endpoint = "https://" . $subdomain . ".moysklad.ru/api/remap/1.2/";
    }

    public function setToken($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @param $method
     * @param array $payload
     * @param null $options
     * @return string
     * @throws \Throwable
     */
    public function get($method, $payload = [], $options = null)
    {
        return $this->makeRequest(
            self::METHOD_GET,
            $method,
            $payload,
            $options
        );
    }

    /**
     * @param $method
     * @param array $payload
     * @param null $options
     * @return string
     * @throws \Throwable
     */
    public function post($method, $payload = [], $options = null)
    {
        return $this->makeRequest(
            self::METHOD_POST,
            $method,
            $payload,
            $options
        );
    }

    /**
     * @param $method
     * @param array $payload
     * @param null $options
     * @return string
     * @throws \Throwable
     */
    public function put($method, $payload = [], $options = null)
    {
        return $this->makeRequest(
            self::METHOD_PUT,
            $method,
            $payload,
            $options
        );
    }

    /**
     * @param $method
     * @param array $payload
     * @param null $options
     * @return string
     * @throws \Throwable
     */
    public function delete($method, $payload = [], $options = null)
    {
        return $this->makeRequest(
            self::METHOD_DELETE,
            $method,
            $payload,
            $options
        );
    }

    /**
     * @param $link
     * @param $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getRaw($link, $options)
    {
        if (empty($options['headers']['Authorization'])) {
            $options['headers']['Authorization'] = "Bearer " . $this->access_token;
        }

        $client = new Client();
        return $client->get($link, $options);
    }

    public function getLastRequest()
    {
        return RequestLog::getLast();
    }

    public function getRequestList()
    {
        return RequestLog::getList();
    }

    public function setPreRequestTimeout($ms)
    {
        $this->preRequestSleepTime = $ms;
    }

    /**
     * @param $requestHttpMethod
     * @param $apiMethod
     * @param array $data
     * @param array $options
     * @return string
     * @throws \Throwable
     */
    private function makeRequest(
        $requestHttpMethod,
        $apiMethod,
        $data = [],
        $options = null
    )
    {
        if (!$options) $options = new RequestConfig();

        $headers = [
            "Authorization" => "Bearer " . $this->access_token
        ];
        $config = [
            "base_uri" => $this->endpoint,
            "headers" => $headers
        ];

        if (!$options->get('followRedirects')) {
            $config['allow_redirects'] = false;
        }

        $jsonRequestsTypes = [
            self::METHOD_POST,
            self::METHOD_PUT,
            self::METHOD_DELETE
        ];
        $requestBody = [];
        if ($options->get('ignoreRequestBody') === false) {
            if ($requestHttpMethod === self::METHOD_GET) {
                $requestBody['query'] = $data;
            } else if (in_array($requestHttpMethod, $jsonRequestsTypes)) {
                $requestBody['json'] = $data;
            }
        }

        $serializedRequest = (
        isset($requestBody['json']) ?
            \json_decode(\json_encode($requestBody['json'])) :
            $requestBody['query']
        );
        $reqLog = [
            "req" => [
                "type" => $requestHttpMethod,
                "method" => $this->endpoint . $apiMethod,
                "body" => $serializedRequest,
                "headers" => $headers
            ]
        ];
        RequestLog::add($reqLog);
        $client = new Client($config);
        try {
            usleep($this->preRequestSleepTime);
            $res = $client->request(
                $requestHttpMethod,
                $apiMethod,
                $requestBody
            );
            if (in_array($res->getStatusCode(), self::HTTP_CODE_SUCCESS)) {
                $reqLog['resHeaders'] = $res->getHeaders();
                if ($requestHttpMethod !== self::METHOD_DELETE) {
                    if (!$options->get('followRedirects')) {
                        RequestLog::replaceLast($reqLog);
                        $location = $res->getHeader('Location');
                        if (isset($location[0])) return $location[0];
                        return "";
                    } else {
                        $result = \json_decode($res->getBody());
                        if (is_null($result) === false) {
                            $reqLog['res'] = $result;
                            RequestLog::replaceLast($reqLog);
                            return $result;
                        } else {
                            throw new ResponseParseException($res);
                        }
                    }
                }
                RequestLog::replaceLast($reqLog);
            } else {
                throw new RequestFailedException($reqLog['req'], $res);
            }
        } catch (\Throwable $e) {
            if ($e instanceof ClientException) {
                $req = $reqLog['req'];
                $res = $e->getResponse()->getBody()->getContents();
                $except = new RequestFailedException($req, $res);
                if ($res = \json_decode($res)) {
                    if (isset($res->errors) || (is_array($res) && isset($res[0]->errors))) {
                        $except = new ApiResponseException($req, $res);
                    }
                }
            } else $except = $e;
            throw $except;
        }
        return null;
    }
}
