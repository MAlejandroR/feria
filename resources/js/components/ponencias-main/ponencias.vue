<template>
    <!--        <h1>Estoy en ponencias</h1>-->
    <div class="relative bg-white p-3 rounded cursor-wait" ref='elemento'
         @mouseover="mouse_over"
         @mouseleave="mouse_leave">
        <div class="z-10 w-5v h-5v">
            <h1> {{ empresa.empresa }}</h1>
            <div class="bg-white rounded-3xl p-3 w-10v h-10v auto-cols-max">
                <img :src=src alt="" class = "max-w-5v max-h-5v">
            </div>


            <hr/>
        </div>
        <div class="cursor-default relative top left-10 divide-x divide-yellow-600 panel_empresa flex flex-row justify-between" span v-if="hover">
            <img :src="'/storage/logos/'+empresa.logo" alt="logo" class=" relative max-w-20 max-h-20  p-2 mr-15">
            <!--                <div class="flex flex-col justify-around text-blue-700 font-mono">-->
            <div class="flex flex-col justify-start divide-y-3 divide-green-700">
                <div class="mx-5 text-purple-700 text- text-monospace">{{ empresa.empresa }}</div>
                <!--                    <div class="flex flex-row ">-->
                <div>
                    <div class="mx-5"> {{ empresa.duracion }} minutos</div>
                    <div class="ml-5">Comienza {{ empresa.horario }}</div>
                </div>
                <div>
                    <a class="text-red-800 hover:text-blue-700" :href="empresa.enlace">Acceder a la charla</a>
                </div>

            </div>
        </div>
    </div>

</template>


<script>
export default {
    props: ['src', 'empresa'],
    data() {
        return {
            empresa: JSON.parse(this.empresa),
            hover: false,
            pos_x: 0,
            pos_y: 0,
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
        mouse_over: function (event) {

            this.hover = true;
            console.log("Hola");
            let el = this.$refs['elemento'];
            console.log(el); //get height
            this.pos_x = el.getBoundingClientRect().top;
            this.pos_y = el.getBoundingClientRect().left;

            // var x = this.$ref.getBoundingClientRect().top;
            // var y = this.$ref.getBoundingClientRect().left;
            var y = event.clientY;
            // console.log("Hola: X: " + x + "Y: " + y);
            console.log(this.$ref.getBoundingClientRect().height) //get height

        },
        mouse_leave: function (event) {
            this.hover = false;
            console.log("Adiós");

        }

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
