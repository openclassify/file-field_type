<?php namespace Anomaly\FileFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class FileFieldType extends FieldType
{

    public function getRelation()
    {
        return $this->belongsTo($this->pullConfig('related', 'Files\Model\File'));
    }
}
