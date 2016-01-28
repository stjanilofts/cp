var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
    .sass('app.scss')
    .browserSync({
    	proxy: 'crystalpeel.dev'
	});
});