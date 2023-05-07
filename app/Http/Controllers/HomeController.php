<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * methode 2 for Middleware euth ( the first is in route )
     * 
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(auth()->check()){
        //     // If the user only authenticated
        //     echo auth()->user()->name;
        //   }
        return view('home');
    }
}
