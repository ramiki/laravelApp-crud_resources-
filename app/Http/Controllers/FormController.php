<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\support\str;


// DB facade
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {



        // test queries using the DB facade. it provides methods for each type of query: select, update, insert, delete, and statement. 
        // $forms = DB::select('select * from forms');
        //     dd($forms);
        // foreach ($forms as $form) {
        //     echo "<pre>" .$form->name . "</pre>";  } die;

        // The latest and oldest methods allow you to easily order results by date. By default, result will be ordered by the created_at column.
        //  Or, you may pass the column name that you wish to sort ( ref : ) 
        // we can change latest() to all() for get all records
        $forms = form::latest()->paginate(5);  // adding ->pagination(5) for pagination with 5 pages ( ref : https://laravel.com/docs/7.x/pagination )

        // usage of  her is litle like 
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
    public function store(Request $request)
    {
        // collecting the posted name="attrebute" as array and past theme to the $fillable property in Form model
        // required : see validation laravel docs 
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'age'   => 'bail|required',
            'note'  => 'required'
        ]);

        form::create($request->all());

        return redirect()->route('forms.index')
            ->with('success', 'data created successfully.');
        //  Flashing Data : send variable "success" with his value "data created successfully" in a get session "session::get('success'))" to view forms/index 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @param : test get users y name : changed to default sending from view , catched by route  "$for"
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(form $form)
    {
        //re_convert name passed by view to route
        // $form = str_replace('_', ' ', $for);

        //db facade
        // $form = DB::table('forms')->where('name', $form)->first();
        // elequent
        // $form = form::where('name',$form)->first();

        //replace spaces in name : 
        // $form->name = str::slug($form->name , '--');
        //or
        // $form->name = str_replace(' ', '_', $form->name);

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
            'note' => 'required'
        ]);
        $form->update($request->all());
        // $form->create($request->all());

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
        $form->delete();

        return redirect()->route('forms.index')
            ->with('success', 'form deleted successfully');
    }
}
