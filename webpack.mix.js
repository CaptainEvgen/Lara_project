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
    .sass('resources/sass/main.sass', 'public/css')
    .options({
        processCssUrls: false
     });
mix.js('resources/admin/js/scripts.js', 'public/js')
    .js('resources/admin/js/datatables-simple-demo.js', 'public/js')
    .css('resources/admin/css/styles.css', 'public/css');
