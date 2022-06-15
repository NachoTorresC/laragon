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
    <div id="app">
        <header class="bg-amber py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/home') }}" class="text-lg font-bold text-yellow-700 no-underline">
                        {{ ('Educonet') }}
                    </a>
                    @auth                    
                    <a href="{{ url('recursos/index') }}" class="text-lg font-bold text-yellow-700 no-underline">
                        {{ ('Recursos') }}
                    </a>
                    <a href="{{ url('miembroPremium/index') }}" class="text-lg font-bold text-yellow-700 no-underline">
                        {{ ('Hazte Premium') }}
                    </a>
                    
                   
                    <a href="{{ url('cursos/index') }}" class="text-lg font-bold text-yellow-700 no-underline">
                        {{ ('Cursos') }}
                    </a>
                    <a href="{{ url('shop/products') }}" class="text-lg font-bold text-yellow-700 no-underline">
                        {{ ('Tienda') }}
                    </a>
                    @endauth
                </div>

                <nav class="space-x-4 text-yellow-700 text-sm sm:text-base">
                    @guest
                        <a class=" font-bold hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="font-bold hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        

        @yield('content')

     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
