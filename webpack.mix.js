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
mix
    .js('resources/js/admin-quan-ly-tai-khoan.js', 'public/js/admin-quan-ly-tai-khoan.js')
    .js('resources/js/admin-quan-ly-danh-muc.js', 'public/js/admin-quan-ly-danh-muc.js')
    .js('resources/js/admin-quan-ly-vat-pham.js', 'public/js/admin-quan-ly-vat-pham.js')
    .js('resources/js/admin-quan-ly-cua-hang.js', 'public/js/admin-quan-ly-cua-hang.js')
    .options({
        processCssUrls: false
    })
