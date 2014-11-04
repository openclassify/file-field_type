<?php namespace Anomaly\Streams\Addon\FieldType\File;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class FileFieldType extends FieldType
{
    public $settings = array(
        'allowedFileTypes',
    );

    public function relation()
    {
        return $this->belongsTo($this->getParameter('relation_class', 'Files\Model\File'));
    }

    public function input()
    {
        return \Form::file($this->formSlug);
    }
}
