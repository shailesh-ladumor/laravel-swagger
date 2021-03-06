[![Latest Stable Version](http://poser.pugx.org/ladumor/laravel-swagger/v)](https://packagist.org/packages/ladumor/laravel-swagger)
[![Daily Downloads](http://poser.pugx.org/ladumor/laravel-swagger/d/daily)](https://packagist.org/packages/ladumor/laravel-swagger)
[![Monthly Downloads](http://poser.pugx.org/ladumor/laravel-swagger/d/monthly)](https://packagist.org/packages/ladumor/laravel-swagger)
[![Total Downloads](http://poser.pugx.org/ladumor/laravel-swagger/downloads)](https://packagist.org/packages/ladumor/laravel-swagger)
[![License](http://poser.pugx.org/ladumor/laravel-swagger/license)](https://packagist.org/packages/ladumor/laravel-swagger)
[![PHP Version Require](http://poser.pugx.org/ladumor/laravel-swagger/require/php)](https://packagist.org/packages/ladumor/laravel-swagger)

# Laravel Swagger

## Installation

Install the package by the following command,

    composer require ladumor/laravel-swagger

## Add Provider

Add the provider to your `config/app.php` into `provider` section if using lower version of laravel,

    Ladumor\LaravelSwagger\LaravelSwaggerServiceProvider::class,

## Add Facade

Add the Facade to your `config/app.php` into `aliases` section,

    'LaravelSwagger' => \Ladumor\LaravelSwagger\LaravelSwaggerServiceProvider::class,

## Generate Swagger file and publish the Assets. like, view

Run the following command to publish config file,

    php artisan laravel-swagger:generate

## Add route in `web.php` file

```
Route::get('/swagger-docs', function () {
    return view('swagger.index');
});
```

## Other Packages
 * [One Signal](https://github.com/shailesh-ladumor/one-signal)
 * [Laravel PWA](https://github.com/shailesh-ladumor/laravel-pwa) (Progressive Web Application)

## Learn Laravel Packages here
[<img src="https://img.youtube.com/vi/yMtsgBsqDQs/0.jpg" width="580">](https://www.youtube.com/c/LaravelPackageTutorial)

### License
The MIT License (MIT). Please see [License](LICENSE.md) File for more information   
