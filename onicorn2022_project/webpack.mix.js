const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
.sass('resources/src/scss/_variables-dark.scss','public/src/scss')
    .sass('resources/src/scss/_variables.scss','public/src/scss')
    .sass('resources/css/custom/stucture/_topbar.scss','public/css/custom/structure')

    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
