<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Event;
use App\Events\formadd;
use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth; // error in view use Auth instead
use Auth;

// add aditionale request for validation
use App\Http\Requests\formsRequest;
use App\Models\Form;
use GuzzleHttp\Middleware;
// use Illuminate\support\str;

// add for mail
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;

// use Auth;

// DB facade
use Illuminate\Support\Facades\DB;
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
        //     dd($forms);
        // foreach ($forms as $form) {
        //     echo "<pre>" .$form->name . "</pre>";  } die;

        // The latest and oldest methods allow you to easily order results by date. By default, result will be ordered by the created_at column.
        //  Or, you may pass the column name that you wish to sort ( ref : ) 
        // we can change latest() to all() for get all records 
        // check for admin
        if (auth::user()->is_admin) {
            $forms = Form::latest()->paginate(20);  // adding ->pagination(5) for pagination with 5 pages ( ref : https://laravel.com/docs/7.x/pagination )
        } else {
            // $forms = form::where('user_id' , auth()->user()->id)->paginate(20); // retrive forms of auth user only , by id
            $forms = auth()->user()->forms()->paginate(8); // retrive forms of auth user only , by relationhip ( forms() is the methode of relationship in the user modele )
        }

        // return view('forms.index')->with('forms' , $forms)   //  with is used to add data to the current request object, making it available to the view
        return view('forms.index', compact('forms'))           // compact() function in php who is used as an argument to the view method , making the $forms variable available to the view. 
            ->with('i', (request()->input('page', 1) - 1) * 5); // add number column in view ( <th>No</th> )
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

        //test request
        // dd($request->url());  // get the ruequest url
        // dd(url('test/login')); // generate an url based app 

        // collecting the posted name="attrebute"... as array and past theme to the $fillable property in Form model
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

        //methode 2 : call the model automaticly and affect request field to the filable filed of model
        //best methode is to affect request->all() to a variable "$data" and then manipule it (request work as key => value)

        // image uploade and store 
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('image');
        }
        $data['user_id'] = Auth()->user()->id;

         $form = form::create($data);

        if($form){
            //lance or fire the event if form created
        Event(new FormAdd($form));
        }
        
        // bad methode
        //     if( $request->hasFile('photo') ){
        //         $request['image'] = $request->photo->store('image');
        //         // $request->merge(['imag' => $imagePath]);
        //    }
        //    dd($request['image'] .'---'. $request['photo']);
        //    $request['user_id'] = Auth()->user()->id;
        //    form::create($request->all());


        //flash session methode 1 :
        session()->flash('success', 'data created successfully ');
        return redirect()->route('forms.index');
        // Flashing Data : send variable "success" with its value "data created successfully" in a get session "session::get('success'))" to view forms/index
        // flash message est une variable session la duree de sa vie est just une seule requet http .
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
        //reconvert name passed by view to route
        // $form = str_replace('_', ' ', $for);

        //db facade
        // $form = DB::table('forms')->where('name', $form)->first();
        // elequent
        // $form = form::where('name',$form)->first();

        //replace spaces in name : 
        // $form->name = str::slug($form->name , '--');
        //or
        // $form->name = str_replace(' ', '_', $form->name);

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
            'image' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('image');
        }

        $form->update($data);
        // $form->create($request->all());

        //flash session methode 2 :
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

        //send to all with data
        // $forms = Form::All();

        $form = Form::where('email', 'ramikii41@gmail.com')->first();

            Mail::to($form->email)->send(new testmail($form));

        // send to specified mail wihout data ( for test )
            // Mail::to(['ramikii41@gmail.com'])->send(new testmail());

        return redirect()->route('forms.index')->with('success', 'email sent successfully');
    }
}
