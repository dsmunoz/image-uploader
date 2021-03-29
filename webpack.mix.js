const mix = require('laravel-mix');
mix.options({
    hmrOptions: {
        host: 'image-uploader.test',
        port: 8080
    },
})
mix.webpackConfig({
    devServer: {
        host: '0.0.0.0',
        port: 8080,
    },
    watchOptions: {
        poll: true,
        aggregateTimeout: 200,
    }
})

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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).options({
    processCssUrls: true,
}).vue();

