var elixir = require('laravel-elixir');

elixir(function(mix) {
    // Compile CSS
    mix
        .sass('app.scss', 'resources/assets/css/app.css')


        .styles(
            [
                'uikit.min.css',
                'components/slideshow.min.css',
                'components/slidenav.min.css',
                'components/slider.min.css',
                'components/dotnav.min.css',
                //'components/sticky.min.css',
                'components/notify.min.css',
                'components/tooltip.min.css',
                'app.css'
                //'magnific-popup/magnific-popup.css'
            ], // Source files
            'public/css/custom.css' // Destination file
            //'bower_components/foundation/js/' // Source files base directory
        )

        .scripts(
            [
            	'vendor/modernizr-2.8.3.min.js',
                'jquery-1.12.1.min.js',
                'vue.min.js',
                'vue-resource.min.js'
            ],
            'public/js/top.js'
        )

        // Compile JavaScript
        .scripts(
            [
                'uikit.min.js',
                'components/slideshow.min.js',
                'components/slider.min.js',
                'components/slideset.min.js',
                'components/lightbox.min.js',
                //'components/sticky.min.js',
                //'underscore/underscore-min.js',
                //'magnific-popup/jquery.magnific-popup.min.js',
                'components/notify.min.js',
                //'/components/tooltip.min.js',
                'scripts.js'
            ],
            'public/js/custom.js' // Destination file
        )



        .version(['css/custom.css', 'js/top.js', 'js/custom.js']);

        /*.browserSync({
            proxy: 'crystalpeel.dev'
        });*/
});