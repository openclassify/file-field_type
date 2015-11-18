<?php

return [
    'folders' => [
        'type'     => 'anomaly.field_type.checkboxes',
        'required' => true,
        'config'   => [
            'options' => function (\Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface $folders) {

                $folders = $folders->all();

                return $folders->lists('name', 'id')->all();
            }
        ]
    ],
    'max'     => [
        'type'     => 'anomaly.field_type.integer',
        'required' => true,
        'config'   => [
            'default_value' => function () {
                $post = str_replace('M', '', ini_get('post_max_size'));
                $file = str_replace('M', '', ini_get('upload_max_filesize'));

                return $file > $post ? $post : $file;
            },
            'max'           => function () {
                $post = str_replace('M', '', ini_get('post_max_size'));
                $file = str_replace('M', '', ini_get('upload_max_filesize'));

                return $file > $post ? $post : $file;
            },
            'min'           => 1
        ]
    ]
];
