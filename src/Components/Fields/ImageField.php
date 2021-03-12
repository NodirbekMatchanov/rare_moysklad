<?php

namespace rare\mysklad\Components\Fields;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use rare\mysklad\Exceptions\InvalidUrlException;

class ImageField extends AbstractFieldAccessor{
    /**
     * @param $url
     * @param null $fileName
     * @return ImageField
     * @throws InvalidUrlException
     */
    public static function createFromUrl($url, $fileName = null){
        if ( filter_var($url, FILTER_VALIDATE_URL) === false ){
            throw new InvalidUrlException($url);
        }
        $image = file_get_contents($url);
        return static::createFromExternal($image, $url, $fileName);
    }

    /**
     * @param $path
     * @param null $fileName
     * @return ImageField
     * @throws \Exception
     */
    public static function createFromPath($path, $fileName = null){
        /*
         * Php will throw if no file exist
         */
        $image = file_get_contents($path);
        return static::createFromExternal($image, $path, $fileName);
    }

    /**
     * @param $imageBinary
     * @param $sourcePath
     * @param $fileName
     * @return static
     */
    private static function createFromExternal($imageBinary, $sourcePath, $fileName){
        if ( !$fileName ){
            $splitSrc = explode('/', $sourcePath);
            $fileName = $splitSrc[count($splitSrc) - 1];
        }
        return new static([
            "filename" => $fileName,
            "content" => base64_encode($imageBinary)
        ]);
    }

    /**
     * @param string $size
     * @return null|string
     */
    public function getDownloadLink($size = 'normal'){
        if ( isset($this->meta->href) && $size === 'normal' ) return $this->meta->href;
        if ( isset($this->miniature->href) && $size === 'miniature' ) return $this->miniature->href;
        if ( isset($this->tiny->href) && $size === 'tiny' ) return $this->tiny->href;
        return null;
    }

    /**
     * @param $saveFile
     * @param string $size
     * @return string
     * @throws \Exception
     */
    public function download($saveFile, $size = 'normal'){
        if ($link = $this->getDownloadLink($size)) {
            $filePath = fopen($saveFile,'w+');
            $client = new Client();

            $response = $this->e->getSkladInstance()->getClient()->getRaw(
                $link, [RequestOptions::SINK => $filePath]
            );

            return $response->getStatusCode();
        }
        throw new \Exception("Image does not have a $size size link. Try to refresh hosting entity");
    }
}
