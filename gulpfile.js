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

// elixir(function(mix) {
//     mix.copy('./bower_components/font-awesome/fonts/fontawesome-webfont.eot', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/fonts/fontawesome-webfont.svg', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/fonts/fontawesome-webfont.ttf', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/fonts/fontawesome-webfont.woff', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/fonts/fontawesome-webfont.woff2', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/fonts/FontAwesome.otf', './public/fonts/');
//     mix.copy('./bower_components/font-awesome/scss/_animated.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_bordered-pulled.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_core.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_fixed-width.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_icons.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_larger.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_list.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_mixins.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_path.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_rotated-flipped.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_stacked.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/_variables.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/font-awesome/scss/font-awesome.scss', './resources/assets/sass/');
//     mix.copy('./bower_components/jquery/dist/jquery.min.js', './public/js/');
// });
//
// elixir(function(mix) {
//     mix.sass('app.scss');
//     mix.sass('font-awesome.scss');
// });

elixir(function(mix) {
    mix.copy('./node_modules/bootstrap-sass/assets/javascripts/bootstrap/modal.js', './public/js/');
});
