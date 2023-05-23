<?php


// The Notification model used by Laravel for notifications is located at Illuminate\Notifications\DatabaseNotification. 
// However, it is not recommended to modify the core Laravel files directly.
// we create a model and extend the original notification model "Illuminate\Notifications\DatabaseNotification" :

namespace App\Models;

use App\Traits\TestTrait;
use Illuminate\Notifications\DatabaseNotification;

class CustomNotification extends DatabaseNotification
{
    // 1 call local scope in the trait 
     use TestTrait;

    // // 2 directly define local and dynamique scope 'notification' 
    //     public function Scopenotification($query, $form)
    // {
    //    // scope eis for minimize the query "look at formcontroller" when we delete the notification
    //     return $query->where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->delete();
    // }
}