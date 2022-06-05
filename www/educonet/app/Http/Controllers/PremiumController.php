<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PremiumController extends Controller
{
   public function mostrarVistaPremium()
   {
       
       return view("miembroPremium.index");
   }




}
