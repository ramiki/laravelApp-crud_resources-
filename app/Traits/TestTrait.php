<?php

namespace App\Traits ;
use App\Model\User;

Trait TestTrait {

    // 1 test of trait ( tested in testcontroller )
    public function getModel($model){
        return $model::All() ;
    }

    // 2 test of trait ( tested in model 'CustomNotification' )
    // define local and dynamique scope 'notification'
    public function Scopenotification($query, $form){
    // scope is for minimize the query "look at formcontroller" when we delete the notification
        return $query->where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->delete();
    }

}