# vitelicense.io Laravel

The free Laravel package to help you integrate with vitelicense.io

## Use Cases

- Create and manage software with vitelicense.io 
- Manage devices with vitelicense.io
- Create and manage licenses with vitelicense.io

## Features

- Dynamic vitelicense.io credentials from config/vitelicense.php
- Easy to create payment link with a simple line code

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

After publishing the package assets a configuration file will be located at <code>config/vitelicense.php</code>. Please contact vitelicense.io to get those values to fill into the config file.

#### Step 5. Add middleware protection:

###### app/Http/Kernel.php

```php
<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Other kernel properties...
    
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Other middlewares...
         'vitelicense' => 'ViteGroup\ViteLicense\Http\Middleware\ViteLicenseMiddleware',
    ];
}
```

<!--- ## Usage --->

## Testing

``` php
<?php

namespace App\Console\Commands;

use ViteGroup\ViteLicense\ViteLicenseSdk;
use Illuminate\Console\Command;

class ViteLicenseTestCommand extends Command
{
    protected $signature = 'vitelicense:test';

    protected $description = 'Test ViteLicense SDK';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $instance = new ViteLicenseSdk();
        echo $instance->create_payment(
            'INV-test-01',
            10000,
            'Description-test-01',
            'http://localhost:8000/return',
            'http://localhost:8000/back'
        );
    }
}
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email contact@ViteGroup.vn or use the issue tracker.

## Credits

- [Vite., Ltd](https://github.com/vitegroupltd)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
