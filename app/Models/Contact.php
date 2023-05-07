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
  
        static::created(function ($item) {
                
            $adminEmail = "ramikii41@gmail.com";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}


// The boot method is used to register an event listener for the created event. This event is fired whenever 
//  a new Contact instance is created and saved to the database. When this event is fired, the anonymous function
//   passed to it will be executed, which sends an email notification to the administrator specified by the $adminEmail variable.
//    The ContactMail class is a Mailable class that defines the email content and recipient.