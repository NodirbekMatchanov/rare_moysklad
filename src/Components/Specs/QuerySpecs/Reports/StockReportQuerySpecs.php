<?php

namespace MoySklad\Components\Specs\QuerySpecs\Reports;


use MoySklad\Components\Specs\QuerySpecs\QuerySpecs;

class StockReportQuerySpecs extends QuerySpecs {
    protected static $cachedDefaultSpecs = null;

    public function getDefaults()
    {
        $res = parent::getDefaults();
        $res['store.id'] = null;
        $res['product.id'] = null;
        $res['consignment.id'] = null;
        $res['variant.id'] = null;
        $res['productFolder.id'] = null;
        $res['search'] = null;
        $res['stockMode'] = null;
        $res['groupBy'] = null;
        $res['moment'] = null;
        $res['characteristics'] = null;
        $res['includeRelated'] = null;
        $res['operation.id'] = null;
        return $res;
    }
}
