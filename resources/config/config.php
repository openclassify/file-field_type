<?php

use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;

return [
    'folders' => [
        'type'   => 'anomaly.field_type.checkboxes',
        'config' => [
            'options' => function (FolderRepositoryInterface $folders) {
                return $folders->all()->lists('name', 'id')->all();
            }
        ]
    ]
];
