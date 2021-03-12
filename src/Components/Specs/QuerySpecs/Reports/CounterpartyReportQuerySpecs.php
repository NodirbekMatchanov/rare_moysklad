<?php

namespace rare\mysklad\Components\Specs\QuerySpecs\Reports;


use rare\mysklad\Components\Specs\QuerySpecs\QuerySpecs;

class CounterpartyReportQuerySpecs extends QuerySpecs {
    protected static $cachedDefaultSpecs = null;

    public function getDefaults()
    {
        $res = parent::getDefaults();
        $res['id'] = null;
        return $res;
    }


}
