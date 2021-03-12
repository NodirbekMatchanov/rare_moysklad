<?php

namespace rare\mysklad\Entities\Documents\CommissionReports;

use rare\mysklad\Entities\Contract;
use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;

class AbstractCommissionReport extends AbstractDocument{
    public static $entityName = 'a_commissionreport';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName,  'agent', Contract::$entityName, 'commissionPeriodStart', 'commissionPeriodEnd'];
    }
}
