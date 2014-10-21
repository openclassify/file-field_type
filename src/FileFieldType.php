<?php namespace Anomaly\Streams\Addon\FieldType\File;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class FileFieldType extends FieldTypeAddon
{
    /**
     * The database column type this field type uses.
     *
     * @var string
     */
    public $columnType = 'string';

    /**
     * Field type version
     *
     * @var string
     */
    public $version = '1.1.0';

    /**
     * Available field type settings.
     *
     * @var array
     */
    public $settings = array(
        'allowedFileTypes',
    );

    /**
     * Field type author information.
     *
     * @var array
     */
    public $author = array(
        'name' => 'AI Web Systems, Inc.',
        'url'  => 'http://aiwebsystems.com/',
    );

    /**
     * The field type relation
     *
     * @return object
     */
    public function relation()
    {
        return $this->belongsTo($this->getParameter('relation_class', 'Files\Model\File'));
    }

    /**
     * Return the input used for forms.
     *
     * @return mixed
     */
    public function formInput()
    {
        return \Form::file($this->formSlug);
    }

    /**
     * Process value before saving.
     *
     * @return mixed
     */
    public function preSave()
    {
        if (\Input::hasFile($this->formSlug)) {
            $file = \Input::file($this->formSlug);
        }
    }

    /**
     * Return the string output value.
     *
     * @return string
     */
    public function stringOutput()
    {
        // @todo - Return a string input once more complete
    }

    /**
     * Return the plugin output value.
     *
     * @return string
     */
    public function pluginOutput()
    {
        // @todo - Return a plugin input once more complete
    }

    /**
     * Get database column name.
     *
     * @return string
     */
    public function getColumnName()
    {
        return parent::getColumnName() . '_id';
    }
}
