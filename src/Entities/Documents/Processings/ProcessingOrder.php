<?php

namespace rare\mysklad\Entities\Documents\Processings;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;

class ProcessingOrder extends AbstractDocument {
    public static $entityName = 'processingorder';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName,  'processingPlan', 'positions'];
    }
}
