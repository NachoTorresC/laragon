@extends("layouts.app2")

@section("content")
<div class="flex justify-center flex-wrap p-4 mt-5">
    <div class="text-center">
        <h1 class="mb-5 text-amber">{{"Recursos"}}</h1>
    </div>
</div>

<tbody>
 <div class="">
     <div class="row d-flex justify-content-center p-5 ">
         @forelse ( $recursos as $recurso )
         <a href="{{url('recursos', $recurso->id) }}"class="card recursos no-underline hover:text-yellow-500 col-lg-3 col-md-4 col-sm-12 mx-3 mb-4 row p-0 text-center bg-light text-amber text-decoration:none">
         
          

            <div class="card-header class col-12 d-flex justify-content-center bg-image hover-zoom "><img style="max-width:200px" class="img-fluid boder p-0" src="/images/{{$recurso->Imagen}}" >
            </div>
            <h5 class="text-center col-12 mt-2">{{$recurso->nombre}}</h5>
         
        </a>
             
         @empty <!-- el empty mostrará lo siguente cuando no haya contenido -->

         <tr>
             <td colspan="4">
                 <div class="bg-blue-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                     <p><strong class="font-bold"{{__("No hay recursos ahora mismo ")}}></strong></p>
                     <span class="block sm:inline">{{("Todavía no hay nada que mostar aquí")}}</span>
                 </div>

             </td>
         </tr>
             
         @endforelse
 
     </div>
     <div class=" d-flex justify-content-center pb-5 pl-5 ml-5 ">
        {{$recursos->links()}}
    </div>
 </div>

</tbody>



@endsection