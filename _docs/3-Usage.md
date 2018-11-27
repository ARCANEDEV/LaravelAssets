# 3. Usage

## Table of contents

  1. [Installation and Setup](1-Installation-and-Setup.md)
  2. [Configuration](2-Configuration.md)
  3. [Usage](3-Usage.md)
  4. [Extra](4-Extra.md)

### Artisan Commands

#### assets:init

This command is recommended to be launched when you start a new laravel project because it will change your assets structure instead of using the default one.

```bash
php artisan assets:init
```

To customize the folders structure or names, check the package's config file.

#### assets:make

This command will create an asset folder for your project with a predefined preset.

```bash
php artisan assets:make
```

You can also specify the name and the preset if you want to avoid the console questions:

```bash
php artisan assets:make admin --preset bootstrap
```
