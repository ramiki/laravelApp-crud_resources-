<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
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

 /* route::get('test/{n}', function ($n)  {
    echo   " hello " . $n ;   
})->where ('n' , '[a-z]+');
*/

//  here a demo for routes url by letters !! 

Route::get('/contact', [FormController::class, 'contact_us']);
// Route::get('/form', [FormController::class, 'form_test']);

// form route


Route::resource('forms', FormController::class);