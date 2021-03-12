<?php

namespace rare\mysklad\Entities\Reports;

use rare\mysklad\Components\Specs\QuerySpecs\Reports\CounterpartyReportQuerySpecs;
use rare\mysklad\Entities\Counterparty;
use rare\mysklad\MoySklad;

class CounterpartyReport extends AbstractReport  {
    public static $reportName = 'counterparty';

    public static function get(MoySklad $sklad, CounterpartyReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, null, $specs);
    }

    public static function byCounterparty(MoySklad $sklad, Counterparty $counterparty){
        return static::queryWithParam($sklad, $counterparty->getMeta()->getId());
    }
}

