<?php

namespace App\Providers;

use App\Example\Example;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Podriamos crear un service provider exclusivo para nuestra funcionalidad.
        $this->app->bind('example', function() {
            $name = 'John Doe';

            return new Example($name);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
