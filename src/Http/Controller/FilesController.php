<?php namespace Anomaly\FileFieldType\Http\Controller;

use Anomaly\FileFieldType\Table\FileTableBuilder;
use Anomaly\FilesModule\Disk\Contract\DiskInterface;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FilesModule\Folder\Contract\FolderInterface;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Illuminate\Database\Eloquent\Builder;
use League\Flysystem\MountManager;

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

    /**
     * @param FolderRepositoryInterface $folders
     * @return \Illuminate\View\View
     */
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

    /**
     * @param FolderRepositoryInterface $folders
     * @param MountManager              $manager
     * @return string
     */
    public function handle(FolderRepositoryInterface $folders, MountManager $manager)
    {
        /* @var FolderInterface $folder */
        $folder = $folders->find($this->request->get('folder'));

        /* @var DiskInterface $disk */
        $disk = $folder->getDisk();

        $file = $this->request->file('upload');

        $file = $manager->putStream(
            $disk->getSlug() . '://' . $folder->getSlug() . '/' . $file->getClientOriginalName(),
            fopen($file->getRealPath(), 'r+')
        );

        /* @var FileInterface $file */
        return $this->response->json($file->getAttributes());
    }

    public function uploaded(FileTableBuilder $table)
    {
        return $table->setOption('attributes.id', 'test_field')->on(
            'querying',
            function (Builder $query) {
                $query->whereIn('id', explode(',', $this->request->get('uploaded')));
            }
        )->render();
    }
}
