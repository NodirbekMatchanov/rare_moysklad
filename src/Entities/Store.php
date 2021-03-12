<?php

namespace rare\mysklad\Entities;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Store extends AbstractEntity{
    use RequiresOnlyNameForCreation;
    public static $entityName = 'store';
}
