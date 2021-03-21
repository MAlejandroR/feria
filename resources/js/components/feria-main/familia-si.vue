<template>
    <!--    <div class="familia-si">-->
    <!--        <pre v-text="$attrs"/>-->

    <!--    </div>-->
        <form action="{{route_form}}" method='POST'>
            {{ csrf }}
            <input type="hidden" name="familia" value="Informática y Comunicaciones">
            <button id="si" class="botonFamilia w-20v">
                <img id="enlaces" class="rounded-3xl w-100%"
                     src="images/familias/si_informatica.png" alt="Informática y comunicaciones-">
            </button>
        </form>
</template>
<script>
export default {
    props: ['src_img', 'route_form', 'csrf'],
    name: 'FamiliaSI',
};
</script>
