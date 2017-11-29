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
    mix
   
    .scripts([
        
        '../bower/bootstrap/dist/js/bootstrap.js',
        '../bower/bootstrap-select/dist/js/bootstrap-select.js',
        '../bower/jquery-validation/dist/jquery.validate.js',
        '../bower/datatables.net/js/jquery.dataTables.min.js'

    ], 'public/js/app.js')
   
    
});

