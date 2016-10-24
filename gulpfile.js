const elixir = require('laravel-elixir');
const modulesPath = '../../../node_modules/';

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

elixir(mix => {
    mix.sass('app.scss')

      .sass('admin.scss', 'public/css/admin.css')

      .styles([
        modulesPath + 'froala-editor/css/froala_editor.min.css',
        modulesPath + 'froala-editor/css/froala_style.min.css',
        modulesPath + 'froala-editor/css/plugins/table.min.css',
      ], 'public/css/editor.css')

      .scripts([
        modulesPath + 'froala-editor/js/froala_editor.min.js',
        modulesPath + 'froala-editor/js/plugins/table.min.js',
        modulesPath + 'froala-editor/js/plugins/lists.min.js',
        modulesPath + 'froala-editor/js/plugins/paragraph_format.min.js',
        'editor.js'
      ], 'public/js/editor.js')

    	.styles([
    		modulesPath + 'owlcarousel/owl-carousel/owl.carousel.css',
    		modulesPath + 'owlcarousel/owl-carousel/owl.transitions.css',
        modulesPath + 'owlcarousel/owl-carousel/owl.theme.css',
    	], 'public/css/carousel.css')

    	.scripts([
    		modulesPath + 'owlcarousel/owl-carousel/owl.carousel.js',
    		'owl-carousel.js'
    	], 'public/js/carousel.js')

      .styles([
        modulesPath + 'video.js/dist/video-js.css',
      ], 'public/css/video.css')

      .scripts([
        modulesPath + 'video.js/dist/ie8/videojs-ie8.js',
        modulesPath + 'video.js/dist/video.js',
        'video.js',
      ], 'public/js/video.js')

      .styles([
        'map.css'
      ], 'public/css/map.css')

      .scripts([
        'map.js'
      ], 'public/js/map.js')

      .scripts([
        'MapListings.js'
      ], 'public/js/MapListings.js')

       .webpack('app.js')
       .webpack('components/CreateProject.js', 'public/js/CreateProject.js')

       .webpack('admin.js', 'public/js/admin.js')

       .copy('node_modules/font-awesome/fonts', 'public/fonts')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts')
       .copy('node_modules/owlcarousel/owl-carousel/grabbing.png', 'public/css')
       .copy('node_modules/owlcarousel/owl-carousel/AjaxLoader.gif', 'public/css');

       // .version([
       //    'public/css/app.css',
       //    'public/js/app.js',
       //    'public/css/admin.css',
       //    'public/js/admin.js',
       //    'public/js/CreateProject.js',
       //    'public/css/editor.css',
       //    'public/js/editor.js',
       // 		'public/css/carousel.css',
       // 		'public/js/carousel.js'
       // 	]);
});
