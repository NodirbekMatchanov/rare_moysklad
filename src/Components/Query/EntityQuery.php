<?php

namespace rare\mysklad\Components\Query;

use rare\mysklad\Components\Expand;
use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Lists\EntityList;
use rare\mysklad\Registers\ApiUrlRegistry;

class EntityQuery extends AbstractQuery {
    protected static $entityListClass = EntityList::class;

    /**
     * Get entity by id
     * @param $id
     * @param Expand|null $expand Deprecated, use withExpand()
     * @return AbstractEntity
     * @throws \Throwable
     */
    public function byId($id, Expand $expand = null){
        if ( !$expand ) $expand = $this->expand;
        $res = $this->getSkladInstance()->getClient()->get(
            ApiUrlRegistry::instance()->getByIdUrl($this->entityName, $id),
            ($expand?['expand'=>$expand->flatten()]:[]),
            $this->requestOptions
        );
        return new $this->entityClass($this->getSkladInstance(), $res);
    }

	/**
	 * Get entity by syncid
	 * @param $id
	 * @param Expand|null $expand Deprecated, use withExpand()
	 * @return AbstractEntity
	 * @throws \Throwable
	 */
	public function bySyncId($id, Expand $expand = null){
		if ( !$expand ) $expand = $this->expand;
		$res = $this->getSkladInstance()->getClient()->get(
			ApiUrlRegistry::instance()->getBySyncIdUrl($this->entityName, $id),
			($expand?['expand'=>$expand->flatten()]:[]),
			$this->requestOptions
		);
		return new $this->entityClass($this->getSkladInstance(), $res);
	}
}
