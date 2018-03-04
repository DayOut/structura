<?php if(!isset($menu_cat)) {$menu_cat = " ";}?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">




    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
<!--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.css') }}"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body style="background-image: url({{asset('upload/bg.jpg')}}); background-size: 100%; background-attachment: fixed; ">
    @auth
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large red" href="{{url('create')}}">
                <i class="large material-icons">mode_edit</i>
            </a>
        </div>
    @endauth

    <nav class="indigo darken-5" role="navigation">

        <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
            @guest
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                </ul>

                <ul id="mobile-demo" class="side-nav">
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                </ul>
            @else
            <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li><a class="dropdown-item" href="{{url('home')}}">Админка</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                </ul>

                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            @endguest



        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col s12 m9">
                @yield('content')
            </div>
            <div class="col s12 m3">

                <div class="collection">
                    <a href="#!" class="collection-item <?php if($menu_cat == "news") echo "active"?>">Новости</a>
                    <a href="#!" class="collection-item <?php if($menu_cat == "photo") echo "active"?>">Фото</a>
                    <a href="#!" class="collection-item <?php if($menu_cat == "about") echo "active"?>">О нас</a>

                </div>

            </div>
        </div>

    </div>



    <footer class="page-footer indigo darken-5">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>-->
    <script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
</body>
</html>
