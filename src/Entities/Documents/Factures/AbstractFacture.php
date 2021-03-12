<?php

namespace rare\mysklad\Entities\Documents\Factures;

use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Interfaces\DoesNotSupportMutationInterface;

class AbstractFacture extends AbstractDocument implements DoesNotSupportMutationInterface {
    public static $entityName = 'a_facture';
}
