const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
mix.copy('node_modules/fullpage.js/dist/fullpage.min.css', 'public/css/fullpage.min.css');
mix.copy('node_modules/fullpage.js/dist/fullpage.min.js', 'public/js/fullpage.min.js');
//bootstrap 4.5.2
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css','public/css/bootstrap.min.css');
mix.copy('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js','public/js/bootstrap.bundle.min.js');
mix.copy('node_modules/jquery/dist/jquery.min.js','public/js/jquery.min.js');
//datatable
mix.copy('node_modules/datatables.net/js/jquery.dataTables.min.js','public/js/jquery.dataTables.min.js');
mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css','public/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-dt/images','public/images');

