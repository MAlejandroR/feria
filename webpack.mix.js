const mix = require('laravel-mix');
const webpack = require('webpack');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
   .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

//Para quitar un warning que sale en DevOps ..... ???
// https://stackoverflow.com/questions/66189561/you-are-running-the-esm-bundler-build-of-vue-it-is-recommended-to-configure-you
mix.webpackConfig ({
    plugins: [
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            __VUE_PROD_DEVTOOLS__: true,
        }),
    ],
})
