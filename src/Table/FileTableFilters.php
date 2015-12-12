<?php namespace Anomaly\FileFieldType\Table;

use Anomaly\FilesModule\Folder\Command\GetFolder;
use Anomaly\FilesModule\Folder\Contract\FolderInterface;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;

/**
 * Class FileTableFilters
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Table
 */
class FileTableFilters
{

    use DispatchesJobs;

    /**
     * Handle the filters.
     *
     * @param FileTableBuilder $builder
     */
    public function handle(FileTableBuilder $builder, FolderRepositoryInterface $folders, Request $request)
    {
        $allowed = [];

        $config = explode(',', $request->get('folders'));

        foreach ($config as $identifier) {

            /* @var FolderInterface $folder */
            if ($folder = $this->dispatch(new GetFolder($identifier))) {
                $allowed[$folder->getId()] = $folder->getName();
            }
        }

        if (!$allowed) {
            $allowed = $folders->all()->lists('name', 'id')->all();
        }

        $builder
            ->setFolders($allowed)
            ->setFilters(
                [
                    'folder' => [
                        'exact'   => true,
                        'filter'  => 'select',
                        'options' => $allowed,
                        'enabled' => (count($allowed) !== 1)
                    ],
                    'name'
                ]
            );
    }
}
