let mix = require('laravel-mix');

mix.js('resources/js', 'dist/js/custom-filters.js').webpackConfig({
  resolve: {
    symlinks: false
  }
});
