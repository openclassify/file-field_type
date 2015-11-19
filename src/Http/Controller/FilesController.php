<?php namespace Anomaly\FileFieldType\Http\Controller;

use Anomaly\FileFieldType\Table\FileTableBuilder;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class FilesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Http\Controller
 */
class FilesController extends AdminController
{

    public function index(FileTableBuilder $table, $id)
    {
        return $table->setOption('attributes.id', $id)->render();
    }

    public function choose(FolderRepositoryInterface $folders)
    {
        return view(
            'anomaly.field_type.file::choose',
            [
                'folders' => $folders->all()
            ]
        );
    }

    public function upload(FolderRepositoryInterface $folders)
    {
        return view('anomaly.field_type.file::upload', ['folder' => $folders->find($this->request->get('folder'))]);
    }

    public function test(FileTableBuilder $table)
    {
        return $table->setOption('attributes.id', 'test_field')->on('querying', function(Builder $query) {
            $query->whereIn('id', explode(',', $this->request->get('uploaded')));
        })->render();
    }
}
