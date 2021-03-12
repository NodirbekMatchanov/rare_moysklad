<?php

namespace rare\mysklad\Entities\Documents\Orders;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;

class AbstractOrder extends AbstractDocument{
    public static $entityName = '_a_order';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName, 'agent'];
    }
}
