<?php

namespace rare\mysklad\Components\MutationBuilders;

use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Exceptions\EntityHasNoIdException;
use rare\mysklad\Registers\ApiUrlRegistry;

class UpdateBuilder extends AbstractMutationBuilder {
    /**
     * Update entity with current fields
     * @return AbstractEntity
     * @throws EntityHasNoIdException
     * @throws \Throwable
     */
    public function execute()
    {
        $entity = &$this->e;
        $entityClass = get_class($entity);
        $id = $entity->findEntityId();
        $res = $entity->getSkladInstance()->getClient()->put(
            ApiUrlRegistry::instance()->getUpdateUrl($entityClass::$entityName, $id),
            $entity->mergeFieldsWithLinks()
        );
        return new $entityClass($entity->getSkladInstance(), $res);
    }
}
