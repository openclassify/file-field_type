# Usage

- [Setting Values](#mutator)
- [Basic Output](#output)
- [Presenter Output](#presenter)

<hr>

<a name="mutator"></a>
## Setting Values

You can set the file field type value with a file's ID.

{{ code('php', '$entry->example = 10') }}

You can also set the value with an instance of a file.

{% code php %}
$entry->example = $file;
{% endcode %}

<hr>

<a name="output"></a>
## Basic Output

The file field type always returns `null` or an instance of the selected file.

{% code php %}
$entry->example->getName(); // example.jpg
{% endcode %}

<hr>

<a name="presenter"></a>
## Presenter Output

When accessing the value from a decorated entry, like one in a view, the file's presenter is returned instead.

{% code twig %}
{% verbatim %}{{ entry.example.path() }} {# "/app/default/example.jpg" #}{% endverbatim %}
{% endcode %}

**Remember:** You can access presenter and object methods in valuated strings like table columns too.

<pre>
{% code php %}
protected $columns = [
    "entry.file.extension"
];
{% endcode %}
</pre>