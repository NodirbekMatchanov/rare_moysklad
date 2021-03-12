<?php

namespace rare\mysklad\Components\Specs;


class ConstructionSpecs extends AbstractSpecs {
    protected static $cachedDefaultSpecs = null;

    /**
     * Get possible variables for spec
     *  relations: entity may have relations
     * @return array
     */
    public function getDefaults()
    {
        return [
          "relations" => true
        ];
    }
}
