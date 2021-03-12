<?php

namespace rare\mysklad\Entities\Documents\PriceLists;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Organization;

class PriceList extends AbstractDocument {
    public static $entityName = 'pricelist';
    public static function getFieldsRequiredForCreation()
    {
        return [Organization::$entityName, 'columns'];
    }
}
