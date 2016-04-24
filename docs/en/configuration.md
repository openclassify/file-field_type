# Configuration

- [Basic Configuration](#basic)
- [Extra Configuration](#extra)
- [Option Handlers](#handlers)

<hr>

Below is the full configuration available with defaults.

{% code php %}
protected $fields = [
    "example" => [
        "type"   => "anomaly.field_type.addon",
        "config" => [
            "default_value" => null,
            "folders"       => []
        ]
    ]
];
{% endcode %}

<hr>

<a name="basic"></a>
## Basic Configuration

### Default Value

{{ code('php', '"default_type" => $id') }}

The `default_value` is a core option. This field type accepts a file ID.

### Folders

{{ code('php', '"folders" => ["images"]') }}

Specify the folders available to select files from and upload files to. If no folders are specified, all folders will be available.
