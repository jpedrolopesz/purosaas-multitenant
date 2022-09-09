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

mix.js('./public/js/app.js', './public/js')
    .postCss('./public/css/app.css', './public/css', [
        require('tailwindcss'),
        require('postcss-import')
    ]).disableNotifications();


if (mix.inProduction()) {
    mix
        .version();
}
