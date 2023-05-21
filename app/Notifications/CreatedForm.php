<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreatedForm extends Notification
{
    use Queueable;

    private $form_id ;
    private $form_name ;
    private $user_created ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($form_id,$form_name,$user_created)
    {
        $this->form_id = $form_id;
        $this->form_name = $form_name;
        $this->user_created = $user_created;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        //Every notification class has a via method that determines on which
        // channels the notification will be delivered. Notifications may be 
        // sent on the mail "or and" database , broadcast, nexmo, and slack channels.
        
        // just add uncomment return mail and function toMail to send notification to email either
        // in this exemple we used databese : 

        // return ['mail' , 'database'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // toarray and todatabase see the docs
    // send the notification data to db "data" field
    public function toarray($notifiable)
    {
        return [
            'form_id' => $this->form_id,
            'form_name' => $this->form_name ,

            'user_created' => Auth()->user()->name,
            //or
            // $user_created = $this->user_created;
            
        ];
    }
}
