<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */


     // añado en el método boot para que la paginación se vea correctamente en la vista correspondiente
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
