<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;
  
class Contact extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
  
    /**
     * send email on created event insted of controller
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();

    /**
     * created() : is a built-in event (or observer ! ) that is triggered by the Eloquent ORM when a new record is successfully created and saved to the database 
     * table associated with the model , $item : represents the Contact instance that triggered the created event, and it contains all the data
     * that was submitted through the associated form, such as the name, email, phone, subject, and message.
    */ 
     static::created(function ($item) {
                
            $adminEmail = "ramikii41@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}

    /**
     * resume :
     * the parent::boot() cal the boot static methode of the parent class who is model  ( class Contact extends Model )
     * The boot method is used to register an event listener for the created event. This event is fired(lunched) whenever 
     * a new Contact instance is created and saved to the database. When this event is fired, the anonymous function
     * passed to it will be executed, which sends an email notification to the administrator specified by the $adminEmail variable.
     * The ContactMail class is a Mailable class that defines the email content and recipient.
     * $item refers to the Contact instance that triggered the created event. In other words, it is the newly created Contact model object.  
     * When the created event is fired, the anonymous function that sends the email is passed the $item object as an argument. This allows the email to be    
     * customized with the details of the new Contact instance, such as the name, email, phone number, subject, and message.
     * The $item object is passed to the ContactMail Mailable class, which is responsible for composing the email message and sending it to the designated administrator email address.
    */