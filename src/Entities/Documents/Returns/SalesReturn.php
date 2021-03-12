<?php

namespace rare\mysklad\Entities\Documents\Returns;

use rare\mysklad\Entities\Documents\Movements\Demand;
use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Store;

class SalesReturn extends AbstractReturn{
    public static $entityName = 'salesreturn';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName, Store::$entityName, Demand::$entityName, 'agent'];
    }
}
