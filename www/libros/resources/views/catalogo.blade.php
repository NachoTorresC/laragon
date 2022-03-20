@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <body>
            <div class="container">
                <h1 class="text-yellow-100  text-center mt-2">Catálogo de libros </h1>
                <div class="row mt-4" >
                    <div class="col">
                        <h2 class="text-yellow-100">harry potter</h2>
                        <img src="{{ asset('ECDV.jpg') }}" alt="" >
                 
                    
                        <h2 class="text-white">harry potter</h2>
                        <img src="{{ asset('ECDV.jpg') }}" alt="" >
               
                  
                        <h2 class="text-white">harry potter</h2>
                        <img src="{{ asset('ECDV.jpg') }}" alt="" >
              
           
                        <h2 class="text-white">harry potter</h2>
                        <img src="{{ asset('ECDV.jpg') }}" alt="" >
                    </div>
                </div>
            </div>

        </body>

      
    </div>
</main>
@endsection