<?php

namespace rare\mysklad\Entities\Documents\Cash;

use rare\mysklad\Entities\Organization;

class CashOut extends AbstractCash{
    public static $entityName = 'cashout';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName,  'agent', 'expenseItem'];
    }
}
