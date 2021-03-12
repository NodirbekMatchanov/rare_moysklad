<?php

namespace rare\mysklad\Entities\Products;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class Service extends AbstractProduct {
    use RequiresOnlyNameForCreation;
    public static $entityName = 'service';
}
