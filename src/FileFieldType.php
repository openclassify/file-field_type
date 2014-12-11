<?php namespace Anomaly\Streams\Addon\FieldType\File;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class FileFieldType extends FieldType
{

    public function getRelation()
    {
        return $this->belongsTo($this->pullConfig('related', 'Files\Model\File'));
    }
}
