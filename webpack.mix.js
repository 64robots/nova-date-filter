let mix = require('laravel-mix');

mix.js('resources/js/date-filter.js', 'dist/js').webpackConfig({
  resolve: {
    symlinks: false
  }
});
