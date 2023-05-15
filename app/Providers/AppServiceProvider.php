<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;  // added for style pagination view with bootstrap
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    public function boot()
    {
        Schema::defaultstringLength(191);  // fix error stringlength

        Paginator::useBootstrap();  // added for style pagination view with bootstrap
    }
}
