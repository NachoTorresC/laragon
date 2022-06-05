@extends("layouts.app2")

@section("content")
<div class="flex justify-center flex-wrap p-4 mt-5">
  
</div>

<tbody>
 <div class="">
     <div class="row d-flex justify-content-center">
         <h1 class="text-danger">seguir editando</h1>
        <h1>siendo usuario premium podrás acceder a la compra de cursos</h1>
       <a href="{{url('processPaypal')}}"><button class="col-1 btn btn-success ">HAZTE PREMIUM</button></a> 
     </div>

   
 </div>

</tbody>



@endsection