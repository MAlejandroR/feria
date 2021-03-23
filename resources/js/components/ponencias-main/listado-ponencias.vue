<template>

<div class="w:1/2">
        <div class="text-center font-mono justify-center items-center  text-xl text-white bg-enlaces  h-10v">
            LISTADO DE PONENCIAS
            <div class="flex flex-row justify-around items-center">
                <div class="font-mono text-monospace text-white
            text-2xl border-2 border-green-800 rounded bg-enlaces p-1">
                    {{ hora }}:{{ minutos }}:{{ segundos }}
                </div>
                <button @click="ordena_nombre" class="boton2">Nombre</button>
                <button @click="ordena_horario" class="boton2">Horario</button>
            </div>
        </div>
      <div class="bg-white  px-5 overflow-y-auto  h-60v  ">
            <div v-for="empresa in listado_dinamico">
                <a :href="empresa.enlace" title="Enlace a la ponencia" :class="empresa.estado_ponencia"
                   class="rounded bg-gray-200 max-w-full  flex flex-row  justify-between items-center
            m-3 text-blue-700 font-mono   w-40v  ">
                    <!-- Para ponencias on line, se marca -->
                    <button class="animate-ping
                 h-5 w-20 rounded-full bg-green-900 opacity-4 text-xs text-white"
                            v-if="empresa.estado_ponencia==='transmitiendo'">
                        On line
                    </button>

                    <!--                <button class="animate-ping inline-block-->
                    <!--                 py-4 px-8 bg-blue-500 text-blue-100 w-1/6 -->
                    <!--                 rounded-lg" v-if="empresa.estado_ponencia==='finalizada'">-->
                    <!--                    On line-->
                    <!--                </button>-->
                    <!-- ... -->

                    <img :src="'/storage/logos/'+empresa.logo" alt="logo" class="p-2 mr-15 w-10v max-h-20">
                    <!--                <div class="flex flex-col justify-around text-blue-700 font-mono">-->

                    <div class="mx-5"> {{ empresa.empresa }}</div>
                    <!--                    <div class="flex flex-row "-->
                    <div class="mr-5">{{ empresa.horario }}</div>
                    <!--                <div class="mr-5">{{ empresa.estado_ponencia }}</div>-->
                    <!--                    </div>-->
                </a>

            </div>
        </div>
</div>
</template>


<script>
import axios from 'axios';

export default {
    props: ['empresas'],
    data() {
        return {
            hora: 0,
            minutos: 0,
            segundos: 0,
            clase: "",
            listado: JSON.parse(this.empresas),
            listado_dinamico: [],
        }
    },
    created() {
        this.ordena_nombre();
        this.actualiza_hora();
        this.add_property_empresa();

    },
    mounted() {
        var self = this;
        setInterval(function () {
            self.actualiza_hora();
        }, 1000);
        setInterval(function () {
            self.estado_ponencia();
        }, 5000);

        // console.log(this.empresas);
        this.ordena_horario();
        this.filas = this.filas + 1;
    },

    methods: {

        //
        obtener_estado_ponencia: function (horario, duracion) {
            var estado;
            var horaActual;
            var minutoActual;
            var horaComienzoPonencia;
            var horaFinPonencia;
            var minutoComienzoPonencia;
            var minutoFinPonencia;

            var comienzo;
            var fin;
            var actual;
            var duracion;
            // console.log("En estado de ponencia");//36600
            horaComienzoPonencia = parseInt(horario.substr(0, 2));
            minutoComienzoPonencia = parseInt(horario.substr(3, 2));

            comienzo = horaComienzoPonencia * 3600 + minutoComienzoPonencia * 60;
            actual = this.hora * 3600 + this.minutos * 60;
            // console.log("En obtener estado de ponencia hora " + this.hora)
            // console.log("En obtener estado de ponencia minutos " + this.minutos)
            //
            // console.log("En obtener estado de ponencia, Actual " + actual);//47400 (13:10)
            duracion = parseInt(duracion) * 60;
            fin = comienzo + duracion;
            // console.log("En obtener estado de ponencia, Comienzo " + comienzo + " Fin " + fin);//47400 (13:10)
            if (actual < comienzo)
                return "pendiente";
            if (actual >= comienzo) {
                // console.log("Actual + duracion  " + actual + " Duracon" + duracion + " Comienzo : " + comienzo);
                let tmp = actual + duracion;
                if (actual < fin) {
                    let msj = "Actual:" + this.hora + ":" + this.minutos + "- Comienzo,duracion: " + horaComienzoPonencia + "-" + duracion + "-Actual, comienzo y fin: " + actual + "-" + comienzo + "-" + fin;
                    // console.log("Transmitiendo " + msj);
                    return "transmitiendo";

                } else
                    // return "finalizada"+this.hora+":"+this.minutos+"-"+horaComienzoPonencia+"-"+duracion+"-"+actual+"-"+comienzo+"-"+fin ;
                    return "finalizada";
            }
        },
        add_property_empresa: function () {
            this.listado_dinamico.forEach(empresa => {
                empresa.estado_ponencia = "pendiente";
                // Object.defineProperty(empresa,"estado_ponencia", {pendiente});
            });

        },
        estado_ponencia: function () {

            // console.log("En estado ponencia 1 ");
            var self = this;

            this.listado_dinamico.forEach(
                empresa => {

                    // console.log("Hola en estado_pnencia");
                    var estado;
                    var hora_ponencia = empresa.horario.substr(0, 2);
                    var minutos_ponencia = empresa.horario.substr(3, 2);
                    // console.log("hora ponencias " + hora_ponencia);
                    // console.log("minutos  " + minutos_ponencia);
                    // console.log("En estado ponencia");
                    estado = this.obtener_estado_ponencia(empresa.horario, empresa.duracion);
                    // console.log("Valor de estado: -" + estado + "-");
                    empresa.estado_ponencia = estado;

                    // console.log("Valor de estado: 2");
                }
            );
        },
        actualiza_hora: function () {
            var reloj = new Date(Date.now());
            this.hora = reloj.getHours();
            this.minutos = reloj.getMinutes();
            this.segundos = reloj.getSeconds();
            this.horas = this.horas > 9? this.horas: "0"+this.horas;
            this.minutos = this.minutos > 9? this.minutos: "0"+this.minutos;
            this.segundos = this.segundos > 9 ? this.segundos : "0" + this.segundos;
            // this.hora = 11;
            // this.minutos = 50;


        },
        ordena_horario: function () {
            // console.log(this.listado);
            this.listado_dinamico = this.listado.sort(((a, b) =>
                a.horario > b.horario ? 1 :
                    a.horario < b.horario ? -1 :
                        0));

            // this.listado_dinamico={'empresa':'hola','horario':'como estás'};
            // console.log("Ordeno por horario")
            // console.log("Ordeno por Horario "+ this.listado_dinamico [0].empresa);

            // this.listado_dinamico.forEach(empresa=>console.log(empresa.empresa+"-"+ empresa.horario));0


        },
        ordena_nombre: function () {
            // console.log(this.listado);
            this.listado_dinamico = this.listado.sort(((a, b) =>
                a.empresa > b.empresa ? 1 :
                    a.empresa < b.empresa ? -1 :
                        0));
            // console.log("Ordeno por nombre"+ this.listado_dinamico [0].empresa);
            // this.listado_dinamico.forEach(empresa=>console.log(empresa.empresa+"-"+ empresa.horario));0


        },
        // actualiza_src:function(){
        //                 this.empresas.forEach(empresa.logo="storagfe/logos/"+empresa.logo);
        //     }


        // allProducts(){
        //     let self = this;
        //     let urlAllProducts = this.url + '/api/products';
        //     axios.get(urlAllProducts)
        //         .then(response => {
        //             self.products = response.data;
        //         })
        //         .catch(err => {
        //
        //         })
        // }
    },
}
</script>
