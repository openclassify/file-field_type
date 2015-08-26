<?php namespace Anomaly\FileFieldType;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class FileFieldTypeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType
 */
class FileFieldTypeServiceProvider extends AddonServiceProvider
{

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\FileFieldType\FileFieldTypeModifier' => 'Anomaly\FileFieldType\FileFieldTypeModifier'
    ];

}
