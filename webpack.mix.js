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
    .vue({
        extractStyles: true,
        globalStyles: false
    })
    .js('resources/js/bootstrap.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);


// const WebpackShellPlugin = require('webpack-shell-plugin');
//
// mix.webpackConfig({
//     plugins:
//         [
//             new WebpackShellPlugin({onBuildStart:['php artisan lang:js resources/js/vue-translations.js --no-lib --quiet'], onBuildEnd:[]})
//         ]
// });
