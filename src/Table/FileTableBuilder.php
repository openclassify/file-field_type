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
        'filename'
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
        'filename'      => [
            'sort_column' => 'filename',
            'wrapper'     => '<h4 style="margin: 0 0 3px;"><a href="#" data-file="{entry.id}" data-filename="{entry.filename}">{value.filename}</a><br><small>{value.keywords}</small></h4>',
            'value'       => [
                'filename' => 'entry.filename',
                'keywords' => 'entry.keywords.labels'
            ]
        ],
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
        'styles.css' => [
            'anomaly.field_type.file::less/table.less'
        ],
        'scripts.js' => [
            'anomaly.field_type.file::js/table.js'
        ]
    ];

}
