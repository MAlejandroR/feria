<template>
    <!--<template>-->
    <!-- Datos de la empresa--->
    <div v-if="showing"
         class="fade z-50 fixed top-15 left-15  inset-0 w-9/12 h-4/6
         bg-gradient-to-t overflow-x-auto overflow-y-auto
         transition ease-out duration-100 bg-gray-300 flex flex-col justify-start " @click.self="close">


        <div class="flex flex-row justify-around self-center items-center mt-3 w-75v bg-cabecera_modal">

            <img :src="'/storage/logos/'+empresa.logo" alt="logo" class="p-2 mr-15 w-10v max-h-20">
            <!--                <div class="flex flex-col justify-around text-blue-700 font-mono">-->
            <h1 class="text-xl-center   text-4xl  text-enlaces font-mono">{{ empresa.empresa }}</h1>
            <button @click.prevent="close" class=" boton2  justify-self-end self-start"> Cerrar
            </button>
        </div>

        <div class=" mx-10 m-5  font-mono italic">{{ empresa.descripcion }}</div>
        <div class="text-2xl m-5">Ponente: <span class="italic font-bold">{{ empresa.ponente }}</span></div>
        <!--                    <div class="flex flex-row "-->
        <div class="text-2xl m-5">Hora ponencia: <span class="italic font-bold">{{ empresa.horario }}</span>
            <span v-if="ponencia" class="ml-5 font-mono text-monospace
                  text-2xl p-1">Comienza en</span>
            <span v-else class="ml-5 font-mono text-monospace
                  text-2xl p-1">Ponencia ya comenzada o realizada </span>
            <span class="ml-2 font-mono text-monospace text-white
            text-2xl border-2 border-green-800 rounded bg-enlaces p-1">
                {{ crono }}
            </span>
            <a class="botonFamilia bg-gray-600 " href="{{ empresa.enlace }}"> Accede a la ponencia de <span class="ml-2 text-xl italic">{{empresa.ponente}}</span></a>
            <hr />

            <div v-if="contacto" >
                <div>Persona de contacto</div>
            <span  class=" justify-center if ml-2 font-mono text-monospace text-white
            text-2xl  bg-indigo-400 border-2 2xl:border-green-600 rounded bg-enlaces p-1 text-center">

                Persona de contacto
                <span class ="italic text-3xl text-blue-900">{{ empresa.persona_contacto }}</span>
                Email
                <span class ="italic text-3xl text-blue-900">{{empresa.email}}
                    </span>
            </span>
            </div>


        </div>





    </div>
</template>
<script>
export default {
    // name: 'modalEmpresa',

    props: ['showing', 'empresa'],

    data() {
        return {
            crono_empezar: [],
            msj_crono: "00:00:00",
            crono_horas: "00",
            crono_minutos: "00",
            crono_segundos: "00",
            crono: "00:00:00",
            ponencia: true,
            contacto:false,

        }
    },
    created() {
        console.log("verse " + this.showing);
        this.inicializa_crono();

        console.log("Antes de evaluar Persona de contacto  -"+this.empresa.persona_contacto+"-" );

        if (this.empresa.persona_contacto != "") {
            console.log("Persona de contacto  -"+this.empresa.persona_contacto+"-" );
            this.contacto = true;
        }
    },
    mounted() {
        var self = this;
        setInterval(function () {
            self.actualiza_crono();
        }, 1000);
    },

    methods: {
        close: function () {
            this.$emit("close");
        },

        actualiza_crono() {
            var hora = parseInt(this.crono_horas);
            var minutos = parseInt(this.crono_minutos);
            var segundos = parseInt(this.crono_segundos);
            // console.log("Actualiza segundos "+segundos);
            segundos--;
            // console.log("Actualiza segundos "+segundos);
            if (segundos <= 0) {
                minutos--;
                segundos = 59;
            }
            if (minutos <= 0) {
                if (hora > 0) {
                    hora--;
                    minutos = 59;
                } else {
                    hora = 0;
                    minutos = 0;
                    segundos = 0;
                    this.ponencia=false;
                }
            }
            this.crono_horas = hora > 10 ? String(hora) : 0 + String(hora);
            this.crono_minutos = minutos > 10 ? String(minutos) : 0 + String(minutos);
            this.crono_segundos = segundos > 10 ? String(segundos) : 0 + String(segundos);
            this.crono = this.crono_horas + ":" + this.crono_minutos + ":" + this.crono_segundos;
            // console.log("en actualiza " + this.crono);
        },

        inicializa_crono() {

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
            horaComienzoPonencia = parseInt(this.empresa.horario.substr(0, 2));
            minutoComienzoPonencia = parseInt(this.empresa.horario.substr(3, 2));


            comienzo = horaComienzoPonencia * 3600 + minutoComienzoPonencia * 60;
            console.log("Inicializa Comienzo: " + comienzo);
            var reloj = new Date(Date.now());
            actual = reloj.getHours() * 3600 + reloj.getMinutes() * 60;
            console.log("Inicializa Actual: " + actual);
            // actual = 12 * 3600 + 10 * 60; //12:10
            // console.log("En obtener estado de ponencia hora " + this.hora)
            // console.log("En obtener estado de ponencia minutos " + this.minutos)
            //
            // console.log("En obtener estado de ponencia, Actual " + actual);//47400 (13:10)
            fin = comienzo + duracion;
            // console.log("En obtener estado de ponencia, Comienzo " + comienzo + " Fin " + fin);//47400 (13:10)
            // console.log("Actual = "+actual +" Comienzo "+comienzo);
            if (actual < comienzo) {
                var dif = comienzo - actual;
                var h = Math.floor(dif / 3600);
                this.crono_horas = h > 10 ? String(h) : 0 + String(h);
                var m = Math.floor((dif % 3600) / 60);
                this.crono_minutos = m > 10 ? String(m) : 0 + String(m);
                var s = (dif % 3600) % 60;
                this.crono_segundos = s > 10 ? String(s) : 0 + String(s);
            } else {
                this.crono_horas = "00";
                this.crono_minutos = "00";
                this.crono_segundos = "00";
            }
            console.log("Actualiza crono " + this.crono_horas + ":" + this.crono_minutos + ":" + this.crono_segundos);
            this.crono = this.crono_horas + ":" + this.crono_minutos + ":" + this.crono_segundos;
        },

        //     showing(value) {
        //         if (value) {
        //             return document.querySelector('body').classList.add('bg-opacity-40');
        //         }
        //
        //         document.querySelector('body').classList.remove(' bg-opacity-50 overflow-hidden');
        //     }
        // },

    }
}

</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.4s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>

