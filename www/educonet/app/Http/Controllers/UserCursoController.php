<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;


class UserCursoController extends Controller
{
   public function mostrarCursos()
   {
       $cursos = Cursos::paginate(10);
       return view("cursos.index", compact("cursos"));
   }

   public function mostrarCurso($id)
   {
       $curso = Cursos::find($id);
       return view("cursos.curso", compact("curso"));
   }

   public function download($id)
   {

   
    $curso=Cursos::where('id',$id)->firstOrFail();
    $pathToFile=storage_path("app/public/pdf/" . $curso->descargable );
    return response()->download($pathToFile);
   }


}