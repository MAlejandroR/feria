<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset("/css/app.css")}}">
    <link rel="icon" href="{{ URL::asset('/images/favicon.ico') }}" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>
<body>
<div class="ppal" id="app">
    <!-- Parte de cabecera, fijo en lugar de componente-->
    <div class='h-15v bg-white md:bg-cabecera flex flex-row  p-2
                border border-red-400 rounded  justify-content-around items-center '>
        <img class='hidden md:block p-2 max-h-full w-1/4'
             src="{{asset('images/logos/enlaces_feria.png')}}" alt='Logo Enlaces'/>

        <img class='display md:hidden object-center p-2 max-h-full max-w-full ml-10'
             src="{{asset('images/logos/enlaces_feria_movil.png')}} " alt="Logo Enlaces"/>

        <h1 class="hidden md:block text-7xl font-mono text-enlaces text-center
      max-h-full overflow-hidden place-self-right w-3/4">
            IV Feria de Empleo 2021
        </h1>

        @yield ("boton_volver")
    </div>
    <!-- Parte de cabecera, fijo en lugar de componente-->
@yield("contenido")
<!--Pie en lugra de componente, inserto el html -->
    <div class="h-10v flex flex-row bg-enlaces justify-between">
        <div class="font-mono text-1xl flex flex-col justify-start p-2">
            <div>
                © Copyright - CPIFP Los Enlaces
            </div>
            <div>
                C/Jarque de Moncayo nº 10 - 50012 - ZARAGOZA - Tlfn: 976 300 804 - Fax: 976 314 403
            </div>
        </div>

        @if (Route::has('login'))
            <div class="flex flex-row justify-around p-2 items-center text-white">
                @auth
                    <div class="flex flex-col justify-start">
                        Administrador {{auth()->user()->name}}
                        <form action={{route('logout')}} method="POST">
                            @csrf
                            <button
                                class=" text-xl text-white  rounded border border-white p-1 bg-fondo"> {{__('logout')}}</button>
                            <img class="visible md:invisible" type="submit" src="{{'icon/login.png'}}">
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="boton1">{{__("Login")}}</a>
                    <a href="{{ route('login') }}" class=" block md:hidden ">
                        <img class="w-1/4 h:1/5 " src="{{asset('storage/icon/login.png')}}" alt="{{__('Login')}}">
                    </a>


                    {{--                    @if (Route::has('register'))--}}
                    {{--                        <a href="{{ route('register') }}" class="ml-4 text-xl text-green-100 ">{{__('Register')}}</a>--}}
                    {{--                    @endif--}}
                @endauth
            </div>
        @endif
{{--        <slot></slot>--}}
    </div>

</div>
</body>
@yield("script")
<script src="{{ mix('js/app.js') }}"></script>
</html>
