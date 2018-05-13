<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CarShop') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>
        
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            @include('inc.navbar')
            <div class="container-fluid">
                @if(Request::is('/'))
                    @include('inc.slider')
                @endif
                @if(!Request::is('/'))
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            @include('inc.messages')
                            @yield('content')
                        </div>
                        <div class="col-md-4 col-lg-4">
                            @include('inc.sidebar')
                        </div>
                    </div>
                @else
                    @yield('content')
                @endif
            </div>
            <footer id="footer" class="text-center">
                <p>Copyright 2018 &copy; {{ config('app.name', 'CarShop') }}</p>
            </footer>
        </div>
    </body>
</html>
