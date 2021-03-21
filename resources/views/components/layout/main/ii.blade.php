<div>
    <form action={{route("empresas.ponencias")}} method='POST'>
        @csrf
        <input type="hidden" name="familia" value="Imagen y Sonio">
        <x-form.button id="ii" class="w-20v">
            <img id="imagen" class="rounded-3xl"
                 src="{{asset("images/familias/imagen.png")}}"
                 alt="Imagen y Sonido">
        </x-form.button>
    </form>
</div>

