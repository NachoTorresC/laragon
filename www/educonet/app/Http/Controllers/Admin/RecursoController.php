<?php

namespace App\Http\Controllers\Admin;
//namespace App\Http\Controllers;

use App\Models\Recursos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recursos::paginate(10);
        return view('admin.recursos.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $recursos = new Recursos();
        $title = __("Crear recurso");
        $textButton = __("Crear");
        $route = route("recursos.store");
        return view('admin.recursos.create', compact("title", "textButton", "route", "recursos"));
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
            "nombre"=> "required|max:30|unique:recursos,nombre",
            "autor"=>"required|max:20",
            "categoria"=>"required|max:140",
            "descripcion"=>"required|max:40",
            "id_profesores"=>"required",
            "Imagen"=>"required" 
          
        ]);   

        Recursos::create([
                'nombre'=>$request->input("nombre"),
                'autor'=>$request->input("autor"),
                'categoria'=>$request->input("categoria"),
                'descripcion'=>$request->input("descripcion"), 
                'id_profesores'=>$request->input("id_profesores"), 
                'descargable'=>$request->file("descargable")->store('','images'),
                'Imagen'=>$request->file("Imagen")->store('', 'images'),
                
                
        
            ]);
            return redirect(url('/admin/recursos'))
            ->with('success',__("Recurso añadido")); 
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
         $recursos=Recursos::find($id);
        $update = true;
        $title = __("Editar recurso");
        $textButton = __("Actualizar");
        $route=route("recursos.update", $recursos->id);
        return view ("admin.recursos.edit",compact("update","title","textButton","route","recursos")); 
   
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
            "autor"=>"required|max:20",
            "categoria"=>"required|max:140",
            "descripcion"=>"required|max:340",
             "id_profesores"=>"required",
             "descargable"=>"mimes:pdf",
             "Imagen"=>"image|mimes:png,jpg,jpeg"
          
        ]);   


      $recursos=Recursos::find($id);
        $recursos-> nombre = $request->get('nombre');
        $recursos-> autor = $request->get('autor');
        $recursos-> categoria = $request->get('categoria');
        $recursos-> descripcion = $request->get('descripcion'); 
        $recursos-> id_profesores = $request->get('id_profesores'); 
        if($request ->hasFile('descargable')){
              
            Storage::disk('images')->delete('images/'.$recursos->descargable);
            $recursos->descargable = $request->file('descargable')->store('','images');
        
    }
        if($request ->hasFile('Imagen')){
              
              Storage::disk('images')->delete('images/'.$recursos->Imagen);
              $recursos->Imagen = $request->file('Imagen')->store('','images');
          
      }
        

        $recursos-> save();
        return redirect(url("admin/recursos"))
        ->with("success", __("recurso actualizado!")); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $recursos=Recursos::find($id);
        $recursos->delete();
        return back()->with("success", __("Acabas de eliminar un profesor"));
 
    }
    }
