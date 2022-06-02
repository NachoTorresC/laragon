<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profesores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Storage; importacion para imagenes


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesores::paginate(10);
        
        return view('admin.profesores.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $profesores = new Profesores();
        $title = __("Crear profesor");
        $textButton = __("Crear");
        $route = route("profesores.store");
        return view('admin.profesores.create', compact("title", "textButton", "route", "profesores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->validate($request, [
            "nombre"=> "required|max:30|",
            "apellido"=>"required|max:20",
            "correo"=>"required|max:140",
            "telefono"=>"required|max:40"
          
          
        ]);   

        Profesores::create([
                'nombre'=>$request->input("nombre"),
                'apellido'=>$request->input("apellido"),
                'correo'=>$request->input("correo"),
                'telefono'=>$request->input("telefono"), 
                
                
        
            ]);
            return redirect(url('/admin/profesores'))
            ->with('success',__("Profesor añadido")); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $profesores=Profesores::find($id);
        $update = true;
        $title = __("Editar profesor");
        $textButton = __("Actualizar");
        $route=route("profesores.update", $profesores->id);
        return view ("admin.profesores.edit",compact("update","title","textButton","route","profesores")); 
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $this->validate($request, [
            "nombre"=> "required|max:30|",
            "apellido"=>"required|max:20",
            "correo"=>"required",
            "telefono"=>"required|max:9"
          
          
        ]);   


      $profesores=Profesores::find($id);
        $profesores-> nombre = $request->get('nombre');
        $profesores-> apellido = $request->get('apellido');
        $profesores-> correo = $request->get('correo');
        $profesores-> telefono = $request->get('telefono'); 
     
      
        

        $profesores-> save();
        return redirect(url("admin/profesores"))
        ->with("success", __("profesor actualizado!")); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $profesores=Profesores::find($id);
        $profesores->delete();
        return back()->with("success", __("Acabas de eliminar un profesor"));
 
    }
    }
