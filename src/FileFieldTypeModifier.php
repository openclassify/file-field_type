<?php namespace Anomaly\FileFieldType;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FilesModule\File\Contract\FileRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;

/**
 * Class FileFieldTypeModifier
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType
 */
class FileFieldTypeModifier extends FieldTypeModifier
{

    /**
     * The files repository.
     *
     * @var FileRepositoryInterface
     */
    protected $files;

    /**
     * Create a new FileFieldTypeModifier instance.
     *
     * @param FieldType               $fieldType
     * @param FileRepositoryInterface $files
     */
    public function __construct(FieldType $fieldType, FileRepositoryInterface $files)
    {
        $this->files = $files;

        parent::__construct($fieldType);
    }

    /**
     * Modify the value for database storage.
     *
     * @param  $value
     * @return int
     */
    public function modify($value)
    {
        if ($value instanceof FileInterface) {
            return $value->getId();
        }

        return null;
    }

    /**
     * Restore the value from storage format.
     *
     * @param  $value
     * @return null|FileInterface
     */
    public function restore($value)
    {
        if ($value instanceof FileInterface) {
            return $value;
        }

        if ($value && $file = $this->files->find($value)) {
            return $file;
        }

        return null;
    }
}
