<?php

namespace rare\mysklad\Entities\Products;

use rare\mysklad\Entities\AbstractEntity;

class AbstractProduct extends AbstractEntity{
    public static $entityName = '_a_product';

    /**
     * @param $name
     * @return null|\stdClass
     */
    public function getSalePrice($name){
        if ( empty($this->salePrices) ) return null;
        foreach ( $this->salePrices as $sp ){
            if ( $sp->priceType == $name ){
                return $sp;
            }
        }
        return null;
    }
}
