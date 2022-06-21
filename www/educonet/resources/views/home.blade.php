@extends('layouts.app2')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

       

        
        
          <div class="d-flex justify-content-center pb-2 " >
             <img style="max-width:800px" src="/images/Portada.png" class="img-fluid " >
                   
       
          </div>
          <div>
            <div class="text-center  pb-5">
              <p class="text-amber font-semibold text-4xl">¿Por qué registrarte? </p>
              
              <p class="text-amber"> Tendrás acceso a infinidad de recursos que podrás descargar<span class="text-xl font-bold"> gratuitamente.</span></p>

              <p class="text-amber">También tendrás la posibilidad de hacerte premium y poder acceder a la descarga de archivos en formato pdf para tu formación.</p>
          
            </div>
      
          </div>



         
         


    </div>

 
</main>

   <!-- Footer -->
   <footer class="  bg-amber text-center text-amber font-semibold">
    <div class="text-center p-3" style="background-color: black);">
      © 2022 Copyright: Nacho Torres Claverie <i class="bi bi-instagram"></i>
    </div>
  </footer>

@endsection




