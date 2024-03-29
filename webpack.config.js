/**
 * Created by Jamal on 8/9/2019.
 */
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const autoprefixer = require("autoprefixer");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const config = {
    entry: {
        "admin-core-ltr": './assets/src/ts/ltr/admin-core-ltr.ts',
        "home-core-ltr": './assets/src/ts/ltr/home-core-ltr.ts',
        "home-print-ltr": './assets/src/ts/ltr/home-print-ltr.ts',
        "admin-core-rtl": './assets/src/ts/rtl/admin-core-rtl.ts',
        "home-core-rtl": './assets/src/ts/rtl/home-core-rtl.ts',
        "home-print-rtl": './assets/src/ts/rtl/home-print-rtl.ts',

    },
    output: {
        filename: 'js/[name].min.js',
        path: path.resolve(__dirname, 'assets/dest')
    },
    mode: 'production',
    resolve: {
        extensions: ['.ts', '.js'],
    },
    module: {
        rules: [
            {
                test: /\.ts$/,
                exclude: /node_modules/,
                use: 'ts-loader',
            },
            {
                test: /\.css$/,
                use: [
                    MiniCssExtractPlugin.loader,
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
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
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
            new MiniCssExtractPlugin({
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
            new MiniCssExtractPlugin({
                filename: "css/[name].min.css"
            }),
            new CssMinimizerPlugin(),
        ]

        );

    }

    return config;
}
