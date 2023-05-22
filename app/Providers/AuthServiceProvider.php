<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        
            //mapping form model with its policy
        'App\Models\Form' => 'App\Policies\FormPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // register a gate ( use in contactcontroller.php )
    Gate::define('access-admin', function (User $user) {
        return $user->is_admin ;  // if $user->is_admin == true
    });

    // new code wright php +7.4
    // Gate::define('access-admin', fn(User $user) => $user->is_admin) ;

        //
    }
}
