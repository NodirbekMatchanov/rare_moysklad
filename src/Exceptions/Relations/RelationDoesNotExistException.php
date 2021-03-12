<?php

namespace MoySklad\Exceptions\Relations;

use \Exception;

/**
 * Class RelationDoesNotExistException
 * @package MoySklad\Exceptions\Relations
 */
class RelationDoesNotExistException extends Exception{
    public function __construct($relationName, $entityClass, $code = 0, Exception $previous = null)
    {
        parent::__construct(
            'Relation "' . $relationName .'" does not exist on entity ' . $entityClass,
            $code,
            $previous);
    }
}
