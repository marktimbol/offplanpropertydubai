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
      .sass('components/Lightbox.scss', 'resources/assets/css/lightbox.css')

      .styles([
        modulesPath + 'froala-editor/css/froala_editor.min.css',
        modulesPath + 'froala-editor/css/froala_style.min.css',
        modulesPath + 'froala-editor/css/plugins/table.min.css',
      ], 'public/css/editor.css')

      .scripts([
        modulesPath + 'froala-editor/js/froala_editor.min.js',
        // modulesPath + 'froala-editor/js/plugins/font_family.min.js',
        // modulesPath + 'froala-editor/js/plugins/image.min.js',
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

      .scripts([
        modulesPath + 'video.js/dist/ie8/videojs-ie8.js',
        modulesPath + 'video.js/dist/video.js',
        'home-video.js',
      ], 'public/js/home-video.js')      

      .styles([
        'map.css'
      ], 'public/css/map.css')

      .scripts([
        'map.js'
      ], 'public/js/map.js')

      .scripts([
        'MapListings.js'
      ], 'public/js/MapListings.js')

      .styles([
        modulesPath + '/lightbox2/dist/css/lightbox.css',
        'lightbox.css',
      ], 'public/css/lightbox.css')

      .scripts([
        modulesPath + '/lightbox2/dist/js/lightbox.js',
      ], 'public/js/lightbox.js')      

       .webpack('app.js')
       .webpack('components/SearchProjects.js')
       .webpack('components/CreateProject.js', 'public/js/CreateProject.js')

       .webpack('admin.js', 'public/js/admin.js')

       .copy('node_modules/font-awesome/fonts', 'public/fonts')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts')
       .copy('node_modules/owlcarousel/owl-carousel/grabbing.png', 'public/css')
       .copy('node_modules/owlcarousel/owl-carousel/AjaxLoader.gif', 'public/css')
       .copy('node_modules/lightbox2/dist/images', 'public/build/images')

       .version([
        'public/css/app.css',
        'public/css/editor.css',
        'public/js/editor.js',          
        'public/js/carousel.js',          
        'public/js/video.js',          
        'public/js/home-video.js',
        'public/css/lightbox.css',       
        'public/js/lightbox.js',       
      ]);
});
