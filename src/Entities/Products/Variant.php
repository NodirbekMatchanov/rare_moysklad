<?php

namespace rare\mysklad\Entities\Products;

use rare\mysklad\Entities\Misc\Characteristics;

class Variant extends AbstractProduct{
    public static $entityName = 'variant';

    public static function getFieldsRequiredForCreation()
    {
        return [Product::$entityName, Characteristics::$entityName];
    }
}
