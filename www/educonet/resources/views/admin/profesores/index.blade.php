
@extends('adminlte::page')

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de profesores") }}</h1>

    <div class="d-flex justify-content-center">
        <a href="{{route('profesores.create')}}" class="btn btn-success btn-sm mb-4 ">Añadir un nuevo profesor</a> 
    </div>
     
    


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("id") }}</th>
        <th scope="col">{{ ("nombre") }}</th>
        <th scope="col">{{ ("apellido") }}</th>
        <th scope="col">{{ ("correo") }}</th>
        <th scope="col">{{ ("telefono") }}</th>
  
     
    </tr>
    </thead>
    <tbody>
        @forelse($profesores as $profesor)
            <tr>
                <td>{{ $profesor->id }}</td>
                <td>{{ $profesor->nombre }}</td>
                <td>{{ $profesor->apellido }}</td>
                <td>{{ $profesor->correo }}</td>
                <td>{{ $profesor->telefono }}</td>
              

                <td><a href="{{route('profesores.edit', $profesor->id)}}" class="btn btn-primary btn-sm">Editar</a></td>
            

                <td>
                    <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-profesor-{{ $profesor->id }}-form').submit();"
                        ><button class="btn btn-danger btn-sm">{{ __("Eliminar") }}</button>
                        </a>
                        <form id="delete-profesor-{{ $profesor->id }}-form" action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay profesores") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
   
</table>
<div class="mt-3">
    {!! $profesores->links()!!}
     </div>


@endsection
