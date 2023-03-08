<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;


// DB facade
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $forms = form::latest()->paginate(5); 
        
        
        // If you need to customize the response headers or content, 
        // or need to return different status codes based on the request or
        // response data, then using the response() method may be more appropriate. 
        // If you need a simple and concise response with fixed status code and data,
        // then using a plain PHP array may be sufficient

         // return response()->json($forms, 200);

        return [
            "status" => 200,
            "data" => $forms
        ]; 

       // call  : http://127.0.0.1:8000/api/forms
       // method: GET
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'name'  => 'required',
        //     'email' => 'required',
        //     'age'   => 'bail|required',
        //     'note'  => 'required'
        // ]);

        // $form = form::create($request->all());

        // return [
        //     "status" => 1,
        //     "data" => $form
        // ];

// or
        
        $request->only(['name', 'email', 'age', 'note']);
        $form = form::create($request->all());
        return response()->json(['message' => 'Data received successfully.' , "data" => $form]);


         // call  : http://127.0.0.1:8000/api/forms
         // method: POST
         //  data (row): { name: “Title”, email: email ..” }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(form $form)
    {
        return [
            "status" => 1,
            "data" =>$form
        ];

         // call  : http://127.0.0.1:8000/api/forms/{id}
         // method: GET
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
       //
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

        return [
            "status" => 1,
            "data" => $form,
            "msg" => "Form updated successfully"
        ];

          // call  : http://127.0.0.1:8000/api/forms/{id}
         // method: PUT/PATCH
         //  data (row): { name: “Title”, email: email ..” }
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

        return [
            "status" => 1,
            "data" => $form,
            "msg" => "Form deleted successfully"
        ];

          // call  : http://127.0.0.1:8000/api/forms/{id}
         // method: DELETE
    }
}
