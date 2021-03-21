import {createApp} from 'vue';
import ponencias from './components/ponencias-main/ponencias.vue'
import contenido_feria from './components/feria_main.vue';
import listadoPonencias from './components/ponencias-main/listado-ponencias.vue';

import main_feria_ii from './components/feria-main/familia-ii.vue';
import main_feria_id from './components/feria-main/familia-id.vue';
import main_feria_si from './components/feria-main/familia-si.vue';
import main_feria_sd from './components/feria-main/familia-sd.vue';
// import main_feria_video from './components/feria-main/video-feria.vue';
import componente from './components/componente.vue';

// import a from "./a/a.vue";

createApp({
    components: {
        ponencias,
        listadoPonencias,
        componente,
        //
        contenido_feria,
        // main_feria_ii,
        // main_feria_id,
        // main_feria_si,
        // main_feria_sd,
        // main_feria_video,
    },
    data() {
        return {
            saludo: "Hola cómo estás"
        }

    },

}).mount('#app');

