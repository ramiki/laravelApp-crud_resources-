<?php


//a test of trait ( tested in testcontroller )
namespace App\Traits ;

use App\Model\User;

Trait TestTrait {


public function getModel($model){

return $model::All() ;

}

}