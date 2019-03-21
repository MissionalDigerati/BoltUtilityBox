# Bolt Utility Box

"Bolt Utility Box" contains various utility methods for [Bolt CMS](http://bolt.cm).  Current twig functions:

### String Encryption

```
{{md5('string')}}
```

Converts the given string to an MD5 hash.

#### Arguments

| Argument | Required | Default | Description |
| -------- | -------- | ------- | ----------- |
| string | Yes | N/A | The string to turn into a hash. |

### Remove Objects from Array

```
{% set array = [{ 'id': 1, 'name': 'bob'}, { 'id': 2, 'name': 'joe'}, { 'id': 3, 'name': 'kelly'}] %}
{% set removed = remove_record(array, [2]) %}
{{dump(removed)}}
```
Removes the ids in arrayIds from the given array of objects.

#### Arguments

| Argument | Required | Default | Description |
| -------- | -------- | ------- | ----------- |
| array | Yes | N/A | The array of objects to filter. |
| remove_id_array | Yes | N/A | An array of id's to remove from the array. |

### Sort Object Array

```
{% set array = [{ 'id': 1, 'name': 'bob'}, { 'id': 2, 'name': 'joe'}, { 'id': 3, 'name': 'kelly'}] %}
{% set sorted = sort_obj_array(array, 'name', 'asc') %}
{{dump(sorted)}}
```

Sorts an object array by the given key's value.

#### Arguments

| Argument | Required | Default | Description |
| -------- | -------- | ------- | ----------- |
| array | Yes | N/A | The array of objects to sort. |
| key | Yes | N/A | The object's key to sort by. |
| direction | No | asc | Direction to sort with. (asc = Ascending, desc = Descending) |

## Development Notes

This repository is following the branching technique described in [this blog post](http://nvie.com/posts/a-successful-git-branching-model/), and the semantic version set out on the [Semantic Versioning Website](http://semver.org/).  We also follow [FIG Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) for writing code.

### Running Scripts

To lint your code, run:

```
composer run lint
```

To run the tests, run:

```
composer run test
```

## License

This script is created by Missional Digerati and is under the [GNU General Public License v3](http://www.gnu.org/licenses/gpl-3.0-standalone.html).
