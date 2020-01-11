let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('src/js/main.js', 'assets/js')
    .sass('src/sass/main.scss', 'assets/css')
    .sass('src/sass/style.scss', './');

// copy images
mix.copy('src/images/*', 'assets/images' );