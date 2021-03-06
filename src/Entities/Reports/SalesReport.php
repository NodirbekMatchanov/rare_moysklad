<?php

namespace rare\mysklad\Entities\Reports;

use rare\mysklad\Components\Specs\QuerySpecs\Reports\SalesReportQuerySpecs;
use rare\mysklad\MoySklad;

class SalesReport extends AbstractReport  {
    public static $reportName = 'sales';

    public static function byProduct(MoySklad $sklad, SalesReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'byproduct', $specs);
    }

    public static function byVariant(MoySklad $sklad, SalesReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'byvariant', $specs);
    }

    public static function byEmployee(MoySklad $sklad, SalesReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'byemployee', $specs);
    }

    public static function byCounterparty(MoySklad $sklad, SalesReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'bycounterparty', $specs);
    }
}
