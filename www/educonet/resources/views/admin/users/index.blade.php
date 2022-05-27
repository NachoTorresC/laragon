@extends('adminlte::page')

@section("content")

    <h1 class="text-center text-info">{{ __("Listado de usuarios") }}</h1>
     
    


<table class="table table-info table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("id") }}</th>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Email") }}</th>
        <th scope="col">{{ ("Rol") }}</th>
        <th scope="col">{{ ("Fecha creación") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name.' ' }}
                    @endforeach
                </td>
                <td>{{ date_format($user->created_at, "d/m/Y") }}</td>

                <td>
                    <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-user-{{ $user->id }}-form').submit();"
                        ><button class="btn btn-danger btn-sm">{{ __("Eliminar") }}</button>
                        </a>
                        <form id="delete-user-{{ $user->id }}-form" action="{{ route('users.destroy', $user->id) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
   
</table>
<div class="mt-3">
   {!! $users->links()!!}
    </div>


@endsection
