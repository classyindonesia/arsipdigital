var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
elixir(function(mix) {
    mix.less('app.less');
});
*/

var path_style = 'resources/css/';
var path_js = 'resources/css/';


elixir(function(mix) {
	mix.scripts([
		'plugins/jquery/jquery-2.1.3.min.js',
		'plugins/bootstrap/dist/js/bootstrap.js',
    'plugins/pace/pace.min.js',
    'plugins/vticker/jquery.vticker.min.js',
    'app.js'
		], 'public/js/main.js');


    mix.styles([
         "plugins/bootstrap/dist/css/bootstrap.css",
         "plugins/font-awesome/css/font-awesome.css",
         "plugins/animate/animate.css",
         "plugins/pace/pace.css",

         "app/box.css",
         "app/sidebar.css",
         "app/app.css",
         
    ], 'public/css/main.css');

   mix.version(["css/main.css", "js/main.js"]);

  mix.copy(path_style+'plugins/bootstrap/dist/fonts/', 'public/build/fonts/');
  mix.copy(path_style+'plugins/font-awesome/fonts/', 'public/build/fonts/');


});