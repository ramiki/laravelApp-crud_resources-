<?php

namespace App\Models;

// to use factory
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
// To enable soft deletes for a model, we add this trait 
use Illuminate\Database\Eloquent\SoftDeletes;


class Form extends Model
{
    use HasFactory;
    use SoftDeletes;

    // aditionale name of table in case changed ! 
    protected $table = 'forms';

    public $timestamps = true;

    // cast : change the data type after retriving data from db
    protected $casts = [
        'age' => 'int' ,
        'note' => 'int'
    ];

    /**
    *  adding $fillable property to model work as when creating or updating an instance of the "forms" model, the data can be passed in as an array, 
    *    and Laravel will automatically assign the values to the corresponding fields in the model. This is done using the "create" method (look at FormController at store() method )
    *   Mass assignment
    */
    protected $fillable = [
        'name',
        'email',
        'created_at',
        'age',
        'note',
        'user_id',
        'image'
    ];

    /** 
    * in the new version laravel >5.. The SoftDeletes trait will automatically cast the deleted_at 
    * attribute to a DateTime / Carbon instance for you , no need to add ligne bellow
    * protected $dates = ['deleted_at'];
    */

    // change the param routes id to name (ex : get users by name "also in url") 
    // public function getRouteKeyName()
    // {
    //     // generate url param by name ( ex in form.show )
    //     return 'name' ;  
    //     // return str_replace(' ', '-', 'name');  // didn't work
    // }

    // public function getRouteKey()
    // {
    //     return str_replace(' ', '_', $this->getAttribute($this->getRouteKeyName()));
    // }

    // belongsto relationship ( retrive user name from user model and show it in index view)
    public function user(){

        return $this->belongsTo(User::class);

    }

    // accessor
    public function getNameAttribute($value)
    {
        // return strtoupper($value) ;
    // or
        return 'Mr . ' . $value;
    }

    // // mutator
    // public function setNameAttribute($value)
    // {
    //     return  $this->attributes['name'] = strtoupper($value) ;
    // }


}
