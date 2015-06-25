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

elixir(function(mix) {
    mix.less('app.less');
    // mix.less('bootstrap/bootstrap.less'); added in app.less

    // mix.styles(['']); // used to mix several css into one file, not used since we use a .less bootstrap

    mix.version('public/css/app.css'); // versions css under public->build->css and not public->css. the latter gets updated too but the former is versioned within the title.
});
