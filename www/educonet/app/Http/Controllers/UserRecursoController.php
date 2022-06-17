<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recursos;


class UserRecursoController extends Controller
{
   public function mostrarRecursos()
   {
       $recursos = Recursos::paginate(10);
       return view("recursos.index", compact("recursos"));
   }

   public function mostrarRecurso($id)
   {
       $recurso = Recursos::find($id);
       return view("recursos.recurso", compact("recurso"));
   }

   public function download($id)
   {

   
    $recurso=Recursos::where('id',$id)->firstOrFail();
    $pathToFile=storage_path("app/public/pdf/" . $recurso->descargable );
    return response()->download($pathToFile);
   }


}
