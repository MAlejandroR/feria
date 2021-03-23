<template>
    <h1>Hola    </h1>

    <div class="flex flex-col justify-center border-purple-900  w-full p-6
                    border-pink-700 rounded-3xl">
        <label class="border border-pink-900 rounded-2xl p-4 text-xl" for="familia">Familias profesionales

<!-- A ver qué veo -{{ciclos}}- -->
            <div v-for="ciclo in familia" class=" flex flex-row text-1xl mt-10 pl-10">
                <input type="checkbox" id="familia" v-model="ciclos_selected" name="familia[]" :value="ciclo.familia"
                       class="py-1" :class='ciclo.estilo_color' @change="ciclos_familia()">
                <!--                       color={{$index}}>-->
                <span :class='ciclo.estilo_color' class="ml-3">{{ ciclo.familia }}</span>
            </div>
        </label>
    </div>
<!--    <label class="p-4 text-xl" for="familia">Ciclo/s a los que va dirigido </label>-->

    <div id='ciclo' class="border border-pink-900 rounded-2xl">
        <!--        Falta implementar esta parte-->
        <h2>Para mostrar ciclos, selecciona una familia</h2>
        <ul>
            <li v-for="c in ciclos_selected">{{c}}</li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        'ciclos': {
            type: String
        }
    },

    data: ()=>{

        return {
            familia: {},
            nombre_ciclos:{},
            url:"",
            ciclos_selected:[],

            // familias: JSON.parse(this.ciclos)
        }
    },
    created() {
        this.familia = JSON.parse(this.ciclos);
        console.log("Hola !!!!"+this.familia);
        //Añadimos el color para el estilo
        this.familia.forEach(familia=>{
            familia.estilo_color = "text-"+familia.color+"-800";
            }
        )

    },
    methods:{
        ciclos_familia() {
            axios.post('/obtener_ciclos',{familias: this.ciclos_selected})
                 .then((response) => {
                    $('#ciclo').html(response.data.html)
                  }
                 )
        }
    },
};
</script>
