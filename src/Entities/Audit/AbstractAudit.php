<?php

namespace rare\mysklad\Entities\Audit;

use rare\mysklad\Components\Specs\QuerySpecs\QuerySpecs;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Entities\Employee;
use rare\mysklad\MoySklad;
use rare\mysklad\Registers\ApiUrlRegistry;

class AbstractAudit extends AbstractEntity {
    public static $entityName = "a_audit";
    /**
     * @param \stdClass $attributes
     * @param $skladInstance
     * @return \stdClass
     */
    public static function listQueryResponseAttributeMapper($attributes, $skladInstance){
        if ( isset($attributes->context->employee) ){
            $attributes->context->employee = new Employee($skladInstance, $attributes->context->employee);
        }
        return $attributes;
    }
}
