<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';
    public $timestamps = true;

    // change the data type after retriving data from db
    protected $casts = [
        'age' => 'int' ,
        'note' => 'int'
    ];

    // adding $fillable property to model work as when creating or updating an instance of the "forms" model, the data can be passed in as an array, 
    // and Laravel will automatically assign the values to the corresponding fields in the model. This is done using the "create" method (look at FormController at store() method )
    protected $fillable = [
        'name',
        'email',
        'created_at',
        'age',
        'note'
    ];

    // public function getRouteKeyName()
    // {
    //     // generate url param by name ( ex in form.show )
    //     return 'name' ;  
    //     //  return str_replace(' ', '-', 'name');  // didn't work
    // }

    // public function getRouteKey()
    // {
    //     return str_replace(' ', '_', $this->getAttribute($this->getRouteKeyName()));
    // }

}
