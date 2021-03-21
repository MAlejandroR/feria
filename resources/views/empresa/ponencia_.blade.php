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

   <listado-ponencias></listado-ponencias>
@endsection


<script>
    import ListadoPonencias from "../../js/components/ponencias-main/listado-ponencias";
    export default {
        components: {ListadoPonencias}
    }
</script>
