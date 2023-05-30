<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\formsRequest;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
// DB facade
use Illuminate\Support\Facades\DB;
// add for mail
use Illuminate\Support\Facades\Mail;
use App\Mail\testmail;
use App\Models\CustomNotification;
// notificaitons
use App\Notifications\CreatedForm;
use Illuminate\Support\Facades\Notification;

class ApiController extends Controller
{

     // ----- her we use our middleware jwt ( see routes/api.php)
     // use auth:api middleware for checking the token if exist and give it to all auth() methde in this controller
     // if no middleware given u must call evry auth methode by there api token ( auth('api') )
     // middleware auth is declared in karnel.php and we pass to it api as parametre !!
    // public function __construct() {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $forms = form::latest()->paginate(5); 
        
        // check if auth user is admin to return all forms
        // if not admin return just forms created by authantiqued user
        $forms = auth()->user()->is_admin ? Form::all() : auth()->user()->forms()->get();
             
        // retrive forms of auth user only (by id ), with relationhip ( forms() is the methode of relationship in the user modele )
        // $forms = form::where('user_id' , auth()->user()->id)->paginate(20);
          
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

       // call  : http://127.0.0.1:8000/api/forms?page=1 ....
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
    public function store(formsRequest $request)
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

        // if image uploaded store it in storage , if no image given set a default image 
        $request['image'] = $request->hasFile('image') ? $request->image->store('image') : 'image/default.png';
        
        // user_id of the form creator = 'id' of the user retrived by the token of authantified user (auth('api) return token of user) 
        $request['user_id'] = Auth('api')->user()->id;

        $request->only(['name', 'email', 'age', 'note']);
        $form = form::create($request->all());

        // retrive all users id except hte authentified user
        $users = User::where('id', '!=' , Auth('api')->user()->id)->get() ;
        // user_creat is declared automatiquely in createdform notification ('user_created' => Auth()->user()->name),
        $user_creat = [] ;
        Notification::send($users,new CreatedForm($form->id,$form->name,$user_creat));

        return response()->json(['message' => 'Data received successfully.' , "data" => $form]);


        // call  : http://127.0.0.1:8000/api/forms
        // method: POST
        // data (row): { name: “Title”, email: email ..” }
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
        // use the policy to restrict show forms of other users 
        $this->authorize('view', $form);

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

        // if any image is uploaded use the old user image
        // if ($request->hasFile('image')) {
        //     $data['image'] = $request->image->store('image');
        // }

        $form->update($request->all());

        return [
            "status" => 1,
            "data" => $form,
            "msg" => "Form updated successfully"
        ];

        // call  : http://127.0.0.1:8000/api/forms/{id}
        // method: PUT/PATCH
        // data (row or x-www-form... ): { name: “Title”, email: email ..” }
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
