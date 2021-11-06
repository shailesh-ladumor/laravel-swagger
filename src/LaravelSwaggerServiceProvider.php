<?php

namespace Ladumor\LaravelSwagger;

use Illuminate\Support\ServiceProvider;
use Ladumor\LaravelSwagger\commands\GenerateSwagger;

class LaravelSwaggerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laravel-swagger:generate', function ($app) {
            return new GenerateSwagger();
        });

        $this->commands([
            'laravel-swagger:generate',
        ]);
    }
}
