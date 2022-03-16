<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Libros;

class librosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libros::all();
         return view ('admin.list-libros', compact('libros'));  
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // abrir formulario para un nuevo registro
    {
        $libros = new libros();
        $title = __("Crear libro");
        $textButton = __("Crear");
        $route = route("libros.store");
        return view('admin.create', compact("title", "textButton", "route", "libros"));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // guardar en la base de datos el nuevo registro
    {
       // dd($request);
       // $libros= libros::create($request->all());
        //return redirect()->route('admin.edit',$libros);
            libros::create([
                'titulo'=>$request->input("titulo"),
                'tematica'=>$request->input("tematica"),
                'sinopsis'=>$request->input("sinopsis"),
                'autor'=>$request->input("autor"),
                'portada'=>$request->input("portada")
        
            ]);
            return redirect(url('/admin/list-libros'))
            ->with('success',__("Libro añadido"));
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(libros $libros) // visualizar un solo registro
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(libros $libros)
    {
       
        $update = true;
        $title = __("Editar libro");
        $textButton = __("Actualizar");
        $route=route("admin.update", ["libros" =>$libros]);
        return view ("admin.edit",compact("update","title","textButton","route","libros"));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(libros $libro)// eliminar registro
    {
         
         $libro->delete();
         return back()->with("success", __("Acabas de eliminar el libro"));
    }
}

