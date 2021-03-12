<?php

namespace rare\mysklad\Exceptions;

use \Exception;
use rare\mysklad\Entities\AbstractEntity;

/**
 * Entity has no "meta" field
 * Class EntityHasNoMetaException
 * @package MoySklad\Exceptions
 */
class EntityHasNoMetaException extends Exception{
    public function __construct(AbstractEntity $entity, $code = 0, Exception $previous = null)
    {
        parent::__construct(
            "Entity " . get_class($entity) . " has no meta",
            $code,
            $previous);
    }
}
