<?php

namespace rare\mysklad\Entities\Pos;

use rare\mysklad\Components\Http\RequestConfig;
use rare\mysklad\Components\Specs\QuerySpecs\QuerySpecs;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\MoySklad;

abstract class PosEntity extends AbstractEntity{
    public static $entityName = "_a_pos";
    protected static $usePosTokenAuth = false;

    public static function query(MoySklad &$skladInstance, QuerySpecs $querySpecs = null)
    {
        $entityQuery = parent::query($skladInstance, $querySpecs);
        $entityQuery->setRequestOptions(new RequestConfig([
            "usePosApi" => true,
            "usePosToken" => static::$usePosTokenAuth,
            "ignoreRequestBody" => true
        ]));
        return $entityQuery;
    }
}
