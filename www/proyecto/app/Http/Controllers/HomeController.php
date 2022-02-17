<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){


        if(Auth::user()->hasRoles('Admin')){

           
            return view("admin.index"); // Esto nos devolveria la vista del admin.

        }else{

            
        return view('home');
        }
    }
      
}

