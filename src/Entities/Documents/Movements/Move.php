<?php

namespace rare\mysklad\Entities\Documents\Movements;

use rare\mysklad\Entities\Organization;

class Move extends AbstractMovement {
    public static $entityName = 'move';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName, 'targetStore', 'sourceStore'];
    }
}
