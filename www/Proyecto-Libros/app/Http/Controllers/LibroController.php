<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
     public function index(){
        return view('libros.index');
    }
    public function create(){
        return  view('libros.create');
    }
    public function show(){
        return  view('libros.show');
    }


}
