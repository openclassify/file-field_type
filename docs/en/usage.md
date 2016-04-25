# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the file field type value with a file's ID.

    $entry->example = 10;

You can also set the value with an instance of a file.

    $entry->example = $file;

<hr>

<a name="output"></a>
## Basic Output

The file field type always returns `null` or an instance of the selected file.

    $entry->example->getName(); // example.jpg

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the file's presenter is returned instead.

    {% verbatim %}{{ entry.example.path() }} {# "/app/default/example.jpg" #}{% endverbatim %}

**Remember:** You can access presenter and object methods in valuated strings like table columns too.

    protected $columns = [
        "entry.file.extension"
    ];