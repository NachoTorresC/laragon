<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Storage; importacion para imagenes


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::paginate(10);
        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $cursos = new Cursos();
        $title = __("Crear Curso");
        $textButton = __("Crear");
        $route = route("cursos.store");
        return view('admin.cursos.create', compact("title", "textButton", "route", "cursos"));
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
            "nombre"=> "required",
            "categoria"=>"required|max:20",
            "descripcion"=>"required|max:240",
            "id_profesores"=>"required|max:40",
            "descargable"=>"required",
            "Imagen"=>"required" 
          
          
        ]);   

            Cursos::create([
                'nombre'=>$request->input("nombre"),
                'categoria'=>$request->input("categoria"),
                'descripcion'=>$request->input("descripcion"),
                'id_profesores'=>$request->input("id_profesores"), 
                'descargable'=>$request->file("descargable")->store('','images'), 
                'Imagen'=>$request->file("Imagen")->store('', 'images'),
                
                
        
            ]);
            return redirect(url('/admin/cursos'))
            ->with('success',__("Curso añadido")); 
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
        $cursos=Cursos::find($id);
        $update = true;
        $title = __("Editar curso");
        $textButton = __("Actualizar");
        $route=route("cursos.update", $cursos->id);
        return view ("admin.cursos.edit",compact("update","title","textButton","route","cursos")); 
   
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
            "nombre"=> "required",
            "categoria"=>"required|max:20",
            "descripcion"=>"required|max:240",
            "id_profesores"=>"required|max:40",
            "descargable"=>"mimes:pdf",
            "Imagen"=>"image|mimes:png,jpg,jpeg"
          
          
        ]);   


      $cursos=Cursos::find($id);
        $cursos-> nombre = $request->get('nombre');
        $cursos-> categoria = $request->get('categoria');
        $cursos-> descripcion = $request->get('descripcion');
        $cursos-> id_   ofesores = $request->get('id_profesores'); 
        if($request ->hasFile('descargable')){
              
            Storage::disk('images')->delete('images/'.$cursos->descargable);
            $cursos->descargable = $request->file('descargable')->store('','images');
        
    }
        if($request ->hasFile('Imagen')){
              
            Storage::disk('images')->delete('images/'.$cursos->Imagen);
            $cursos->Imagen = $request->file('Imagen')->store('','images');
        
    }
     
      
        

        $cursos-> save();
        return redirect(url("admin/cursos"))
        ->with("success", __("curso actualizado!")); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $cursos=Cursos::find($id);
        $cursos->delete();
        return back()->with("success", __("Acabas de eliminar un curso"));
 
    }
    }
