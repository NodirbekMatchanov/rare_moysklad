<?php

namespace rare\mysklad\Traits;

use rare\mysklad\Components\Fields\ImageField;
use rare\mysklad\Entities\AbstractEntity;

trait AttachesImage{
    public function attachImage(ImageField $imageField){
        /**
         * @var AbstractEntity $this
         */
        $this->fields->image = $imageField;
    }
}
