<?php

namespace ViteGroup\ViteLicense;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class ViteLicenseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/vitelicense.php' => config_path('vitelicense.php'),
            __DIR__ . '/../app/Http/Middleware/ViteLicenseMiddleware.php' => app_path('Http/Middleware/ViteLicenseMiddleware.php'),
        ], 'vitelicense');

        try {
            if (!file_exists(config_path('vitelicense.php'))) {
                $this->commands([
                    \Illuminate\Foundation\Console\VendorPublishCommand::class,
                ]);

                Artisan::call('vendor:publish', ['--provider' => 'ViteGroup\\ViteLicense\\ViteLicenseServiceProvider', '--tag' => ['vitelicense']]);
            }
        } catch (\Exception $e) {}
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/vitelicense.php', 'vitelicense'
        );
        $this->app->singleton(\ViteGroup\ViteLicense\ViteLicenseSdk::class, function ($app) {
            $api_key = $app['config']['vitelicense.api_key'];
            return new \ViteGroup\ViteLicense\ViteLicenseSdk($api_key);
        });
    }
}
