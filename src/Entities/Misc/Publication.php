<?php

namespace rare\mysklad\Entities\Misc;

use rare\mysklad\Entities\AbstractEntity;

class Publication extends AbstractEntity  {
    public static $entityName = 'operationpublication';

    public static function getFieldsRequiredForCreation()
    {
        return ["template"];
    }
}
