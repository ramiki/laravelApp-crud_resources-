<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
use App\Models\Form;

use App\Events\formadd;
use App\Listeners\SendEmailaddingform;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        FormAdd::class => [
            SendEmailaddingform::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // built in laravel elequent event "created | updated | deleted ....."  ( send mail if a form created | or any logic )
        // we can ad multiple envent 
        // we can register events in appserviceprovider instead of evntserviceprovider

        // Form::created(function ($form) {
        //     Mail::to($form->email)->send(new testmail($form));
        // });
    }
}
