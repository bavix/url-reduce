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

mix.sass('resources/sass/app.scss', 'public/css')

mix.js('resources/js/app.js', 'public/js')
    .extract([
        // '@fortawesome/fontawesome-pro',
        'vue-clipboard2',
        // 'sweetalert2',
        // 'lodash',
        'axios',
        'vuex',
        'vue',
    ])

mix.options({
    extractVueStyles: true,
    postCss: [
        require('autoprefixer')({
            browsers: [
                "> 1%",
                "last 3 versions",
                "ios >= 9",
                "ie >= 11"
            ]
        })
    ],
});


mix.webpackConfig(webpack => {
    return {
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm.js',
            }
        },
        module: {
            rules: [
                {
                    test: /\.svg$/,
                    loader: 'vue-svg-loader',
                },
            ]
        },
    };
});

if (mix.inProduction()) {
    mix.version();
}
