<?php

namespace rare\mysklad\Entities\Misc;

use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class CustomEntity extends AbstractEntity  {
    use RequiresOnlyNameForCreation;
    public static $entityName = 'customentity';
}
