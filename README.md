# A PHP package that implement Bybit API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wss-group/bybitapi.svg?style=flat-square)](https://packagist.org/packages/wss-group/bybitapi)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/wss-group/bybitapi/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/wss-group/bybitapi/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/wss-group/bybitapi/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/wss-group/bybitapi/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/wss-group/bybitapi.svg?style=flat-square)](https://packagist.org/packages/wss-group/bybitapi)

A PHP package that implement [Bybit API](https://bybit-exchange.github.io/docs/v5/intro) (Current implementation v5)

## Installation

You can install the package via composer:

```bash
composer require allanmcarvalho/bybitapi
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="bybit-api-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Work Progress

### See current API implementation progress [here](./PROGRESS.md)

## Usage

```php
$bybitApi = new BybitApi();
echo $bybitApi->echoPhrase('Hello, Allan Mariucci Carvalho!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Allan Mariucci Carvalho](https://github.com/allanmcarvalho)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
