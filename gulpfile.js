const elixir = require('laravel-elixir');
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
    	.styles([
    		'../../../node_modules/owlcarousel/owl-carousel/owl.carousel.css',
    		'../../../node_modules/owlcarousel/owl-carousel/owl.transitions.css',
        '../../../node_modules/owlcarousel/owl-carousel/owl.theme.css',
    	], 'public/css/carousel.css')

    	.scripts([
    		'../../../node_modules/owlcarousel/owl-carousel/owl.carousel.js',
    		'owl-carousel.js'
    	], 'public/js/carousel.js')

       .webpack('app.js')

       .copy('node_modules/font-awesome/fonts', 'public/build/fonts')
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/build/fonts')
       .copy('node_modules/owlcarousel/owl-carousel/grabbing.png', 'public/build/css')
       .copy('node_modules/owlcarousel/owl-carousel/AjaxLoader.gif', 'public/build/css')

       .version([
       		'public/css/app.css',
       		'public/js/app.js',
       		'public/css/carousel.css',
       		'public/js/carousel.js'
       	]);
});
