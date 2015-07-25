<?php namespace Anomaly\FileFieldType\Validation;

use Anomaly\FileFieldType\FileFieldType;
use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ValidateDisk
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType\Validation
 */
class ValidateDisk implements SelfHandling
{

    /**
     * Handle the validation.
     *
     * @param FileFieldType           $fieldType
     * @param DiskRepositoryInterface $disks
     * @return bool
     */
    public function handle(FileFieldType $fieldType, DiskRepositoryInterface $disks)
    {
        $disk = array_get($fieldType->getConfig(), 'disk');

        if (is_numeric($disk) && !$disks->find($disk)) {
            return false;
        }

        if (!is_numeric($disk) && !$disks->findBySlug($disk)) {
            return false;
        }

        return true;
    }
}
