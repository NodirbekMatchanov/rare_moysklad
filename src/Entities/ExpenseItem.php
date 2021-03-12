<?php

namespace rare\mysklad\Entities;

use rare\mysklad\Traits\RequiresOnlyNameForCreation;

class ExpenseItem extends AbstractEntity{
    use RequiresOnlyNameForCreation;
    public static $entityName = 'expenseitem';
}
