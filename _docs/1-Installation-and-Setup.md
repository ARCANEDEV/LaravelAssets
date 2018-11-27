# 1. Installation

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)
  4. [Extra](4-Extra.md)

## Server Requirements

The Laravel Assets package has a few system requirements:

```
- PHP >= 7.1.3
- ext-json
```

You need also to install [Yarn](https://yarnpkg.com) `version >= 1.0`. 

## Version Compatibility

| LaravelAssets                                 | Laravel                      |
|:----------------------------------------------|:-----------------------------|
| ![LaravelAssets v5.7.x][laravel_assets_5_7_x] | ![Laravel v5.7][laravel_5_7] |

[laravel_5_7]:  https://img.shields.io/badge/v5.7-supported-brightgreen.svg?style=flat-square "Laravel v5.7"

[laravel_assets_5_7_x]: https://img.shields.io/badge/version-5.7.*-blue.svg?style=flat-square "LaravelAssets v5.7.*"

## Composer

You can install this package via [Composer](http://getcomposer.org/) by running this command: `composer require arcanedev/laravel-assets --dev`.

### Artisan commands

To publish the config file, run this command:

```bash
php artisan vendor:publish --provider="Arcanedev\Assets\AssetsServiceProvider"
```
