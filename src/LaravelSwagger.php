<?php

namespace Ladumor\LaravelSwagger;

use Illuminate\Support\Facades\Facade;

class LaravelSwagger extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-swagger';
    }
}