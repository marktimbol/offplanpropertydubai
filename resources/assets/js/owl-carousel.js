$(document).ready(function() {

	var Hero = $('.Hero__carousel');
	Hero.owlCarousel({
		rtl: Hero.data('locale') == 'ar' ? true : false,
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoHeight: true,
		autoPlay: true
	});

	$('.Hero__next').click(function() {
		Hero.trigger('owl.next');
	});

	$('.Hero__prev').click(function() {
		Hero.trigger('owl.prev');
	});

	//

	var developers = $('.DeveloperListings');	
	developers.owlCarousel({
		rtl: developers.data('locale') == 'ar' ? true : false,
		navigation: false, 
		pagination: false,
		autoPlay: true
	});

	$('.next').click(function() {
		developers.trigger('owl.next');
	});

	$('.prev').click(function() {
		developers.trigger('owl.prev');
	});

	//

	var projectCarousel = $('.Project__carousel');
	projectCarousel.owlCarousel({
		// lazyLoad: true
		rtl: projectCarousel.data('locale') == 'ar' ? true : false,
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoHeight: true,
		autoPlay: true
	});

	$('.next').click(function() {
		projectCarousel.trigger('owl.next');
	});

	$('.prev').click(function() {
		projectCarousel.trigger('owl.prev');
	});

	var projectVideos = $('.Project__videos');
	projectVideos.owlCarousel({
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoPlay: false
	});
});