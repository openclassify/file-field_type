<?php namespace Anomaly\FileFieldType\Table;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class FileTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Table
 */
class FileTableBuilder extends TableBuilder
{

    /**
     * The ajax flag.
     *
     * @var bool
     */
    protected $ajax = true;

    /**
     * The table model.
     *
     * @var string
     */
    protected $model = FileModel::class;

    /**
     * The table filters.
     *
     * @var array
     */
    protected $filters = [
        'folder',
        'name'
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'entry.preview' => [
            'heading' => 'anomaly.module.files::field.preview.name'
        ],
        'name'          => [
            'sort_column' => 'name',
            'wrapper'     => '<h4 style="margin: 0 0 3px;">{value.name}<br><small>{value.keywords}</small></h4>',
            'value'       => [
                'name'     => 'entry.name',
                'keywords' => 'entry.keywords.labels'
            ]
        ],
    ];

    /**
     * The table buttons.
     *
     * @var array
     */
    protected $buttons = [
        'select' => [
            'data-file' => 'entry.id'
        ]
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'title' => 'anomaly.field_type.file::message.choose_file'
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [
        'scripts.js' => [
            'anomaly.field_type.file::js/table.js'
        ]
    ];

}
