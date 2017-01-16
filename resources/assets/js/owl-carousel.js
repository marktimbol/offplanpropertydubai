$(document).ready(function() {

	var Hero = $('.Hero__carousel');
	Hero.owlCarousel({
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoHeight: true,
		autoplay: true
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
		navigation: false, 
		pagination: false,
		autoplay: true
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
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoHeight: true,
		autoplay: true
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
		autoplay: false
	});
});