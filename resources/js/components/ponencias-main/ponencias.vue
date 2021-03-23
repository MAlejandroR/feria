<template>
    <!--        <h1>Estoy en ponencias</h1>-->
    <div class=" flex flex-col justify-center relative bg-white p-3 rounded cursor-pointer " ref='elemento'
         @click="muestra_oculta_detalle">
        <!--         @mouseleave="mouse_leave">-->
        <div class="z-10 flex flex-row justify-center items-center">

            <!--            <div class="bg-white rounded-3xl p-3 w-10v h-10v auto-cols-max">-->
            <img :src=src alt="" class="max-w-5v max-h-5v w-20 h-20 rounded-lg mx-auto ">
            <h1> {{ empresa_actual.empresa }}</h1>
        </div>
        <div class="text-xs text-red-700 self-end items-end flex flex-row">+  info<img class="w-8" :src='mas_info'></div>


    </div>

<modal_empresa :showing="seleccionado" :empresa="empresa_actual"  @close="seleccionado = false">
</modal_empresa>
<!--    <div-->
<!--        class="cursor-default relative top left-10 divide-x divide-yellow-600 panel_empresa flex flex-row-->
<!--            justify-between"-->
<!--        span v-if="seleccionado">-->
<!--        <img :src="'/storage/logos/'+empresa.logo" alt="logo" class=" relative max-w-20 max-h-20  p-2 mr-15">-->
<!--        &lt;!&ndash;                <div class="flex flex-col justify-around text-blue-700 font-mono">&ndash;&gt;-->
<!--        <div class="flex flex-col justify-start divide-y-3 divide-green-700">-->
<!--            <div class="mx-5 text-purple-700 text- text-monospace">{{ empresa.empresa }}</div>-->
<!--            &lt;!&ndash;                    <div class="flex flex-row ">&ndash;&gt;-->
<!--            <div>-->
<!--                <div class="mx-5"> {{ empresa.duracion }} minutos</div>-->
<!--                <div class="ml-5">Comienza {{ empresa.horario }}</div>-->
<!--            </div>-->
<!--            <div>-->
<!--                <a class="text-red-800 hover:text-blue-700" :href="empresa.enlace">Acceder a la charla</a>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->


</template>


<script>

import modal_empresa from "./modal_empresa.vue";
export default {
components:{
    modal_empresa
},

    props: ['src', 'empresa'],
    data() {
        return {
            empresa_actual: JSON.parse(this.empresa),
            seleccionado: false,
            pos_x: 0,
            pos_y: 0,
            mas_info:'images/icon/mas_info.png',
        }
    },
    created() {
        // this.allProducts();
    },
    mounted() {
        //
        // console.log(this.$el.getBoundingClientRect().height) // get 0
        // this.$nextTick(()=>{
        //     console.log(this.$ref.getBoundingClientRect().height) //get height
        // })


    },
    methods: {
        muestra_oculta_detalle: function () {
            this.seleccionado = this.seleccionado == true ? false : true;
            if (this.seleccionado==true) {
                // Intento de volver opaco lo de atrás
                /*Enviar un mensaje para dar opacidad*/
                // console.log("Valor de esto "+this.$refs['ponencias'].classList.value);
                // this.$refs.ponencias.classList.value="bg-opacity-25";
            }

        },

        mouse_over: function (event) {
            this.seleccionado = true;
            // console.log("Hola");
            let el = this.$refs['elemento'];
            // console.log(el); //get height
            this.pos_x = el.getBoundingClientRect().top;
            this.pos_y = el.getBoundingClientRect().left;

            // var x = this.$ref.getBoundingClientRect().top;
            // var y = this.$ref.getBoundingClientRect().left;
            var y = event.clientY;
            // console.log("Hola: X: " + x + "Y: " + y);
            // console.log(this.$ref.getBoundingClientRect().height) //get height

        },
        mouse_leave: function (event) {
            this.seleccionado = false;
            console.log("Adiós");

        }


    },
}
</script>
