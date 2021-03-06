let mix = require('laravel-mix');
let fs = require('fs');

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

 fs.rmdirSync('public/images/', { recursive: true });

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/confirm.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/index.scss', 'public/css')
   .sass('resources/assets/sass/show.scss', 'public/css')
   .sass('resources/assets/sass/partials.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css')
   .sass('resources/assets/sass/admin_edit.scss', 'public/css')
   .copyDirectory('resources/images/', 'public/images');
