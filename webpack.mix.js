const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'node_modules/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'node_modules/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'node_modules/admin-lte/plugins/jqvmap/jqvmap.min.css',
    'node_modules/admin-lte/plugins/summernote/summernote-bs4.css',
    'node_modules/admin-lte/dist/css/adminlte.min.css',
    'node_modules/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'node_modules/admin-lte/plugins/daterangepicker/daterangepicker.css',
    'node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css',
], 'public/css/adminlte.css');

mix.js([
    'node_modules/admin-lte/plugins/jquery-ui/jquery-ui.min.js',
    'node_modules/admin-lte/plugins/sparklines/sparkline.js',
    'node_modules/admin-lte/plugins/jquery-knob/jquery.knob.min.js',
    'node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js',
    'node_modules/admin-lte/plugins/summernote/summernote-bs4.min.js',
    'node_modules/admin-lte/plugins/chart.js/Chart.min.js',
    'node_modules/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
], 'public/js/adminlte.js');
mix.copy([
    'node_modules/admin-lte/plugins/datatables/jquery.dataTables.js',
], 'public/js/jquery.dataTables.js');
mix.copy([
    'node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js',
], 'public/js/dataTables.bootstrap4.js');

mix.copyDirectory('node_modules/admin-lte/dist/img', 'public/dist/img');
mix.version();
