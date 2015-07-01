<?php

return [
    'disk' => [
        'type'   => 'anomaly.field_type.relationship',
        'config' => [
            'related' => 'Anomaly\FilesModule\Disk\DiskModel'
        ]
    ],
    'path' => [
        'type'  => 'anomaly.field_type.text',
        'rules' => [
            'regex:/^[a-zA-Z0-9_\s\/]+$/'
        ]
    ]
];
