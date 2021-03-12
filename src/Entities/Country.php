<?php

namespace rare\mysklad\Entities;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Country extends AbstractEntity{
    use RequiresOnlyNameForCreation;
    public static $entityName = 'country';
}
