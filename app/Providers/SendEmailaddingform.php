<?php

namespace App\Providers;

use App\Providers\formadd;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailaddingform
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  formadd  $event
     * @return void
     */
    public function handle(formadd $event)
    {
        //
    }
}
