var path = require('path')
var webpack = require('webpack')

module.exports = {
  devtool: 'source-map',
  entry: './src/main.vue',
  output: {
    path: path.join(__dirname, 'dist'),
    filename: 'vue2-selectize.js',
    libraryTarget: 'umd',
    library: 'Selectize'
  },
  resolve: {
    extensions: ['.vue', '.js'],
    modules: [
      path.resolve('./src'),		
      path.resolve('./node_modules')
    ]
  },
  module: {
    loaders: [
      {
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
          loaders: {
            js: 'babel-loader',
            scss: 'vue-style-loader!css-loader!sass-loader'
          }
        }
      }
    ]
  },
  externals: {
    jquery: {
      amd: 'jquery',
      commonjs: 'jquery',
      commonjs2: 'jquery',
      root: 'jQuery'
    }
  }
}