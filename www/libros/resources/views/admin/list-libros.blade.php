@extends('admin.users.index') <!--vista del panel del administrador-->

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de libros") }}</h1>
   
    
    <a href="{{route('libros.create')}}" class="btn btn-success btn-sm mb-4 ">Añadir libro</a> <!-- OJO route NO url-->


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("título") }}</th>
        <th scope="col">{{ ("tematica") }}</th>
        <th scope="col">{{ ("sinopsis") }}</th>
        <th scope="col">{{ ("autor") }}</th>
        <th scope="col">{{ ("portada") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($libros as $libro)
            <tr>

                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->tematica }}</td>
                <td>{{ $libro->sinopsis }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->portada }}</td>
                <td><a href="{{route('libros.edit', $libro->id)}}" class="btn btn-primary btn-sm">Editar</a></td>
                <td>
                    <form id="delete-libro-{{$libro->id }}-form" action="{{route('libros.destroy', $libro)}}" method="POST" class="hidden">
                        @method('DELETE')
                        @csrf
                    </form>
    
                    <button class="btn btn-danger btn-sm" onclick="event.preventDefault() ; 
                     document.getElementById('delete-libro-{{$libro->id }}-form').submit();">Eliminar</button>
                </td>
                

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay libros") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection
