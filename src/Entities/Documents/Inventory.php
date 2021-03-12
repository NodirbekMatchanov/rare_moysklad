<?php

namespace rare\mysklad\Entities\Documents;

use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Store;

class Inventory extends AbstractDocument{
    public static $entityName = 'inventory';
    public static function getFieldsRequiredForCreation()
    {
        return [ Organization::$entityName, Store::$entityName];
    }
}
