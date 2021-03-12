<?php

namespace rare\mysklad\Entities\Documents\Invoices;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;

class AbstractInvoice extends AbstractDocument{
    public static $entityName = 'a_invoice';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName,  'agent'];
    }
}
