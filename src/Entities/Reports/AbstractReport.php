<?php

namespace rare\mysklad\Entities\Reports;

use rare\mysklad\Components\Specs\EmptySpecs;
use rare\mysklad\Components\Specs\QuerySpecs\QuerySpecs;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Interfaces\DoesNotSupportMutationInterface;
use rare\mysklad\MoySklad;
use rare\mysklad\Registers\ApiUrlRegistry;

abstract class AbstractReport extends AbstractEntity implements DoesNotSupportMutationInterface {
    public static $entityName = 'report';
    public static $reportName = 'a_report';

    /**
     * @param MoySklad $sklad
     * @param null $param
     * @param QuerySpecs|null $specs
     * @return \stdClass
     */
    protected static function queryWithParam(MoySklad $sklad, $param = null, QuerySpecs $specs = null){
        if ( !$specs ) $specs = EmptySpecs::create();
        if ( $param === null ){
            $url = ApiUrlRegistry::instance()->getReportUrl(static::$reportName);
        } else {
            $url = ApiUrlRegistry::instance()->getReportWithParamUrl(static::$reportName, $param);
        }
        return $sklad->getClient()->get($url, $specs->toArray());
    }
}
