<?php

namespace Cmercado93\EverlyticApi\LaravelProviders;

use Cmercado93\EverlyticApi\Configs;
use Illuminate\Support\ServiceProvider;

class EverlyticApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Configs::setConfig([
            'base_url' => config('everlytic_api.base_url'),
            'username' => config('everlytic_api.username'),
            'api_key' => config('everlytic_api.api_key'),
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/configs.php' => config_path('everlytic_api.php'),
        ]);
    }
}
