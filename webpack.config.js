/**
 * Created by Jamal on 8/9/2019.
 */
const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const autoprefixer = require("autoprefixer");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const config = {
    entry: {
        "admin-core-ltr": './assets/src/js/ltr/admin-core-ltr.js',
        "home-280-ltr": './assets/src/js/ltr/home-280-ltr.js',
        "home-481-ltr": './assets/src/js/ltr/home-481-ltr.js',
        "home-769-ltr": './assets/src/js/ltr/home-769-ltr.js',
        "home-1025-ltr": './assets/src/js/ltr/home-1025-ltr.js',
        "home-1201-ltr": './assets/src/js/ltr/home-1201-ltr.js',
        "home-1824-ltr": './assets/src/js/ltr/home-1824-ltr.js',
        "home-core-ltr": './assets/src/js/ltr/home-core-ltr.js',
        "home-handheld-ltr": './assets/src/js/ltr/home-handheld-ltr.js',
        "home-print-ltr": './assets/src/js/ltr/home-print-ltr.js',
        "admin-core-rtl": './assets/src/js/rtl/admin-core-rtl.js',
        "home-280-rtl": './assets/src/js/rtl/home-280-rtl.js',
        "home-481-rtl": './assets/src/js/rtl/home-481-rtl.js',
        "home-769-rtl": './assets/src/js/rtl/home-769-rtl.js',
        "home-1025-rtl": './assets/src/js/rtl/home-1025-rtl.js',
        "home-1201-rtl": './assets/src/js/rtl/home-1201-rtl.js',
        "home-1824-rtl": './assets/src/js/rtl/home-1824-rtl.js',
        "home-core-rtl": './assets/src/js/rtl/home-core-rtl.js',
        "home-handheld-rtl": './assets/src/js/rtl/home-handheld-rtl.js',
        "home-print-rtl": './assets/src/js/rtl/home-print-rtl.js',

    },
    output: {
        filename: 'js/[name].min.js',
        path: path.resolve(__dirname, 'assets/dest')
    },
    mode: 'production',
    module: {
        rules: [{
            test: /\.css$/,
            use: [
                miniCssExtractPlugin.loader,
                'css-loader',
                {
                    loader: 'postcss-loader',
                    options: {
                        plugins: [
                            require('autoprefixer')({}),

                        ]
                    }
                },
            ]
        },
        {
            test: /\.scss$/,
            use: [{
                loader: miniCssExtractPlugin.loader
            },
                'css-loader',
            {
                loader: 'postcss-loader',
                options: {
                    postcssOptions: {
                        plugins: [
                            [
                                require('autoprefixer')({}),
                                {
                                    // Options
                                },
                            ],
                        ],
                    },
                }
            },
                'sass-loader'
            ]
        },
        {
            test: /\.(png|jpe?g|gif|webp)$/,
            use: [{
                loader: 'file-loader',
                options: {
                    outputPath: 'images',
                    publicPath: '../images',
                    name: './[name].[ext]'
                }
            }]
        },
        {
            test: /\.(eot|ttf|woff|woff2)/,
            type: 'asset/resource',
            generator: {
                filename: './fonts/[name][ext]',
            },
            // use: [{
            //     loader: 'file-loader',
            //     type: 'asset/resource',
            //     generator: {
            //         filename: './fonts/[name][ext]',
            //     },
            //     options: {
            //         outputPath: 'fonts/',
            //         publicPath: '../fonts',
            //         name: './[name].[ext]'
            //     }
            // }]
        }
        ]
    },
    plugins: [

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


module.exports = (env, { mode }) => {
    let isDevelopment = mode === 'development';

    //development mode
    if (isDevelopment) {
        config.output.filename = 'js/[name].js';
        config.mode = "development";

        config.plugins.push(
            new miniCssExtractPlugin({
                filename: "css/[name].css"
            }),
        );
    }


    /*config.module.rules.push(...[
        {
            test : /\.css$/,
            use : [isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader , 'css-loader']
        },
        {
            test : /\.s[ac]ss$/,
            use : [isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader , 'css-loader' , 'sass-loader']
        },
    ])*/

    //production mode
    if (!isDevelopment) {
        config.output.filename = 'js/[name].min.js';
        config.mode = "production";

        config.plugins.push(...[
            new miniCssExtractPlugin({
                filename: "css/[name].min.css"
            }),
            new CssMinimizerPlugin(),
        ]

        );

    }

    return config;
}
