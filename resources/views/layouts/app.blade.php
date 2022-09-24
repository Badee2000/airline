<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Skybird') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Skybird') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                       <!-- <button onclick="location.href='http://127.0.0.1:8000/home'" class="btn"><i class="fa fa-home"></i> Home</button>-->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="http://127.0.0.1:8000/home"
                                    onclick="event.preventDefault();
                                                  document.getElementById('home-form').submit();">
                                     {{ __('Home') }}
                                 </a>

                                 <form id="home-form" action="http://127.0.0.1:8000/home" method="GET">
                                     @csrf
                                 </form>
                                 <a class="dropdown-item" href="http://127.0.0.1:8000/showflights"
                                 onclick="event.preventDefault();
                                               document.getElementById('showflights-form').submit();">
                                  {{ __('Show My Flights') }}
                              </a>

                              <form id="showflights-form" action="http://127.0.0.1:8000/showflights" method="GET">
                                  @csrf
                              </form>



                                    @if(Auth::user()->id==1||Auth::user()->id==2)
                                    <a class="dropdown-item" href="{{ route('register') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('add-form').submit();">
                                        {{ __('Add Flight') }}
                                    </a>
                                    <form id="add-form" action="http://127.0.0.1:8000/insert" method="get" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="http://127.0.0.1:8000/showflightsadmin"
                                    onclick="event.preventDefault();
                                                  document.getElementById('showflightsadmin-form').submit();">
                                     {{ __('Confirm Reservations') }}
                                 </a>

                                 <form id="showflightsadmin-form" action="http://127.0.0.1:8000/showflightsadmin" method="GET">
                                     @csrf
                                 </form>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
