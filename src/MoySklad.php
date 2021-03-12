<?php

namespace MoySklad;

use MoySklad\Components\Http\MoySkladHttpClient;
use MoySklad\Registers\EntityRegistry;

class MoySklad{

    /**
     * @var MoySkladHttpClient
     */
    private $client;

    /**
     * @var string
     */
    private $hashCode;

    /**
     * @var MoySklad[]
     */
    private static $instances = [];

    private function __construct($access_token, $hashCode, $subdomain = "online")
    {
        $this->client = new MoySkladHttpClient($access_token, $subdomain);
        $this->hashCode = $hashCode;
    }

    /**
     * Use it instead of constructor
     * @param $login
     * @param $password
     * @param $posToken
     * @return MoySklad
     */
    public static function getInstance($access_token, $subdomain = "online", $posToken = null){
        $hash = $access_token;
        if ( empty(static::$instances[$hash]) ){
            static::$instances[$hash] = new static($access_token, $hash, $subdomain);
            EntityRegistry::instance()->bootEntities();
        }
        return static::$instances[$hash];
    }

    /**
     * Get instance with given hashcode
     * @param $hashCode
     * @return MoySklad
     */
    public static function findInstanceByHash($hashCode){
        return static::$instances[$hashCode];
    }

    /**
     * We're java now
     * @return string
     */
    public function hashCode(){
        return $this->hashCode;
    }

    /**
     * @return MoySkladHttpClient
     */
    public function getClient(){
        return $this->client;
    }

    public function setToken($access_token){
        $this->client->setToken($access_token);
    }
}
