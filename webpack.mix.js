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

mix.copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/js', 'public/js')
    .copyDirectory('resources/assets', 'public/assets')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/ckeditor', 'public/ckeditor')
    .minify('public/css/backend/style.css', 'public/css/backend/style.min.css')
    .minify('public/css/frontend/style.css', 'public/css/frontend/style.min.css')
    .browserSync('localhost:8000');
