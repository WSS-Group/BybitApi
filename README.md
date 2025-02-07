# A PHP package that implement Bybit API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wss-group/bybitapi.svg?style=flat-square)](https://packagist.org/packages/wss-group/bybitapi)
[![Total Downloads](https://img.shields.io/packagist/dt/wss-group/bybitapi.svg?style=flat-square)](https://packagist.org/packages/wss-group/bybitapi)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/wss-group/bybitapi/run-tests.yml?branch=5.x&label=tests&style=flat-square)](https://github.com/wss-group/bybitapi/actions?query=workflow%3Arun-tests+branch%3A5.x)
[![Fix Code Style](https://github.com/WSS-Group/BybitApi/actions/workflows/lint.yml/badge.svg)](https://github.com/WSS-Group/BybitApi/actions/workflows/lint.yml)
[![codecov](https://codecov.io/gh/WSS-Group/BybitApi/graph/badge.svg?token=OFDCnGWLEC)](https://codecov.io/gh/WSS-Group/BybitApi)
[![Static Badge](https://img.shields.io/badge/Progress-19.3%25%20(33%2F145)-blue)](PROGRESS.md)


A PHP package that implement [Bybit API](https://bybit-exchange.github.io/docs/v5/intro) (Current implementation v5)

## Installation

You can install the package via composer:

```bash
composer require wss-group/bybitapi
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

Please see [PROGRESS](PROGRESS.md) for more information about current implementation progress.

## Usage

```php
// Market group
\BybitApi\Facades\Market::actingAs($entity)->getBybitServerTime();
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
