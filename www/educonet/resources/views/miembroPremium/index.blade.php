@extends("layouts.app2")

@section("content")


<tbody>
    @if(!Auth::user()->can('userPremium'))
        <div class="row d-flex justify-content-center">
            <h1 class="text-center text-amber">Siendo usuario premium podrás acceder a la compra de cursos</h1>
          <div class="text-center">
            <a href="{{url('processPaypal')}}"><button class=" btn btn-success justify-content-center">HAZTE PREMIUM</button></a>        
            </div>  
        </div>
    @else
    <section class="text-center">
       
        <h3 class="mt-5 text-2xl text-danger"> Ya eres premium </h3>
        <div class="d-flex justify-content-center">
            <img class="mt-5" src="https://media.giphy.com/media/tIeCLkB8geYtW/giphy.gif" alt="No GIF">
        </div>
        
    </section>
    @endif
</tbody>



@endsection