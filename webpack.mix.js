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

mix
    .js('resources/js/user/app.js', 'public/js/user')
    .js('resources/js/admin/app.js', 'public/js/admin')
    .sass('resources/scss/user/app.scss', 'public/css/user', [])
    .sass('resources/scss/admin/app.scss', 'public/css/admin', []);
