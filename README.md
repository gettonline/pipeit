# Pipe IT (pipe operator)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gettonline/pipeit.svg?style=flat-square)](https://packagist.org/packages/gettonline/pipeit)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/gettonline/pipeit/run-tests?label=tests)](https://github.com/gettonline/pipeit/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/gettonline/pipeit/Check%20&%20fix%20styling?label=code%20style)](https://github.com/gettonline/pipeit/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/gettonline/pipeit.svg?style=flat-square)](https://packagist.org/packages/gettonline/pipeit)

The missing pipe operator for PHP 7 and up.

## Installation

You can install the package via composer:

```bash
composer require gettonline/pipeit
```

## Usage

### Simple
```php
pipe('foo bar')
    ->strtoupper()
    ->value

// FOO BAR
```

### With value on a different position

Not all functions require the value as the first argument, with `PIPE_IT` you can move the value argument.

```php
pipe('  hello there')
    ->trim()
    ->str_replace('there', 'world', PIPE_IT)
    ->ucwords()
    ->value

// Hello World
```

### With a closures
```php
pipe('gettonline.com')
    (function ($v) {
        return 'https://' . $v;
    })
    ->value

// https://gettonline.com
```

### Automatically cast to string
```php
print pipe([1,2,3])
    ->array_sum()

// 6
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Thijs Simonis](https://github.com/gett-thijssimonis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

