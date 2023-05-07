<?php

namespace App\Mail;

use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class testmail extends Mailable
{
    use Queueable, SerializesModels;

        /**
     * The Form instance.
     * send $data to view below 'forms.mail'
     * 
     * @var \App\Models\Form
     */
    public $data;


    /**
     * Create a new message instance.
     * recive data "$form" from sender ( formconroller , send{} )
     * and stocke it inside thr property $data
     *
     * @param  \App\Models\Form  $form
     * @return void
     * can we call it with any var name , with out model Form !!
     */
    public function __construct(Form $form)
    {
        $this->data = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('email@configuredby.default' ,  'title : laravel mail test')
        ->subject('the subject ...')
        // the html mail from the view
        ->view('forms.mail');
    }
}
