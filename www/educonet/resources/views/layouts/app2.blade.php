<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Educonet') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app container">

        <!--header-->

        <nav class="navbar navbar-expand-sm navbar-dark bg-amber" aria-label="Third navbar example">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="collapse navbar-collapse " id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0 d-flex align-items-center gap-4 px-5" >
                  <li class="nav-item">
                    <a href="{{ url('/home') }}" class="text-lg font-bold text-yellow-700 no-underline hover:bg-yellow-600  hover:text-white">
                        <img  src="{{asset('/images/Logo.png')}}"> 
                    </a>
                  </li>

                  @auth      
                  <li class="nav-item">
                               
                    <a href="{{ url('recursos/index') }}" class="text-lg font-bold text-yellow-700 no-underline hover:bg-yellow-600  hover:text-white">
                        {{ ('Recursos') }}
                    </a>    
                  </li>
                  @if(Auth::user()->can('userPremium'))
                  <li class="nav-item">
                   
                    <a href="{{ url('cursos/index') }}" class="text-lg font-bold text-yellow-700 no-underline hover:bg-yellow-600  hover:text-white">
                        {{ ('Cursos') }}
                    </a>     
                  </li>
                  @endif
                  @if(!Auth::user()->can('userPremium'))
                  <li class="nav-item">
                    <a href="{{ url('miembroPremium/index') }}" class="text-lg font-bold text-yellow-700 no-underline hover:bg-yellow-600  hover:text-white">
                        {{ ('Hazte Premium') }}
                    </a>
                  </li>
   
                    @endif
               
                    
                    @endauth
                </ul>
                <ul class="d-flex gap-2 p-3 align-items-center">
                    @guest
                    <li class="nav-item">
                        <a class=" font-bold no-underline text-yellow-700  hover:bg-yellow-600  hover:text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="font-bold no-underline text-yellow-700  hover:bg-yellow-600  hover:text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                        
                    @endif
                    @else
                    <li class="nav-item ">
                           <span>{{ Auth::user()->name }}</span>
                    </li>
                 
                    <li class="nav-item text-yellow-700 ">
                                   <a href="{{ route('logout') }}"
                       class="no-underline text-yellow-700  hover:bg-yellow-600  hover:text-white"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    </li>
         
                @endguest
                </ul>
           
              </div>
            </div>
          </nav>


        

        @yield('content')

     
    </div>


 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
