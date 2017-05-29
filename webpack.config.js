const path = require('path');
const webpack = require('webpack');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
// const ServiceWorkerWebpackPlugin = require('serviceworker-webpack-plugin');
const DashboardPlugin = require('webpack-dashboard/plugin');
function getEntrySources (sources) {
  if (process.env.NODE_ENV !== 'production') {
    sources.push('webpack-dev-server/client?http://localhost:8080/');
  }
  return sources;
}

const basePlugins = [
  // new ServiceWorkerWebpackPlugin({
  //   entry: path.join(__dirname, 'src/sw.js'),
  // }),
  new webpack.DefinePlugin({
    __DEV__: process.env.NODE_ENV === 'development',
    __PRODUCTION__: process.env.NODE_ENV === 'production',
    __DEVTOOLS__: true,
    'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV)
  }),
  new HtmlWebpackPlugin({
    template: './src/index.html',
    inject: 'body'
  }),
  new ExtractTextPlugin('style.css', { allChunks: true })
];

const devPlugins = [
  new DashboardPlugin(),
  new webpack.NoErrorsPlugin(),
  new webpack.optimize.OccurenceOrderPlugin(),
  new webpack.HotModuleReplacementPlugin(),
];

const prodPlugins = [
  new webpack.optimize.OccurenceOrderPlugin(),
  new webpack.optimize.UglifyJsPlugin({
    compressor: {
      warnings: false
    }
  })
];

const plugins = basePlugins
  .concat(process.env.NODE_ENV === 'production' ? prodPlugins : [])
  .concat(process.env.NODE_ENV === 'development' ? devPlugins : []);

// css local
const localIdentName = process.env.NODE_ENV === 'development' ? '[name]__[local]' : '[hash:base64:5]';

module.exports = {
  entry: getEntrySources(['./src/main.js']),
  output: {
    path: path.join(__dirname, 'dist'),
    filename: '[name].[hash].js',
    publicPath: '/',
    sourceMapFilename: '[file].map', // https://github.com/webpack/extract-text-webpack-plugin/issues/119#issuecomment-184625754
    chunkFilename: '[id].chunk.js'
  },
  devServer: {
    historyApiFallback: true,
    hot: false,
    inline: true,
    grogress: true,
  },
  module: {
    loaders: [
      {
        test: /\.scss$/i,
        loader: ExtractTextPlugin.extract('style-loader', 'css-loader?sourceMap&modules&importLoaders=1&localIdentName=' + localIdentName + '!postcss-loader!sass-loader')
      },
      { test: /\.vue$/, loader: 'vue' },
      // { test: /\.html$/, loader: 'vue-html' },
      { test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/ },
      { test: /\.css$/i, loader: 'style-loader!css-loader!postcss-loader' },
      { test: /\.(png|jpg|jpeg|gif|svg)$/i, loader: 'url-loader?prefix=img/&limit=5000', exclude: /icons/ },
      { test: /\.(woff|woff2|ttf|eot)$/i, loader: 'url-loader?prefix=font/&limit=5000' }
    ]
  },
  devtool: 'source-map',
  plugins: plugins,
  resolve: {
    extensions: ['', '.js', '.json', '.vue']
  },
  eslint: {
    formatter: require('eslint-friendly-formatter')
  },
  postcss: function () {
    return [require('autoprefixer'), require('precss')];
  },
  vue: {
    // loaders: utils.cssLoaders(),
    postcss: [
      require('autoprefixer')({
        browsers: ['last 2 versions']
      })
    ]
  }
};