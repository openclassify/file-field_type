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
        'streams/file-field_type/index'           => 'Anomaly\FileFieldType\Http\Controller\FilesController@index',
        'streams/file-field_type/choose'          => 'Anomaly\FileFieldType\Http\Controller\FilesController@choose',
        'streams/file-field_type/selected'        => 'Anomaly\FileFieldType\Http\Controller\FilesController@selected',
        'streams/file-field_type/upload/{folder}' => 'Anomaly\FileFieldType\Http\Controller\UploadController@index',
        'streams/file-field_type/handle'          => 'Anomaly\FileFieldType\Http\Controller\UploadController@upload',
        'streams/file-field_type/recent'          => 'Anomaly\FileFieldType\Http\Controller\UploadController@recent',
    ];

}
