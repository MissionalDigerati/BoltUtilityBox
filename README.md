# Bolt Utility Box

"Bolt Utility Box" contains various utility methods for [Bolt CMS](http://bolt.cm).  Current twig functions:

### String Encryption

```
{{md5('string')}}
```

Converts the given string to an MD5 hash.

### Remove Objects from Array

```
{% set array = [{ 'id': 1, 'name': 'bob'}, { 'id': 2, 'name': 'joe'}, { 'id': 3, 'name': 'kelly'}] %}
{% set removed = remove_record(array, [2]) %}
{{removed}}
```
Removes the ids in arrayIds from the given array of objects.

## Development Notes

This repository is following the branching technique described in [this blog post](http://nvie.com/posts/a-successful-git-branching-model/), and the semantic version set out on the [Semantic Versioning Website](http://semver.org/).  We also follow [FIG Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) for writing code.

## License

This script is created by Missional Digerati and is under the [GNU General Public License v3](http://www.gnu.org/licenses/gpl-3.0-standalone.html).
