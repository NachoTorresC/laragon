
@extends('adminlte::page')

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de recursos") }}</h1>

    <div class="d-flex justify-content-center">
        <a href="{{route('recursos.create')}}" class="btn btn-success btn-sm mb-4 ">Añadir un nuevo recurso</a> 
    </div>
     
    


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Id") }}</th>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Autor") }}</th>
        <th scope="col">{{ ("Categoria") }}</th>
        <th scope="col">{{ ("Descripcion") }}</th>
        <th scope="col">{{ ("Id_profesores") }}</th>
  
     
    </tr>
    </thead>
    <tbody>
        @forelse($recursos as $recurso)
            <tr>
                <td>{{ $recurso->id }}</td>
                <td>{{ $recurso->nombre }}</td>
                <td>{{ $recurso->autor }}</td>
                <td>{{ $recurso->categoria }}</td>
                <td>{{ $recurso->descripcion }}</td>
                <td>{{ $recurso->id_profesores }}</td>
              

                <td><a href="{{route('recursos.edit', $recurso->id)}}" class="btn btn-primary btn-sm">Editar</a></td>
            

                <td>
                    <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-recurso-{{ $recurso->id }}-form').submit();"
                        ><button class="btn btn-danger btn-sm">{{ __("Eliminar") }}</button>
                        </a>
                        <form id="delete-recurso-{{ $recurso->id }}-form" action="{{ route('recursos.destroy', $recurso->id) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay recursos") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
   
</table>
<div class="mt-3">
    {!! $recursos->links()!!}
     </div>


@endsection
