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

mix.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js').extract([
    '@fortawesome/fontawesome-svg-core',
    '@fortawesome/vue-fontawesome',
    'vue-clipboard2',
    'sweetalert2',
    // 'lodash',
    'axios',
    'vuex',
    'vue',
]);

mix.webpackConfig(webpack => {
    return {
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm.js',
                'sweetalert2$': 'sweetalert2/dist/sweetalert2.js',
            }
        }
    };
});

if (mix.inProduction()) {
    mix.version();
}
