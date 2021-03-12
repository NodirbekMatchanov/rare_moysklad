<?php

namespace rare\mysklad\Entities;

class Currency extends AbstractEntity{
    public static $entityName = 'currency';

    public static function getFieldsRequiredForCreation(){
        return ["name", "code", "isoCode"];
    }
}
