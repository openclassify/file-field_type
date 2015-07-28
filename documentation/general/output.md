# Output

This field type returns the file interface instance as a value. You may access the object as normal.

**Examples:**

```
// Twig usage
{{ entry.example.public_path }} or {{ url(entry.example.imagePath({'fit': '100,100'})) }}

// API Usage
$entry->example->public_path; or url($entry->example->imagePath(['fit' => '100,100']));
```
