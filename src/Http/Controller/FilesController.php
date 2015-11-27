<?php namespace Anomaly\FileFieldType\Http\Controller;

use Anomaly\FileFieldType\Table\FileTableBuilder;
use Anomaly\FileFieldType\Table\ValueTableBuilder;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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

    /**
     * Return an index of existing files.
     *
     * @param FileTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FileTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return a list of folders to choose from.
     *
     * @param FolderRepositoryInterface $folders
     * @return \Illuminate\View\View
     */
    public function choose(FolderRepositoryInterface $folders)
    {
        return $this->view->make(
            'anomaly.field_type.file::choose',
            [
                'folders' => $folders->all()
            ]
        );
    }

    /**
     * Return a table of selected files.
     *
     * @param ValueTableBuilder $table
     * @return null|string
     */
    public function selected(ValueTableBuilder $table)
    {
        return $table->setUploaded(explode(',', $this->request->get('uploaded')))->make()->getTableContent();
    }
}
