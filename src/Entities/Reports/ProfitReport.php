<?php

namespace rare\mysklad\Entities\Reports;

use rare\mysklad\Components\Specs\QuerySpecs\Reports\ProfitReportQuerySpecs;
use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\MoySklad;

class ProfitReport extends AbstractReport  {
    public static $reportName = 'profit';

    public static function byProduct(MoySklad $sklad, ProfitReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'byproduct', $specs);
    }
    public static function byEmployee(MoySklad $sklad, ProfitReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'byemployee', $specs);
    }

}
