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

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'streams/file-field_type/index/{namespace}/{stream}/{field}'  => 'Anomaly\FileFieldType\Http\Controller\FilesController@index',
        'streams/file-field_type/choose/{namespace}/{stream}/{field}' => 'Anomaly\FileFieldType\Http\Controller\FilesController@choose',
        'streams/file-field_type/upload/{namespace}/{stream}/{field}' => 'Anomaly\FileFieldType\Http\Controller\FilesController@upload',
        'streams/file-field_type/handle/{namespace}/{stream}/{field}' => 'Anomaly\FileFieldType\Http\Controller\FilesController@handle',
        'streams/file-field_type/value/{namespace}/{stream}/{field}'  => 'Anomaly\FileFieldType\Http\Controller\FilesController@value',
    ];

}
