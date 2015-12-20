<?php namespace Anomaly\FileFieldType;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Support\Decorator;

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

        return (new Decorator())->decorate($file)->preview();
    }

    /**
     * Fallback to getting attributes
     * off the related value.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        if (!$related = $this->object->getValue()) {
            return null;
        }

        return self::$__decorator->decorate($related)->{$key};
    }

    /**
     * Fallback to calling methods
     * on the related value.
     *
     * @param string $method
     * @param array  $arguments
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        if (!$related = $this->object->getValue()) {
            return null;
        }

        return call_user_func_array([self::$__decorator->decorate($related), $method], $arguments);
    }
}
