<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\testFormController;

// Customizing Missing Model Behavior:
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//  route url get parametred (jus test)
/* route::get('test/{n}', function ($n)  {
    echo   " hello " . $n ;   
})->where ('n' , '[a-z]+');  // constrain the format of your route parameters using the where()
*/

// Route::get('contact', [testFormController::class, 'contact_us']);


//parametred route to pass it to controller or view  //  named route to call it in views when needed
Route::get('form/{test}', [testFormController::class, 'form_test'])->name('form.bar');
Route::post('form', [testFormController::class, 'form_p_test']);


// form route with crud name ( form.index - form.show .....)
// Route::resource() is a helper method that generates individual routes
// see Naming Resource Routes in laravel doc to rename the resources default names 
Route::resource('forms', FormController::class)
    // change param name of resouces : 
    // ->parameters(['forms' => 'something'])

    // Customizing Missing Model Behavior , redirect if resources methode name was not matched ( ../forms/foo ) :
    ->missing(function (Request $request) {
        return Redirect::route('forms.index');
    });
