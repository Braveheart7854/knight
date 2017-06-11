// 设定为生产环境
process.env.NODE_ENV = 'production';
var webpack = require('webpack');
var merge = require('webpack-merge');
var HtmlWebpackPlugin = require('html-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var path = require('path');
var baseWebpackConfig = require('./webpack.base.config');
var utils = require('./utils');
var config = require('./config');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
module.exports = merge(baseWebpackConfig, {
  output: {
    path: config.prod.outputPath,
    publicPath: config.prod.outputPublicPath,
    filename: 'js/[name].js?[chunkhash]'
  },
  module: {
    rules: utils.styleLoaders()
  },
  plugins: [
    new webpack.DefinePlugin({
      'process.env.NODE_ENV': '"production"'
    }),
    // new webpack.optimize.UglifyJsPlugin(),
    new ExtractTextPlugin({
      filename: "css/style.css?[contenthash:8]"
    }),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor',
      minChunks: function (module, count) {
        return module.resource && /\.js$/.test(module.resource) && module.resource.indexOf(path.join(__dirname, '../node_modules')) === 0
      }
    }),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'manifest',
      chunks: ['vendor']
    }),
    new webpack.optimize.UglifyJsPlugin({
      compress: {
        warnings: false
      }
    }),
    new HtmlWebpackPlugin({
      filename: 'index.html',
      template: 'src/index.html',
      inject: true
    })
  ]
});