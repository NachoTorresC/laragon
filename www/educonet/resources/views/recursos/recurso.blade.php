@extends("layouts.app2")

@section("content")

<tbody>
    <div class="container self-center flex flex-wrap mt-20 p-8 ">
        <div class="grid col-12  gap-4 w-full" >
            <div class="flex justify-center flex-col">
                <img class="self-center border-solid border-4 border-black " src="/images/{{$recurso->Imagen}}" >
            </div>
            <div class="col-12 grid gap-y-9">
                <div class="grid grid-col-12 mb-3">
                    <h2 class="col-span-11 font-bold text-xl  no-underline ">{{$recurso->nombre}}</h2>
                    <p class="col-span-11  text-xl text-center ">{{$recurso->descripcion}}</p>
                </div>
                <div class="enlaceDescarga text-center">
                    <a class=" btn btn-success btn-m " href="{{url('recursos/download', $recurso->id)}}">Descargar</a>
                </div>
              
            </div>
        </div>
    </div>
</tbody>
@endsection