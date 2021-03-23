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

    <div ref="ponencias" id="ponencias" class="flex flex-row justify-between bg-fondo_feria bg-cover h-75v" id="ponencias" p-3>
        @isset($msj)
            <h1>{{$msj}}</h1><!--Aquí para el tema de ferias o no ....-->
        @endisset
        @empty($empresas)
            <h1 class="text-yellow-800 text-3xl">Actualmente no hay ponencias para esta familia</h1>
        @endempty
        {{--        <div class="text-center flex-col justify-content-between w-1/5  rounded-3xl bg-white h-75v overflow-y-auto m-5 p-3">--}}
        {{--            LISTADO DE CHARLAS POR HORA--}}
        {{--        </div>--}}
        {{info("Columnas que retorna ",[$columnas, $filas])}}

    <!--Mostrar logos-->
        {{--        <div class="grid grid-cols-{{$columnas+$filas}} gap-4  grid-flow-cols w-2/3 m-5 auto-rows-max">--}}
        <div class="flex flex-row w-screen m-5">
            <div class="w-1/3  rounded-lg">
                <listado-ponencias filas='{{$filas+1}}' empresas='@json($empresas)'></listado-ponencias>
                {{--            <div class="row-span-{{$filas}} col-span-3 bg-white mr-10 p-5">
                                LISTADO DE CHARLAS POR HORA
                            </div>
                  --}}          {{--            onmouseleave=destoy_panel({{$empresa->id}})--}}
                {{--            onmouseenter=create_show_panel({{$empresa->id}})--}}
                {{--            id="{{$empresa->id}}">--}}
            </div>
            <div class="w-60v">
                <div
                    class="grid grid-cols-{{$columnas}} gap-4  grid-flow-cols  m-5 auto-rows-max overflow-y-auto h-65v">
                    @foreach($empresas as $empresa)
                        <ponencias src="{{asset("storage/logos/$empresa->logo")}}"
                                   empresa="{{(json_encode($empresa))}}"></ponencias>
                        {{--                    <div class="bg-white rounded-3xl p-3 auto-cols-max">--}}
                        {{--                        {{$empresa->empresa}}--}}
                        {{--                        <img src="{{asset("storage/logos/$empresa->logo")}}" alt="">--}}
                        {{--                    </div>--}}
                    @endforeach


                </div>

            </div>
        </div>
    </div>
@endsection
