# Configuration

- [Basic Configuration](#basic)
- [Extra Configuration](#extra)
- [Option Handlers](#handlers)

<hr>

Below is the full configuration available with defaults.

    protected $fields = [
        "example" => [
            "type"   => "anomaly.field_type.addon",
            "config" => [
                "default_value" => null,
                "folders"       => []
            ]
        ]
    ];

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

    "default_type" => $id

The `default_value` is a core option. This field type accepts a file ID.

### Folders

    "folders" => ["images"]

Specify the folders available to select files from and upload files to. If no folders are specified, all folders will be available.
