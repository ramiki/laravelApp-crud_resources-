<?php

namespace App\Http\Controllers;

// hash
use Illuminate\Support\Facades\Hash;

// random str
use Illuminate\Support\Str;

// events 
use Illuminate\Support\Facades\Event;
use App\Events\formadd;
// add aditionale request for validation
use App\Http\Requests\formsRequest;
use App\Jobs\AllAdminJob;
use App\Models\Form;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
// add for mail
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
use App\Models\CustomNotification;
// notificaitons
use App\Notifications\CreatedForm;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Support\Facades\Auth; // error in view use Auth instead
use Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;
// DB facade
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Provider\Lorem;
use Symfony\Component\VarDumper\VarDumper;

class FormController extends Controller
{

    // methode 2 for Middleware euth ( the first is in route )
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // test relationship
        // $user = \App\Models\user::findorfail(3);
        // dd($user->forms[0]->name) ;

        // test queries using the DB facade. it provides methods for each type of query: select, update, insert, delete, and statement. 
        // $forms = DB::select('select * from forms');
        // dd($forms);
        // foreach ($forms as $form) { echo "<pre>" .$form->name . "</pre>";  } die ;

        // The latest and oldest methods allow you to easily order results by date. By default, result will be ordered by the created_at column.
        // Or, you may pass the column name that you wish to sort ( see doc ) 
        // we can change latest() to all() for get all records 
        // check for admin
        if (auth::user()->is_admin) {
            $forms = Form::latest()->paginate(20);  // adding ->pagination(5) for pagination with 5 pages ( ref : https://laravel.com/docs/7.x/pagination )
        } else {
            // $forms = form::where('user_id' , auth()->user()->id)->paginate(20); // retrive forms of auth user only , by id
            $forms = auth()->user()->forms()->paginate(8); // retrive forms of auth user only , by relationhip ( forms() is the methode of relationship in the user modele )
        }

        // return view('forms.index')->with('forms' , $forms)    // with() is used to add data to the current request object, making it available to the view
        return view('forms.index', compact('forms'))             // compact() function in php who is used as an argument to the view method , making the $forms variable available to the view. 
            ->with('i', (request()->input('page', 1) - 1) * 5);  // add number column in view ( <th>No</th> )
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formsRequest $request)
    {

        // test request
        // dd($request->url());   // get the ruequest url
        // dd(url('test/login')); // generate an url based app 

        // collecting the posted name="attribute"... as array and past theme to the $fillable property in Form model
        // required : see validation laravel docs 
        // use the formsrequest for validation insted of direct as bellow
        // $request->validate([
        //     'name'  => 'required',
        //     'email' => 'required',
        //     'age'   => 'bail|required',
        //     'note'  => 'required'
        // ]);

        // methode 1 : call the model manuelly and affect request to its field
        // $form = new Form();
        // $form->name = $request->input('name'); 
        // $form->email = $request->input('email'); 
        // $form->age = $request->input('age'); 
        // $form->note = $request->input('note'); 
        // $form->user_id = auth()->user()->id; 
        // $form->save();

        // methode 2 : call the model automaticly and affect request field to the filable filed of model
        // best methode is to affect request->all() to a variable "$data" and then manipule it (request work as key => value)
        $data = $request->all();

        // image upload and store 
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('image');
        } else {
            $data['image'] = 'image/default.png';
        }

        // bad methode
        // if( $request->hasFile('photo') ){
        //     $request['image'] = $request->photo->store('image');
        //  // $request->merge(['imag' => $imagePath]);
        //  }
        // dd($request['image'] .'---'. $request['photo']);
        // $request['user_id'] = Auth()->user()->id;
        // form::create($request->all());

        $data['user_id'] = Auth()->user()->id;

        $form = form::create($data);

        // select all users exept the user who is euthentified
        $users = user::where('id', '!=' , Auth()->user()->id)->get() ;

        $user_creat = Auth()->user()->name ;

        // use notification facade ( send notification for multi user )
        Notification::send($users,new CreatedForm($form->id,$form->name,$user_creat));

        // use notification trait ( send notification for single user "foreach" it for multi users) ,
        // $users is a collection, so calling notify method on a collection will lead to error. And the method notify only exist on user object instance
        // The Notifiable trait is included on your application's App\Models\User model by default
        // foreach ($users as $user) {
        // $user->notify(new CreatedForm($form->id,$user_creat));   }

        // if($form){
        // //lance or fire the event if form created
        // Event(new FormAdd($form));
        // }

        // Flash session methode 1 :
        session()->flash('success', 'data created successfully ');
        return redirect()->route('forms.index');
        // Flashing Data : send variable "success" with its value "data created successfully" in a get session "session::get('success'))" to view forms/index
        // Flash message est une variable session la duree de sa vie est just une seule requet http .
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param : test get users by name : changed to default sending from view , catched by route  "$for"
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(form $form)
    {
        // reconvert name passed by view to route
        // $form = str_replace('_', ' ', $for);

        // db facade
        // $form = DB::table('forms')->where('name', $form)->first();
        // elequent
        // $form = form::where('name',$form)->first();

        //replace spaces in name : 
        // $form->name = str::slug($form->name , '--');
        // or
        // $form->name = str_replace(' ', '_', $form->name);

        // access to all notifications incomming to this user and read it 
        // $user = User::find(Auth()->user()->id);
        // foreach ($user->notifications as $notification) {
        //         DB::table('notifications')->where('data->form_id',$form->id)->where('id', $notification->id)->update(['read_at' => now()]);
        // }
        //or 
        // $getNotifId = DB::table('Notifications')->where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->pluck('id');
        // DB::table('notifications')->where('id' , $getNotifId)->update(['read_at' => now()]);
        // or the mini way
        // DB::table('notifications')->where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->update(['read_at' => now()]);

        // delete notifications : query builder
        // DB::table('notifications')->where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->delete();
        // eloquent : DatabaseNotification extends Laravel's base Notification model and provides additional functionality specific to database notifications.
        // DatabaseNotification::where('data->form_id',$form->id)->where('notifiable_id' , Auth()->user()->id )->delete();

        // cal local dynamique scope methode to delete the notification
        CustomNotification::notification($form);


        // policy auhorization (see requests/formsrequest)
        $this->authorize('view', $form);

        return view('forms.show')->with('form', $form);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {

        // call the authorize (policy) by its function name (update) and the (form) model 
        $this->authorize('update', $form);
        return view('forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'note' => 'required',
            // 'image' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('image');
        }

        $form->update($data);
        // $form->create($request->all());

        // flash session methode 2 :
        return redirect()->route('forms.index')
            ->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $this->authorize('delete', $form);
        $form->delete();
        return redirect()->route('forms.index')
                ->with('success', 'form deleted successfully');
    }

    // send templated email
    public function send(Request $request)
    {
        // $form = Form::findOrFail($request->user_id);

        // send to all with data
        // $forms = Form::All();

        // $form = Form::where('email', 'ramikii41@gmail.com')->first();
        //     Mail::to($form->email)->send(new testmail($form));

        // send to specified mail wihout data ( for test )
        // Mail::to(['ramikii41@gmail.com'])->send(new testmail());

        // test queue job with data send from controller (make all user admin ) see AllAdminJob.php , 

        $toadmin = User::pluck('id');
        AllAdminJob::dispatch($toadmin)->delay(now()->second(100));  // add a delay befor executing the job

      
        
        return redirect()->route('forms.index')->with('success', 'email sent successfully');
    }
}