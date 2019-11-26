/*
 * Copyright (c) 25.11.2019.
 * File - webpack.mix.js
 * Author - tor
 */

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

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/admin/admin.js', 'public/js/admin')
    .sass('resources/sass/admin/admin.scss', 'public/css/admin')
    .js('resources/js/admin/users.js', 'public/js/admin')
    .sass('resources/sass/admin/users.scss', 'public/css/admin')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/mainPage/main.scss', 'public/css/mainPage')
    .options({
        processCssUrls: false
    })
    .copyDirectory('resources/images', 'public/images');
