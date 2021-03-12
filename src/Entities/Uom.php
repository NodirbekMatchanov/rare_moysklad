<?php

namespace rare\mysklad\Entities;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Uom extends AbstractEntity{
    use RequiresOnlyNameForCreation;
    public static $entityName = 'uom';
}
