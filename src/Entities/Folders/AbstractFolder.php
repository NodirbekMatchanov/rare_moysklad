<?php

namespace rare\mysklad\Entities\Folders;

use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class AbstractFolder extends AbstractEntity
{
    use RequiresOnlyNameForCreation;
    public static $entityName = '_a_folder';
}
