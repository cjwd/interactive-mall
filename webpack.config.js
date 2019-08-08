const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

module.exports = {
  ...defaultConfig,
  entry: './admin/js/imm-gutenberg.js',
  output: {
    filename: 'editor.js',
    path: path.resolve(__dirname, 'admin/js')
  }
}