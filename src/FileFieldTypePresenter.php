<?php namespace Anomaly\FileFieldType;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FilesModule\File\FilePresenter;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class FileFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType
 */
class FileFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the image preview.
     *
     * @return null|string
     */
    public function preview()
    {
        /* @var FileInterface $file */
        if (!$file = $this->object->getValue()) {
            return null;
        }

        /* @var FilePresenter $presenter */
        $presenter = $this->__getDecorator()->decorate($file);

        return $presenter->preview();
    }
}
