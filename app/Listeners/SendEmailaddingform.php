<?php

namespace App\Listeners;

use App\Events\FormAdd;
use App\Mail\testmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
     * @param  FormAdd  $event
     * @return void
     */
    public function handle(FormAdd $event)
    {
        // send mail by the listener if the event (FormAdd) is lanced or fired
        Mail::to(['ramikii41@gmail.com'])->send(new testmail($event->data));
    }
}
