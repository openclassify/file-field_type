<?php namespace Anomaly\FileFieldType;

use Anomaly\FileFieldType\Command\GetUploadFile;
use Anomaly\FileFieldType\Command\PerformUpload;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class FileFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType
 */
class FileFieldType extends FieldType
{

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.file::input';

    /**
     * Get the relation.
     *
     * @return BelongsTo
     */
    public function getRelation()
    {
        $entry = $this->getEntry();

        return $entry->belongsTo(
            array_get($this->config, 'related', 'Anomaly\FilesModule\File\FileModel'),
            $this->getColumnName()
        );
    }

    /**
     * Get the rules.
     *
     * @return array
     */
    public function getRules()
    {
        $rules = parent::getRules();

        if ($image = array_get($this->getConfig(), 'image')) {
            $rules[] = 'image';
        }

        if ($mimes = array_get($this->getConfig(), 'mimes')) {
            $rules[] = 'mimes:' . implode(',', $mimes);
        }

        if ($max = array_get($this->getConfig(), 'max')) {
            $rules[] = 'max:' . $max * 1000;
        }

        return $rules;
    }

    /**
     * Get the post value.
     *
     * @param null $default
     * @return null|FileInterface
     */
    public function getPostValue($default = null)
    {
        return $this->dispatch(new PerformUpload($this));
    }

    /**
     * Get the value to validate.
     *
     * @param null $default
     * @return FileInterface
     */
    public function getValidationValue($default = null)
    {
        return $this->dispatch(new GetUploadFile($this));
    }

    /**
     * Get the database column name.
     *
     * @return null|string
     */
    public function getColumnName()
    {
        return parent::getColumnName() . '_id';
    }
}
