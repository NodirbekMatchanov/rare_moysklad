<?php

namespace rare\mysklad\Entities;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Project extends AbstractEntity{
    use RequiresOnlyNameForCreation;
    public static $entityName = 'project';
}
