var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.styles([
        'app.css',
        'dropzone.css',
        'lity.css',
        'sweetalert.css'
    ]);

    mix.scripts([
        'jquery.min.js',
        'bootstrap.min.js',
        'dropzone.js',
        'lity.js',
        'sweetalert-dev.js',
        'vue.min.js',
        'vue-resource.min.js',
        'jquery.cookie.js'
    ]);
});
