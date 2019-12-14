<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin-{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/fancybox-master/dist/jquery.fancybox.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminnav.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/category.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/validate-error.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forgotpassword.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new_subcategory.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new_product.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/popup_warning.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/success.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/fancybox-master/dist/jquery.fancybox.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/show-images.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/edit-products.css') }}"/>
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
                        {{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
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

    @if (Auth::check())
        <nav class="sec-nav">
            <ul>
                <li class="cat"><a href="{{ route('category_list') }}">Kategorije</a></li>
                <li class="subcat"><a href="{{ route('sub_category_list') }}">Podkategorije</a></li>
                <li class="product"><a href="{{ route('products_list') }}">Produkti</a></li>
                <li class="header" ><a href="{{ route('add-image') }}?header">Slike naslovnice</a></li>
                <li class="users"><a href="{{ route('user-list') }}">Korisnici</a></li>
            </ul>
        </nav>
    @endif

    <main class="py-4">
        @yield('content')
    </main>

    <script>
        if (window.location.href.indexOf("categories") > -1) {
             $(".cat").addClass("current");
        }
        if (window.location.href.indexOf("subcategory") > -1) {
            $(".subcat").addClass("current");
        }
        if (window.location.href.indexOf("product") > -1) {
            $(".product").addClass("current");
        }
        if (window.location.href.indexOf("header") > -1) {
            $(".header").addClass("current");
        }
        if (window.location.href.indexOf("users") > -1) {
            $(".users").addClass("current");
        }

        function goBack() {
          window.history.back();
        }

        $('.addImg').hover(function(){
          $(this).find("span").toggleClass('show-msg')
        });


        $('.new-category-btn').hover(function(){
          $(this).find("span").toggleClass('show-msg')
        });

    </script>

</body>
</html>
