<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Contact;
  
// add for mail
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        // use the gate ( authorize this page only if admin )
       if (!Gate::allows('access-admin')){
        abort('401');
    }



        return view('contactForm');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());
  
// send email in controller insted of model event ( look at contact model )
    //    $m = Contact::create($request->all());
    //     $adminEmail = "ramikii41@gmail.com";
    //     Mail::to($adminEmail)->send(new ContactMail($m));
  
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
}