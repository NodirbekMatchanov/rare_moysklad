<?php

namespace rare\mysklad\Entities\Documents\Movements;

use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Store;

class Enter extends AbstractMovement {
    public static $entityName = 'enter';
    public static function getFieldsRequiredForCreation()
    {
        return ['name', Organization::$entityName, Store::$entityName];
    }
}
