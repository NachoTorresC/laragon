@extends('admin.index')
@section('content')
<h1 class="text-center text-info">{{ __("Listado de proyectos") }}</h1>
<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre del proyecto") }}</th>
        <th scope="col">{{ ("Usuario") }}</th>
        <th scope="col">{{ ("Fecha creación") }}</th>
      
    </tr>
    </thead>
    <tbody>
        @forelse($projects as $project)
            <tr>

                <td>{{ $project->name }}</td>
                <td>{{ $project->user->name }}</td>
                <td>{{ date_format($project->created_at, "d/m/Y") }}</td>
         
             

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<tbody>
    @endsection
   
