@extends("layout")
{{--@section('opciones')--}}
{{--    <x-form.a-href href="{{route('feria-main')}}">--}}
{{--        Volver--}}
{{--    </x-form.a-href>--}}
{{--@endsection--}}
@section("boton_volver")
    <form action="{{route('feria-main')}}" method='GET'>
        <div class="self-end">
            <x-form.a-href href="{{route('feria-main')}}">Volver</x-form.a-href>
        </div>
    </form>
@endsection

@section('contenido')
    {{--    --}}

    <div class="flex flex-row justify-content-around bg-fondo_feria bg-contain h-75v " id="ponencias">

        @isset($msj)
            <h1>{{$msj}}</h1><!--Aquí para el tema de ferias o no ....-->
        @endisset
        @empty($empresas)
            <h1 class="text-yellow-800 text-3xl">Actualmente no hay ponencias para esta familia</h1>
    @endempty
    {{--        <div class="text-center flex-col justify-content-between w-1/5  rounded-3xl bg-white h-75v overflow-y-auto m-5 p-3">--}}
    {{--            LISTADO DE CHARLAS POR HORA--}}
    {{--        </div>--}}


    <!--Mostrar logos-->
        <div id="app">
            <div class="grid grid-cols-{{$columnas+5}} gap-4  grid-flow-cols w-2/3 m-5 auto-rows-max">
                {{--<listado-ponencias filas={{$filas+3}}empresas="'@json($empresas)"></listado-ponencias>--}}
                <div class="row-span-{{$filas}} col-span-3 bg-white mr-10 p-5">
                    LISTADO DE CHARLAS POR HORA
                </div>
                {{--            onmouseleave=destoy_panel({{$empresa->id}})--}}
                {{--            onmouseenter=create_show_panel({{$empresa->id}})--}}
                {{--            id="{{$empresa->id}}">--}}

                @foreach($empresas as $empresa)
                    <ponencias  src="{{asset("storage/logos/$empresa->logo")}}" empresa="{{(json_encode($empresa))}}"></ponencias>
{{--                    <div class="bg-white rounded-3xl p-3 auto-cols-max">--}}
{{--                        {{$empresa->empresa}}--}}
{{--                        <img src="{{asset("storage/logos/$empresa->logo")}}" alt="">--}}
{{--                    </div>--}}
                @endforeach


            </div>
        </div>

    </div>
@endsection
@section("script")
    <script>
        function ocultar_panel(empresa) {
            var nombre = "#panel_" + empresa;
            $(nombre).addClass("hidden");
            $("#ponencias").removeClass("opacity-25");
            $(nombre).removeClass("transition ease-in duration-500  z-50 " +
                "block absolute  display " +
                "w-40v h-30v bg-gray-200 rounded border border-red")

            //$(nombre).addClass("hidden transition-none")

//alert ("adiós del elemento "+empresa)
        }

        function mostrar_panel(empresa) {
            //alert (empresa);
//            var element = document.getElementById(empresa);
//            var posicion = element.getBoundingClientRect();
            //alert("Coordenadas " + posicion.top + "-" + posicion.right + "-" + posicion.bottom + "-" + posicion.left);
            //var panel= document.getElementById('panel');
            var nombre = "#panel_" + empresa;
            $(nombre).removeClass('hidden')
            $(nombre).addClass("transition ease-in duration-1000  z-50 " +
                "block absolute  top-10 left-10 display " +
                "w-40v h-30v bg-gray-200 rounded border border-red")
            $("#ponencias").addClass("opacity-25");
            $(nombre).addClass('opacity-0');

        }

        function create_show_panel(empresa) {
            //alert (empresa);
//            var element = document.getElementById(empresa);
//            var posicion = element.getBoundingClientRect();
            //alert("Coordenadas " + posicion.top + "-" + posicion.right + "-" + posicion.bottom + "-" + posicion.left);
            //var panel= document.getElementById('panel');
            var node = document.createElement('div');
            node.setAttribute("id", "panel_" + empresa);
            $("#empresa").append("div");
            var panel = "#panel_" + empresa;

            $(panel).addClass("block transition ease-in duration-1000  z-50 " +
                "absolute  top-10 left-10 display " +
                "w-40v h-30v bg-gray-200 rounded border border-red")
            $("#ponencias").addClass("opacity-25");
            $(panel).addClass('opacity-0');
            $(panel).innerHTML = "Aquí pondremos todo de la empresa " + empresa;
        }

        function destoy_panel(empresa) {
            $("#ponencias").addClass("opacity-0");
            var node = "#panel_" + empresa;
            $("#empresa").remove(node);
        }
    </script>
@endsection




