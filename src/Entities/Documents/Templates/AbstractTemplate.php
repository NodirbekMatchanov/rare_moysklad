<?php

namespace rare\mysklad\Entities\Documents\Templates;

use rare\mysklad\Entities\AbstractEntity;

class AbstractTemplate extends AbstractEntity  {
    public static $entityName = 'a_template';

    public function getContent(){
        return $this->fields->content;
    }
}
