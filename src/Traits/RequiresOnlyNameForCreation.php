<?php

namespace rare\mysklad\Traits;

trait RequiresOnlyNameForCreation{
    public static function getFieldsRequiredForCreation()
    {
        return ["name"];
    }
}
