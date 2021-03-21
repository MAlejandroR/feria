@extends('layout')





@section('contenido')




    @auth {{--Si estoy atenticado pongo opciones de administración--}}
        <div class="h-10v">
            <x-layout.nav>
                @isset($msj)
                    <div class="text-2xl text-white">{{$msj}}</div>
                @endisset
            </x-layout.nav>
        </div>

        <div class="h-65v overflow-y-auto">
            <template>
            <contenido_feria route_form="{{route('empresas.ponencias')}}">

            </contenido_feria>
            </template>
        </div>
    @endauth
    @guest
        <div class="h-75v overflow-y-auto flex flex-row ">

            <contenido_feria route_form="{{route('empresas.ponencias')}}"/>


        </div>
    @endguest
@endsection
