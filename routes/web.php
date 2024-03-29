<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\testFormController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConsumController;
use App\Models\User;
// Customizing Missing Model Behavior:
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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


// email sender
Route::get('forms/mail', [FormController::class, 'send'])->name('forms.mail');
// email template ( to check , get it without data)
// Route::get('forms/m',function () { return view('forms/mail'); });


//contact us
Route::get('contact-us', [ContactController::class, 'index'])->name('contact-us');
// contact us email template ( to check , get it without data)
// Route::get('contact', function () { return view('emails.contact'); });
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');


// forms route with crud name ( form.index - form.show .....)
// Route::resource() is a helper method that generates individual routes
// see Naming Resource Routes in laravel doc to rename the resources default names 
// middleware for authentification ( add 'verified' for email verification )
Route::resource('forms', FormController::class)->middleware('auth')

    // change param name of resources : 
    // ->parameters(['forms' => 'something'])

    // Customizing Missing Model Behavior , redirect if resources methode name was not matched ( ../forms/foo ) :
    ->missing(function (Request $request) {
        return Redirect::route('forms.index');})
    ;


// notification mark as read 
Route::get('notification/markasread', function () {
        // DB::table('notifications')->where('notifiable_id' , Auth()->user()->id )->update(['read_at' => now()]);
        // or
        $user = User::find(Auth()->user()->id);
        // foreach ($user->notifications as $notification) {
        //     $notification->markAsRead();
        // }
        // or
        // $user->unreadNotifications()->update(['read_at' => now()]);
        // or delete all notification 
        $user->notifications()->delete();

        return Redirect::route('forms.index');
        })->name('markasread');


// routes added by ui auth
// Auth::routes(['verify' => true]);  // active eamail verification
Auth::routes();

// home default redirect
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth' , 'verified')->name('home');

// api consummation routes
Route::get('cons', [ConsumController::class, 'get']);
Route::get('post', [ConsumController::class, 'creat']);



/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------

// reltionship (test)
// Route::get('test/{id}', function ($id) {
//     $user = \App\Models\user::findorfail($id);
//     $user->forms()->updateorcreate(["user_id" => $user->id],['name' => 'update d mark']);
//     // dd($user->forms);
//     foreach ($user->forms as $k) {
//         echo $k->name ;
//         echo '<br>';
//     }
// });


// route url get parametred ( test )
// route::get('test/{n}', function ($n)  {
//    echo   " hello " . $n ;   
// })->where ('n' , '[a-z]+');  // constrain the format of your route parameters using the where()


// parametred route to pass it to controller or view  // ->name() named route to call it in views when needed
// Route::get('form/{test}', [testFormController::class, 'form_test'])->name('form.bar');
// Route::post('form', [testFormController::class, 'form_p_test']);

// Route::get('contact', [testFormController::class, 'contact_us']);

|-----------------------------------------------------------------------------
*/

