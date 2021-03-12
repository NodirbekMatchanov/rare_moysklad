<?php

namespace rare\mysklad\Entities\Products;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Bundle extends AbstractProduct{
    use RequiresOnlyNameForCreation;
    public static
        $entityName = 'bundle';
}
