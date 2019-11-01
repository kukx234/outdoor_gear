<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/zoom-master/jquery.zoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slick/slick.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminnav.css') }}"/>


</head>
<body> 

    <nav class="first-nav">
        <ul class="items">
            @guest
                <li class="">
                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="">
                        <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="">
                    <a id="" class="" href="#" role="button">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="" aria-labelledby="navbarDropdown">
                        <a class="" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        <a class="app-name" href="{{ route('admin-home') }}">{{ config('app.name') }}</a>
    </nav>

    <nav class="sec-nav">
        <ul>
            <li><a href="{{ route('category_list') }}">Kategorije</a></li>
            <li><a href="{{ route('sub_category_list') }}">Podkategorije</a></li>
            <li><a href="{{ route('products_list') }}">Produkti</a></li>
            <li><a href="">slike naslovnice</a></li>    
        </ul>    
    </nav> 
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
