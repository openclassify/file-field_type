## Usage[](#usage)

This section will show you how to use the field type via API and in the view layer.


### Basic Output[](#usage/basic-output)

The file field type always returns `null` or an `\Anomaly\FilesModule\File\Contract\FileInterface` instance.

###### Example

    $entry->example->getName(); // example.jpg

###### Twig

    {{ entry.example.getName() }} // example.jpg


### Setting Values[](#usage/setting-values)

You can set the file field type value with a file's ID.

    $entry->example = 10;

You can also set the value with an instance of a file.

    $entry->example = $file;

Lastly you can set the value with an instance of a file presenter.

    $entry->example = $decorated;


### Presenter Output[](#usage/presenter-output)

When accessing the field value from a decorated entry model the an instance of `\Anomaly\FilesModule\File\FilePresenter` will be returned.

###### Example

    $decorated->example->path; // local://folder/file.ext

    $decorated->example->url() }} // /app/{application}/example/image.jpg

###### Twig

    {{ decorated.example.path }} // local://folder/file.ext

    {{ decorated.example.url }} // /app/{application}/example/image.jpg
