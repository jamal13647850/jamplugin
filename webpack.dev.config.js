/**
 * Created by Jamal on 8/3/2019.
 */
const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require("autoprefixer");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
    entry : {
        admin : './assets/src/js/admin.js',
        home : './assets/src/js/home.js'
    },
    output :{
        filename : 'js/[name].js',
        path : path.resolve( __dirname , 'assets/dest')
    },
    mode: 'development',
    module : {
        rules : [
            {
                test : /\.css$/,
                use : [
                    miniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options:{
                            plugins: [
                                require('autoprefixer')({}),

                            ]
                        }
                    },
                ]
            },
            {
                test : /\.scss$/,
                use : [
                    {
                        loader: miniCssExtractPlugin.loader,
                        options: {
                            hmr: process.env.NODE_ENV === 'development',
                        },
                    },
                    'css-loader',
                    {
                        loader: 'postcss-loader',
                        options:{
                            plugins: [
                                require('autoprefixer')({}),

                            ]
                        }
                    },
                    'sass-loader'
                ]
            },
            {
                test : /\.(png|jpe?g|gif)$/,
                use : ['file-loader']
            },
            {
                test : /\.(eot|ttf|woff|woff2)/,
                use :
                    [
                        {
                            loader : 'file-loader',
                            options : {
                                outputPath: 'fonts',
                                publicPath: '../fonts',
                                name : '[name].[ext]'
                            }
                        }
                    ]
            }
        ]
    },
    plugins : [
        new miniCssExtractPlugin({
                filename: "css/[name].css"
        }),
        new WebpackBuildNotifierPlugin({
            title: "My Project Webpack Build",
            logo: path.resolve("./img/favicon.png"),
            suppressSuccess: true,
            suppressWarning: true,
            suppressCompileStart: true,
        }),
        new CleanWebpackPlugin(),
    ]
};