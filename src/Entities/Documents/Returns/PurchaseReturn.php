<?php

namespace rare\mysklad\Entities\Documents\Returns;

use rare\mysklad\Entities\Documents\Movements\Supply;
use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Store;

class PurchaseReturn extends AbstractReturn{
    public static $entityName = 'purchasereturn';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName, Store::$entityName, Supply::$entityName, 'agent'];
    }
}
