<?php namespace Anomaly\FileFieldType\Table;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UploadTableBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Table
 */
class UploadTableBuilder extends TableBuilder
{

    /**
     * The uploaded IDs.
     *
     * @var array
     */
    protected $uploaded = [];

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
    protected $filters = [];

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
        'limit'              => 999,
        'container_class'    => '',
        'sortable_headers'   => false,
        'no_results_message' => 'anomaly.field_type.file::message.no_uploads'
    ];

    /**
     * Fired just before querying
     * for table entries.
     *
     * @param Builder $query
     */
    public function onQuerying(Builder $query)
    {
        $uploaded = $this->getUploaded();

        $query->whereIn('id', $uploaded ?: [0]);

        $query->orderBy('updated_at', 'ASC');
        $query->orderBy('created_at', 'ASC');
    }

    /**
     * Get uploaded IDs.
     *
     * @return array
     */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * Set the uploaded IDs.
     *
     * @param array $uploaded
     * @return $this
     */
    public function setUploaded(array $uploaded)
    {
        $this->uploaded = $uploaded;

        return $this;
    }
}
