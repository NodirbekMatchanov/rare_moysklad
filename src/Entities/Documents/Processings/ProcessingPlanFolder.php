<?php

namespace rare\mysklad\Entities\Documents\Processings;


class ProcessingPlanFolder extends AbstractProcessing {
    public static $entityName = 'processingplanfolder';

    public static function getFieldsRequiredForCreation()
    {
        return ['name', 'materials', 'products'];
    }
}
