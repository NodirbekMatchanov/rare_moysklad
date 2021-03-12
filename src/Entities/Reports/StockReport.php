<?php

namespace rare\mysklad\Entities\Reports;

use rare\mysklad\Components\Specs\QuerySpecs\Reports\StockReportQuerySpecs;
use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\MoySklad;

class StockReport extends AbstractReport  {
    public static $reportName = 'stock';

    public static function all(MoySklad $sklad, StockReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'all', $specs);
    }

    public static function byStore(MoySklad $sklad, StockReportQuerySpecs $specs = null){
        return static::queryWithParam($sklad, 'bystore', $specs);
    }

    /**
     * @param MoySklad $sklad
     * @param AbstractDocument $operation
     * @return \stdClass
     */
    public static function byOperation(MoySklad $sklad, AbstractDocument $operation){
        return static::queryWithParam($sklad, 'byoperation', StockReportQuerySpecs::create([
            'operation.id' => $operation->getMeta()->getId()
        ]));
    }
}
