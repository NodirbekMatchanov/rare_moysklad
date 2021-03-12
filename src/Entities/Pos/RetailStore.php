<?php

namespace rare\mysklad\Entities\Pos;

use rare\mysklad\Components\Http\RequestConfig;
use rare\mysklad\Interfaces\DoesNotSupportMutationInterface;
use rare\mysklad\Registers\ApiUrlRegistry;

class RetailStore extends PosEntity implements DoesNotSupportMutationInterface{
    public static $entityName = 'retailstore';

    public static function boot()
    {
        parent::boot();
        static::$customQueryUrl = ApiUrlRegistry::instance()->getPosRetailStoreQueryUrl();
    }

    /**
     * @return \stdClass
     * @throws \Throwable
     */
    public function getAuthToken(){
        return $this->getSkladInstance()->getClient()->post(
            ApiUrlRegistry::instance()->getPosAttachTokenUrl($this->id),
            null,
            new RequestConfig([
                "usePosApi" => true
            ])
        )->token;
    }
}
