<?php

namespace rare\mysklad\Components\Specs\QuerySpecs\Reports;


use rare\mysklad\Components\Specs\QuerySpecs\QuerySpecs;

class SalesReportQuerySpecs extends QuerySpecs {
    protected static $cachedDefaultSpecs = null;
    public function getDefaults()
    {
        $res = parent::getDefaults();
        $res['product.id'] = null;
        $res['counterparty.id'] = null;
        $res['organization.id'] = null;
        $res['store.id'] = null;
        $res['project.id'] = null;
        $res['retailStore.id'] = null;
        return $res;
    }
}
