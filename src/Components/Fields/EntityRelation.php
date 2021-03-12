<?php

namespace rare\mysklad\Components\Fields;

use rare\mysklad\Components\Expand;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Exceptions\Relations\RelationDoesNotExistException;
use rare\mysklad\Exceptions\Relations\RelationIsList;
use rare\mysklad\Exceptions\Relations\RelationIsSingle;
use rare\mysklad\Lists\RelationEntityList;
use rare\mysklad\MoySklad;

class EntityRelation extends AbstractFieldAccessor {
    private $relatedByClass = null;

    public function __construct($fields, $relatedByClass, AbstractEntity &$entity = null)
    {
        parent::__construct($fields, $entity);
        $this->relatedByClass = $relatedByClass;
    }

    /**
     * @param MoySklad $sklad
     * @param AbstractEntity $entity
     * @return static
     */
    public static function createRelations(MoySklad $sklad, AbstractEntity &$entity){
        $internalFields = $entity->fields->getInternal();
        $foundRelations = [];
        foreach ($internalFields as $k=>$v){
            if ( is_array($v) || is_object($v) ){
                $ar = (array)$v;
                array_walk($ar, function($e, $i) use($k, $ar, &$foundRelations, $sklad){
                    if ( $i === 'meta' ){
                        $mf = new MetaField($e);
                        if ( isset($mf->size) ){
                            $foundRelations[$k] = new RelationEntityList($sklad, [], $mf);
                        } else {
                            $class = $mf->getClass();
                            if ( $class ){
                                $foundRelations[$k] = new $class($sklad, $ar);
                            }
                        }
                    }
                });
            }
        }
        return new static($foundRelations, get_class($entity));
    }


    /**
     * @param $relationName
     * @param Expand|null $expand
     * @return AbstractEntity
     * @throws RelationDoesNotExistException
     * @throws RelationIsList
     */
    public function fresh($relationName, Expand $expand = null){
        $this->checkRelationExists($relationName);
        /**
         * @var AbstractEntity $rel
         */
        $rel = $this->storage->{$relationName};
        if ( $rel instanceof RelationEntityList ) throw new RelationIsList($relationName, $this->relatedByClass);
        $c = get_class($rel);
        $queriedEntity = $c::query($rel->getSkladInstance())->byId($rel->fields->meta->getId(), $expand);
        return $rel->replaceFields($queriedEntity);
    }

    /**
     * @param $relationName
     * @return \MoySklad\Components\Query\RelationQuery
     * @throws RelationDoesNotExistException
     * @throws RelationIsSingle
     * @throws \MoySklad\Exceptions\UnknownEntityException
     */
    public function listQuery($relationName){
        $this->checkRelationExists($relationName);
        /**
         * @var RelationEntityList $rel
         */
        $rel = $this->storage->{$relationName};
        if ( $rel instanceof AbstractEntity ) throw new RelationIsSingle($relationName, $this->relatedByClass);
        return $rel->query();
    }

    /**
     * @param $entityClass
     * @return static|null
     */
    public function find($entityClass){
        foreach ($this->storage as $key=>$value){
            if ( get_class($value) === $entityClass ) return $value;
        }
        return null;
    }

    /**
     * @return array
     */
    public function getNames(){
        return array_keys((array)$this->storage);
    }

    /**
     * @param $relationName
     * @throws RelationDoesNotExistException
     */
    private function checkRelationExists($relationName){
        if ( empty($this->storage->{$relationName}) ){
            throw new RelationDoesNotExistException($relationName, $this->relatedByClass);
        }
    }
}
