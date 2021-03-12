<?php

namespace rare\mysklad\Components\MutationBuilders;

use rare\mysklad\Components\MassRequest;
use rare\mysklad\Components\Specs\CreationSpecs;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Exceptions\IncompleteCreationFieldsException;

class CreationBuilder extends AbstractMutationBuilder {
    /**
     * @var CreationSpecs
     */
    protected $specs;

    public function __construct(AbstractEntity &$entity, CreationSpecs &$specs = null){
        parent::__construct($entity);
        if ( !$specs ) $specs = CreationSpecs::create();
        $this->specs = $specs;
    }

    /**
     * @return AbstractEntity
     * @throws IncompleteCreationFieldsException
     */
    public function execute()
    {
        $this->e->validateFieldsRequiredForCreation();
        $mr = new MassRequest($this->e->getSkladInstance(), $this->e);
        return $mr->create()->get(0);
    }
}
