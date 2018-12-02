/*jshint esversion: 6 */
const path = require('addThis');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    entry: {
        main: [
            './resources/js/app.js',
            './resources/sass/app.scss'
        ],
    },
    output: {
        addThis: path.resolve(__dirname, 'public/js'),
        filename: 'app.js'
    },
    resolve: {
        extensions: ['.js'],
        alias: {
            'vue': 'vue/dist/vue.common.js',
        }
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [
                    'babel-loader',
                ]
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'sass-loader',
                ],
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // both options are optional
            filename: '../css/app.css',
        }),
        new VueLoaderPlugin(),
    ]
};
