<?php

namespace rare\mysklad\Entities\Products;

use rare\mysklad\Entities\Assortment;

class Consignment extends AbstractProduct{
    public static
        $entityName = 'consignment';

    public static function getFieldsRequiredForCreation()
    {
        return ["label", Assortment::class];
    }
}
