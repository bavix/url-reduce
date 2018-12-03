/*jshint esversion: 6 */
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const { VueLoaderPlugin } = require('vue-loader');
const SpritePlugin = require('svg-sprite-loader/plugin');

module.exports = {
    optimization: {
        minimizer: [new UglifyJsPlugin({
            sourceMap: true
        })]
    },
    entry: {
        app: [
            './resources/js/app.js',
            './resources/sass/app.scss'
        ],
    },
    output: {
        path: path.resolve(__dirname, 'public/'),
        chunkFilename: 'js/[name].bundle.js',
        filename: 'js/[name].bundle.js'
    },
    resolve: {
        extensions: ['.js'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
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
            {
                test: /\.svg$/,
                loader: 'svg-sprite-loader',
                options: {
                    extract: true,
                    spriteFilename: 'images/sprite.svg'
                }
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            // Options similar to the same options in webpackOptions.output
            // both options are optional
            filename: 'css/app.css',
        }),
        new VueLoaderPlugin(),
        new SpritePlugin({
            plainSprite: true
        }),
    ]
};
