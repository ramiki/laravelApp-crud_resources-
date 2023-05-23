<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // methode 2 : path registred in config/app.php autoload service 'provider' ( use in testcontroller )
           function format_date($date) {
            return date('F j, Y', strtotime($date));
    }


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
