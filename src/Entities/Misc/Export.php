<?php

namespace rare\mysklad\Entities\Misc;

use rare\mysklad\Entities\AbstractEntity;

class Export extends AbstractEntity  {
    public static $entityName = 'export';

    public static function getFieldsRequiredForCreation()
    {
        return ["extension"];
    }

    public function getFileLink(){
        return $this->fields->file;
    }
}
