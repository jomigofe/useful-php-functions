Useful PHP functions
=====================
![Packagist License](https://img.shields.io/packagist/l/jasny/php-functions.svg)

A set PHP functions that I found useful during my code life

## Usage

Just copy paste




## SQL functions

#### [buildInsertValues](https://github.com/jomigofe/useful-php-functions/blob/master/functions.php#L37 "buildInsertValues")

    array buildInsertValues(string $table, array $fieldss, array $data)

Creates an array with the built 'sql' query, the 'vars' to the query and a 'debug' version of the query


## Array functions

#### [arrayFilterRecursive](https://github.com/jomigofe/useful-php-functions/blob/master/functions.php#L84 "arrayFilterRecursive")

    array arrayFilterRecursive(array $array)

Returns an array without empty fields nor empty arrays

#### [fixArrayKeyForJsonRecursive](https://github.com/jomigofe/useful-php-functions/blob/master/functions.php#L122 "fixArrayKeyForJsonRecursive")

    array fixArrayKeyForJsonRecursive(array $array[, array $ignore = array() ])

Returns an array without empty fields nor empty arrays