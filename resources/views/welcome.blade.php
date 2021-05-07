<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <title>
                    Laravel
                </title>
                <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
                    <!-- Styles -->
                    <link href="{{asset('css/app.css')}}" rel="stylesheet">
                    </link>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">
                    Home
                </a>
                @else
                <a href="{{ route('login') }}">
                    Login
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Register
                </a>
                @endif
                    @endauth
            </div>
            @endif
            <div class="content">
                <div class="content" id="app">
                    <nav-bar>
                    </nav-bar>
                    <!--La equita id debe ser app, como hemos visto en app.js-->
                    <router-view>
                    </router-view>
                    <!--Añadimos nuestro componente vuejs-->
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}">
        </script>
    </body>
</html>
