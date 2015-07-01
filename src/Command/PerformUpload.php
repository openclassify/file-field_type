<?php namespace Anomaly\FileFieldType\Command;

use Anomaly\FileFieldType\FileFieldType;
use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\FilesModule\File\Contract\FileInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;
use League\Flysystem\MountManager;

/**
 * Class PerformUpload
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Command
 */
class PerformUpload implements SelfHandling
{

    /**
     * The field type instance.
     *
     * @var FileFieldType
     */
    protected $fieldType;

    /**
     * Create a new PerformUpload instance.
     *
     * @param FileFieldType $fieldType
     */
    public function __construct(FileFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param DiskRepositoryInterface $disks
     * @param Request                 $request
     * @param MountManager            $manager
     * @return null|bool|FileInterface
     */
    public function handle(DiskRepositoryInterface $disks, Request $request, MountManager $manager)
    {
        $path = trim(array_get($this->fieldType->getConfig(), 'path'), './');

        // Make sure we have an upload.
        if (($file = $request->file($this->fieldType->getInputName())) === null) {
            return null;
        }

        // Make sure we have a valid upload disk.
        if (!$disk = $disks->find($id = array_get($this->fieldType->getConfig(), 'disk'))) {
            throw new \Exception(
                "The configured disk [{$id}] for [{$this->fieldType->getInputName()}] could not be found."
            );
        }

        // Make the path.
        $path = (!empty($path) ? $path . '/' : null) . $file->getClientOriginalName();

        return $manager->putStream($disk->path($path), fopen($file->getRealPath(), 'r+'));
    }
}
