@extends('admin.users.index') <!--vista del panel del administrador-->

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de libros") }}</h1>
   
    


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("título") }}</th>
        <th scope="col">{{ ("temática") }}</th>
        <th scope="col">{{ ("sinopsis") }}</th>
        <th scope="col">{{ ("autor") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($libros as $libro)
            <tr>

                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->temática }}</td>
                <td>{{ $libro->sinopsis }}</td>
                <td>{{ $libro->autor }}</td>

                

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
