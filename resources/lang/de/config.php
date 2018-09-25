<?php

return [
    'folders' => [
        'name'         => 'Folders',
        'instructions' => 'Specify which folders are available for this field. Leave blank to display all folders.',
        'warning'      => 'Existing folder permissions take precedence over selected folders.',
    ],
    'max'     => [
        'name'         => 'Maximale Upload Grösse',
        'instructions' => 'Geben Sie die maximal zulässige Dateigrösse in <strong>Megabyte</strong> an.',
        'warning'      => 'Wenn kein Wert angegeben wurde, wird der Maximalwert des Ordners und dann der des Servers verwendet.',
    ],
    'mode'    => [
        'name'         => 'Eingabemodus',
        'instructions' => 'Wie sollen Benutzer Dateien bereitstellen können?',
        'option'       => [
            'default' => 'Upload und/oder Dateiauswahl.',
            'select'  => 'Nur Dateiauswahl.',
            'upload'  => 'Nur Upload.',
        ],
    ],
];
