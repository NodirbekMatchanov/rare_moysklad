<?php

namespace rare\mysklad\Components\Specs;


class EmptySpecs extends AbstractSpecs {
    protected static $cachedDefaultSpecs = null;

    /**
     * Get possible variables for spec
     * @return array
     */
    public function getDefaults()
    {
        return [];
    }
}
