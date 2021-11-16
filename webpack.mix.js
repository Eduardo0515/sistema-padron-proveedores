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

/*mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');*/
mix.styles([
    'resources/assets/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/assets/dist/css/adminlte.min.css',
], 'public/css/innovacion.tuxtla.css')
    .copy([
        'resources/assets/dist/css/adminlte.min.css.map',
    ], 'public/css')
    .copy([
        'resources/assets/dist/js/adminlte.min.js.map',
    ], 'public/js')
    .copy([
        'resources/assets/dist/js/adminlte.min.js.map',
    ], 'public')
    .copy([
        'resources/img/logo.png',
        'resources/img/logo_header.png',
        'resources/img/logo_header_mini.png',
        'resources/img/avatar-default.png',
        'resources/img/logo-fiscalia.png',
        'resources/img/logo-coordinacion-territoriales-148.png',
    ], 'public/img')
    .scripts([
        'resources/assets/plugins/jquery/jquery.min.js',
        'resources/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'resources/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        'resources/assets/dist/js/adminlte.min.js',
        'resources/js/ajax-token.js'
    ], 'public/js/innovacion.tuxtla.js')
    .scripts([
        'resources/js/jquery.form.js'
    ], 'public/js/jquery.form.js')
    .scripts([
        'resources/js/bootbox/bootbox.min.js'
    ], 'public/js/bootbox/bootbox.min.js')

    .scripts([
        'resources/assets/plugins/daterangepicker/daterangepicker.js'
    ], 'public/js/daterangepicker/daterangepicker.js')
    .styles([
        'resources/assets/plugins/daterangepicker/daterangepicker.css'
    ], 'public/css/daterangepicker/daterangepicker.css')
    .styles([
        'resources/assets/plugins/select2/css/select2.min.css'
    ], 'public/css/select2/select2.min.css')
    .scripts([
        'resources/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'
    ], 'public/js/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.js')
    .styles([
        'resources/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'
    ], 'public/css/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')
    .scripts([
        'resources/js/login.js',
    ], 'public/js/login.js')

    .scripts([
        'resources/js/usuarios-list.js',
    ], 'public/js/usuarios-list.js')
    
    .scripts([
        'resources/js/usuarios-add.js',
    ], 'public/js/usuarios-add.js')
    .scripts([
        'resources/js/usuarios-edit.js',
    ], 'public/js/usuarios-edit.js')
    .scripts([
        'resources/js/usuarios-privileges.js',
    ], 'public/js/usuarios-privileges.js')
    .styles([
        'resources/assets/fonts_google/fonts_google.css'
        ],'public/css/fonts_google.css')
    .copy([
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7jsDJT9g.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7ksDJT9g.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7nsDI.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7osDJT9g.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7psDJT9g.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7qsDJT9g.woff2',
        'resources/assets/fonts_google/6xK1dSBYKcSV-LCoeQqfX1RYOo3qPZ7rsDJT9g.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qN67lqDY.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNa7lqDY.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNK7lqDY.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qNq7lqDY.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qO67lqDY.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qOK7l.woff2',
        'resources/assets/fonts_google/6xK3dSBYKcSV-LCoeQqfX1RYOo3qPK7lqDY.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwkxduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlBduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwlxdu.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmBduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmhduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmRduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ig4vwmxduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwkxduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlBduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdu.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmBduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmhduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmRduz8A.woff2',
        'resources/assets/fonts_google/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwmxduz8A.woff2'
        ],'public/fonts_google')
    .copyDirectory('resources/assets/plugins/fontawesome-free/webfonts', 'public/webfonts')
    .scripts([
        'resources/js/handlebars.min.js'
    ], 'public/js/handlebars.min.js')
    .scripts([
        'resources/assets/plugins/jquery-validation/jquery.validate.min.js'
    ], 'public/js/jquery-validation/jquery.validate.min.js')
    .styles([
        'resources/assets/plugins/datatables/css/datatables.min.css'
    ], 'public/css/datatables/datatables.min.css')
    .scripts([
        'resources/assets/plugins/datatables/js/datatables.min.js'
    ], 'public/js/datatables/datatables.min.js')
    .scripts([
        'resources/assets/plugins/select2/js/select2.full.min.js'
    ], 'public/js/select2/select2.full.min.js')
    .styles([
        'resources/assets/plugins/ol/ol.css'
    ], 'public/css/ol/ol.css')
    .scripts([
        'resources/assets/plugins/ol/ol.js'
    ], 'public/js/ol/ol.js');

