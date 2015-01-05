<?php namespace Anomaly\FileFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class FileFieldType extends FieldType
{

    public function getRelation()
    {
        return $this->belongsTo(array_get($this->config, 'related', 'Files\Model\File'));
    }
}
