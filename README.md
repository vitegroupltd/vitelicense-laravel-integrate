# vitelicense.io Laravel

The free Laravel package to help you integrate with vitelicense.io

## Use Cases

- Create and manage software with vitelicense.io 
- Manage devices with vitelicense.io
- Create and manage licenses with vitelicense.io

## Features

- Dynamic vitelicense.io credentials from config/vitelicense.php
- Easy to manage your software licenses with a few lines of coding

## Requirements

- **PHP**: 8.1 or higher
- **Laravel** 9.0 or higher

## Quick Start

If you prefer to install this package into your own Laravel application, please follow the installation steps below

## Installation

#### Step 1. Install a Laravel project if you don't have one already

https://laravel.com/docs/installation

#### Step 2. Require the current package using composer:

```bash
composer require vitegroupltd/vitelicense-laravel-integrate
```

#### Step 3. Publish the controller file and config file

```bash
php artisan vendor:publish --provider="ViteGroup\ViteLicense\ViteLicenseServiceProvider" --tag="vitelicense"
```

If publishing files fails, please create corresponding files at the path `config/vitelicense.php` and `app\Http\Controllers\ViteLicenseControllers.php` from this package. And you can also further customize the ViteLicenseControllers.php file to suit your project.

#### Step 4. Update the various config settings in the published config file:

After publishing the package assets a configuration file will be located at <code>config/vitelicense.php</code>. Please find in vitelicense.io to get those values to fill into the config file.

<!--- ## Usage --->

## RESTful API Documentation

Please see [POSTMAN DOCUMENTATION](https://documentation.vitelicense.io) for details.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email contact@ViteGroup.vn or use the issue tracker.

## Credits

- [Vite., Ltd](https://github.com/vitegroupltd)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
