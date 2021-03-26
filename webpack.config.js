/**
 * Created by Jamal on 8/9/2019.
 */
const path = require('path');
const miniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const autoprefixer = require("autoprefixer");
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const config = {
    entry: {
        admin: './assets/src/js/admin.js',
        home: './assets/src/js/home.js'
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
                test: /\.(png|jpe?g|gif)$/,
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
                use: [{
                    loader: 'file-loader',
                    options: {
                        outputPath: 'fonts',
                        publicPath: '../fonts',
                        name: './[name].[ext]'
                    }
                }]
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
                new OptimizeCssAssetsPlugin({
                    assetNameRegExp: /\.css$/g,
                    cssProcessor: require('cssnano'),
                    cssProcessorPluginOptions: {
                        preset: ['default', { discardComments: { removeAll: true } }],
                    },
                    canPrint: true
                }),
            ]

        );

    }

    return config;
}
