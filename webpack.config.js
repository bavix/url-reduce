/*jshint esversion: 6 */
const path = require('path');
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const {VueLoaderPlugin} = require('vue-loader');
const SpritePlugin = require('svg-sprite-loader/plugin');

module.exports = {
    optimization: {
        minimizer: [
            new UglifyJsPlugin({sourceMap: true}),
            new OptimizeCSSAssetsPlugin({}),
        ]
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
            'vue$': 'vue/dist/vue.esm.js',
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
                    {loader: MiniCssExtractPlugin.loader, options: {sourceMap: true}},
                    {
                        loader: "css-loader",
                        options: {
                            importLoaders: 1,
                            sourceMap: true,
                            minimize: true,
                        }
                    },
                    {loader: 'postcss-loader', options: {sourceMap: true}},
                    {loader: 'sass-loader', options: {sourceMap: true}},
                ],
            },
            {
                test: /\.svg$/,
                use: [
                    {
                        loader: 'svg-sprite-loader',
                        options: {
                            extract: true,
                            spriteFilename: 'images/sprite.svg'
                        }
                    },
                    {
                        loader: 'svgo-loader',
                        options: {
                            plugins: [
                                {removeTitle: true},
                                {convertColors: {shorthex: false}},
                                {convertPathData: false}
                            ]
                        }
                    },
                ],
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
