
@extends('adminlte::page')

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de cursos") }}</h1>

    <div class="d-flex justify-content-center">
        <a href="{{route('cursos.create')}}" class="btn btn-success btn-sm mb-4 ">Añadir un nuevo recurso</a> 
    </div>
     
    


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("id") }}</th>
        <th scope="col">{{ ("nombre") }}</th>
        <th scope="col">{{ ("categoria") }}</th>
        <th scope="col">{{ ("descripcion") }}</th>
        <th scope="col">{{ ("id_profesores") }}</th>
  
     
    </tr>
    </thead>
    <tbody>
        @forelse($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->categoria }}</td>
                <td>{{ $curso->descripcion }}</td>
                <td>{{ $curso->id_profesores }}</td>
              

                <td><a href="{{route('cursos.edit', $curso->id)}}" class="btn btn-primary btn-sm">Editar</a></td>
            

                <td>
                    <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-curso-{{ $curso->id }}-form').submit();"
                        ><button class="btn btn-danger btn-sm">{{ __("Eliminar") }}</button>
                        </a>
                        <form id="delete-curso-{{ $curso->id }}-form" action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay cursos") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
   
</table>
<div class="mt-3">
    {{ $cursos->links()}}
     </div>


@endsection
