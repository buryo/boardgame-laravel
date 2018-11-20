<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Board game')</title>

    {{-- Style --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('layouts.nav')
    <!-- Page Header -->
    <header class="masthead" style="{{ Route::getCurrentRoute()->uri() == '/' ? '' : 'height:200px' }} ">
        <div class="overlay"></div>
        @if(Route::getCurrentRoute()->uri() == '/')
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="site-heading">
                            <h1>Board Game</h1>
                            <span class="subheading">{{ __('text.aboutTheProject') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </header>

    <div class="container">

    @yield('content')

    @include('layouts.footer')
    </div>

    {{-- JS --}}
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/theme.js')}}"></script>
</body>
</html>
