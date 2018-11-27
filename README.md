# Laravel Assets [![Packagist License][badge_license]](LICENSE.md) [![For Laravel 5][badge_laravel]][link-github-repo]

[![Travis Status][badge_build]][link-travis]
[![Coverage Status][badge_coverage]][link-scrutinizer]
[![Scrutinizer Code Quality][badge_quality]][link-scrutinizer]
[![SensioLabs Insight][badge_insight]][link-insight]
[![Github Issues][badge_issues]][link-github-issues]

[![Packagist][badge_package]][link-packagist]
[![Packagist Release][badge_release]][link-packagist]
[![Packagist Downloads][badge_downloads]][link-packagist]

*By [ARCANEDEV&copy;](http://www.arcanedev.net/)*

This Assets package allows you to structure your assets into multiple workspaces (like frontoffice + backoffice + components + packages&hellip;).

**IMPORTANT:** This package is a helper like `php artisan preset` built on top of the [Yarn's workspaces feature](https://yarnpkg.com/lang/en/docs/workspaces).

## Features

  * A very flexible assets management.
  * Easy setup &amp; configuration.
  * Well documented &amp; IDE Friendly.
  * Made with :heart: &amp; :coffee:.

## Table of contents

  1. [Installation and Setup](_docs/1-Installation-and-Setup.md)
  2. [Configuration](_docs/2-Configuration.md)
  3. [Usage](_docs/3-Usage.md)
  4. [Extra](_docs/4-Extra.md)

## Description

This package allows you to generate a structure like this (and it's customizable)

```
laravel-projet
  |--app
  |--assets
  |  |--laravel (frontoffice with dependencies: bootstrap + jquery + popper.js + vue + axios)
  |  |--admin (backoffice with dependencies: tailwind + vue + axios)
  |  |--alert-component (shared vue component)
  |  ...
  |--config
  ...
```

The `laravel-mix` will generate the **frontoffice** assets `[laravel]` (css/app.css, js/app.js), same as the **backoffice** assets `[admin]` (css/admin.css, js/admin.js).

And both `[laravel]` and `[admin]` has their own `package.json` file (+ their dependencies) and also can *re-use* the shared component `[alert-component]` (for example) as a dependency.

For example:

**assets/laravel/package.json**
```json
{
    "private": true,
    "name": "@assets/laravel",
    "version": "1.0.0",
    "devDependencies": {
        "axios": "^0.18",
        "bootstrap": "^4.0.0",
        "jquery": "^3.2",
        "laravel-mix": "^2.0",
        "lodash": "^4.17.5",
        "popper.js": "^1.12",
        "vue": "^2.5.17",
        "@assets/alert-component": "~1.0.0"
    }
}
```

**assets/laravel/js/app.js**
```js
//...

@require('@assets/alert-component');

//...
```

**assets/laravel/sass/app.scss**
```sass
//...

@require('~@assets/alert-component/sass/style.scss');

//...
```

## Contribution

Any ideas are welcome. Feel free to submit any issues or pull requests, please check the [contribution guidelines](CONTRIBUTING.md).

## Security

If you discover any security related issues, please email arcanedev.maroc@gmail.com instead of using the issue tracker.

## Credits

  - [ARCANEDEV][link-author]
  - [All Contributors][link-contributors]

[badge_laravel]:      https://img.shields.io/badge/For%20Laravel-5.7-orange.svg?style=flat-square
[badge_license]:      https://img.shields.io/packagist/l/arcanedev/laravel-assets.svg?style=flat-square
[badge_build]:        https://img.shields.io/travis/ARCANEDEV/LaravelAssets.svg?style=flat-square
[badge_coverage]:     https://img.shields.io/scrutinizer/coverage/g/ARCANEDEV/LaravelAssets.svg?style=flat-square
[badge_quality]:      https://img.shields.io/scrutinizer/g/ARCANEDEV/LaravelAssets.svg?style=flat-square
[badge_insight]:      https://img.shields.io/sensiolabs/i/7e64bd56-73d5-4a3e-9114-abf6abdc65e7.svg?style=flat-square
[badge_issues]:       https://img.shields.io/github/issues/ARCANEDEV/LaravelAssets.svg?style=flat-square
[badge_package]:      https://img.shields.io/badge/package-arcanedev/laravel--assets-blue.svg?style=flat-square
[badge_release]:      https://img.shields.io/packagist/v/arcanedev/laravel-assets.svg?style=flat-square
[badge_downloads]:    https://img.shields.io/packagist/dt/arcanedev/laravel-assets.svg?style=flat-square

[link-author]:        https://github.com/arcanedev-maroc
[link-github-repo]:   https://github.com/ARCANEDEV/LaravelAssets
[link-github-issues]: https://github.com/ARCANEDEV/LaravelAssets/issues
[link-contributors]:  https://github.com/ARCANEDEV/LaravelAssets/graphs/contributors
[link-packagist]:     https://packagist.org/packages/arcanedev/laravel-assets
[link-travis]:        https://travis-ci.org/ARCANEDEV/LaravelAssets
[link-scrutinizer]:   https://scrutinizer-ci.com/g/ARCANEDEV/LaravelAssets/?branch=master
[link-insight]:       https://insight.sensiolabs.com/projects/7e64bd56-73d5-4a3e-9114-abf6abdc65e7
