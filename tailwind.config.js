const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            backgroundImage: theme => ({ // imágenes de background nada definitivo ...
                "img_ponencias": "url('/images/background/bg_cubes.jpg')",
                "fondo_feria": "url('/images/background/fondo_feria.png')",
            }),
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // para crear tonalidades semitransparentes para una ventana modal
                'smoke-darkest': 'rgba(0, 0, 0, 0.9)',
                'smoke-darker': 'rgba(0, 0, 0, 0.75)',
                'smoke-dark': 'rgba(0, 0, 0, 0.6)',
                'smoke': 'rgba(0, 0, 0, 0.5)',
                'smoke-light': 'rgba(0, 0, 0, 0.4)',
                'smoke-lighter': 'rgba(0, 0, 0, 0.25)',
                'smoke-lightest': 'rgba(0, 0, 0, 0.1)',
                'enlaces': '#E9571E',
            },
            backgroundColor: {
                'cabecera': "#333333",
                'fondo': "#444344",
                'fondo1': "#9F9E9F",
                'fondo3': "#D5D5Db",
                'fondo2': "#EDEDED",
                'cabecera_modal':"#A3B3CF",
            },
            inset: {
                "1/5": "20%",
                "15": "15%",
            },
            inset: {
                "1/5": "20%",
                "15": "15%",
            },
            height: {
                "5v": "5vh",
                "10v": "10vh",
                "15v": "15vh",
                "65v": "65vh",
                "20v": "20vh",
                "30v": "30vh",
                "40v": "40vh",
                "50v": "50vh",
                "60v": "60vh",
                "70v": "70vh",
                "75v": "75vh",
                "80v": "80vh",
                "90v": "90vh",
                "100v": "100vh",
            },
            width: {
                "10v": "10vw",
                "15v": "15vw",
                "65v": "65vw",
                "20v": "20vw",
                "30v": "30vw",
                "40v": "40vw",
                "49v": "49vw",
                "50v": "50vw",
                "60v": "60vw",
                "70v": "70vw",
                "75v": "75vw",
                "80v": "80vw",
                "90v": "90vw",
                "100v": "100vw",
            },
            translate: ['active', 'group_hover'],

        },

    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
