<?php

namespace rare\mysklad\Entities\Documents\Cash;

use rare\mysklad\Entities\Organization;

class CashIn extends AbstractCash{
    public static $entityName = 'cashin';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName,  'agent'];
    }
}
