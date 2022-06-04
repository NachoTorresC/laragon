@extends("layouts.app2")

@section("content")

<tbody>
    <div class="container self-center flex flex-wrap mt-20 p-8 ">
        <div class="grid grid-cols-4 gap-4 w-full" >
            <div class="flex justify-center flex-col">
                <img class="self-center border-solid border-2 border-black" src="/images/{{$recurso->Imagen}}" >
            </div>
            <div class="col-span-3 grid gap-y-9">
                <div class="grid grid-cols-12 mb-3">
                    <span class="col-span-1 justify-self-end">Nombre  </span>
                    <h2 class="col-span-11 fond-bold text-xl nl-4">{{$recurso->nombre}}</h2>
                    
                </div>
            </div>
        </div>
    </div>
</tbody>
@endsection