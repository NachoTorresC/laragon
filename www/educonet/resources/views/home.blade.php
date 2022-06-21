@extends('layouts.app2')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

       

        
        
          <div class="d-flex justify-content-center" >
             <img src="/images/Portada.png" class="d-block w-65 p-3" alt="50">
                   
       
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




