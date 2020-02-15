<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker3.standalone.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/countrySelect.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/intlTelInput.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @if (session('status'))
        <input id="sessionStatus" type="hidden" value="{{ session('status') }}">
        @elseif($errors->any())
        @foreach ($errors->all() as $error)
        <input id="errorStatus" type="hidden" value="{{ $error }}">
        @endforeach
        @endif
        <div class="alert alert-success" role="alert">
            <div class="d-flex">
                <div id="alertTextSuccess"></div>
                <button type="button" class="close position-absolute" style="right: 10px;" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="alert alert-danger" role="alert">
            <div class="d-flex">
                <div id="alertTextDanger"></div>
                <button type="button" class="close position-absolute" style="right: 10px;" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div id='spinner' class="spinner position-absolute">
            <div class="spinner__item">
                <div class="spinner-border text-primary" role="status">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-5">
                        @if(Auth::check() && Auth::user()->confirmed == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bulletins.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.bulletins') }}">{{ Auth::user()->hasRole('admin') ? "Bulletins" : "My Bulletins" }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bulletins.create') }}">Create Bulletin</a>
                        </li>
                        @if(Auth::user()->hasRole('admin'))
                        <li class="nav-item position-relative">
                            <small data-url="{{ route('users.count') }}" class="count__users position-absolute"></small>
                            <a class="nav-link" href="{{ route('users.index') }}">Users list</a>
                        </li>
                        @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/countUsers.js') }}"></script>
    @stack('scripts')
</body>

</div>