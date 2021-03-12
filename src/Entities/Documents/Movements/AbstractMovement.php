<?php

namespace rare\mysklad\Entities\Documents\Movements;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Store;

class AbstractMovement extends AbstractDocument{
    public static $entityName = "a_movement";
    public static function getFieldsRequiredForCreation()
    {
        return ['name', 'agent', Organization::$entityName, Store::$entityName];
    }
}
