<?php

namespace App\Http\Controllers;

use App\Traits\TestTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

// use our helper for date format
use function App\Providers\format_date;

class testFormController extends Controller
 {

    // use test trait
    use TestTrait ;

    
     //  public function contact_us()
    //  {
    //      return "contact_us";
    //  }
   

    public function form_test($t)
    {
        // add a parametre who is a random number
        $n = rand(1,100);
        
        //get the current date (carbon instance)
        echo $date = now() ;
        echo "<br>";

        // test trait 
        $user = $this->getModel(user::class) ;
        echo "<h5>" . $user->first()->id  ."</h5>" ;

        // test helper (get the current date) using a custom service provider ( see providers/helperserviceprovider.php)
        // dont forget to use function App\Providers\format_date above ( this function path is regstered in config/app autoload service 'providers');
        echo format_date($date);

        // catche the parametre given from the route and pass it to view as new varivale ($foo) ,
        // the value of $t parametre is givin in route parametre form/{test}  by get methode 
        // $req->input() return just the input fields 
        return view('form_test' , compact('n'))->with("foo" , $t);
        //or : 
        // $name = $req->input('username');
        // return view('form_test')->with("foo" , $t)->with('n' , $n)->with("req" , $name );

        // with() methode of redirect is to flash data to session
        // with() methode of view is to pass data to view directly

    }
     

    // in this case Laravel will attempt to find the request instance matching in place of type hinting  
    public function form_p_test(request $re)
    {    
        // test simple helper (see test_helper.php) : 
        echo example_helper($re->input('username'));

        $n = 'random-num';
 
        // send data to route without param (just ex)
        // $r = $re->all(); //facultative !
        // return $re["Age"] ."---". $re["Note"] ;  
        
        // ************ methodes to retrive data ***********

        // $v = $re->Note;
        // echo $v ;

        $v = $re->input();  // to specifier $v = $re->input('Note')
        // var_dump($v) ;

        // $v = $_POST['Note']; 
        // echo $v ;

        //*********************************************** */

        // with() send data in a session ( just in redirect methode )
        // return redirect()->route('form.bar', [$n]  )->with("re", $re->input("Age"));  
        
        // return view('form_test' , compact('n'))->with("foo", "other_methode _in_controle")->with("re", $re )->with("v", $v );
        // or
        return view('form_test' , ["n" => $n , "foo" => "other_methode _in_controle" , "re" => $re , "v" => $v] );
    }
}


        // notes : 

        // share data ( ex : with all viwes ) :
        // The share() method will take two arguments, key and value. Typically share() method can be called from boot method of service provider.
        // We can use any service provider, AppServiceProvider or our own service provider.
        // Change the code of boot method in the file app/Providers/AppServiceProvider.php

        // public function boot() {  view()->share('name', 'my name');  }
        // we can call the variable $name in all views