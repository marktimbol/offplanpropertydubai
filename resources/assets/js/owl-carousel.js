$(document).ready(function() {

	var Hero = $('.Hero__carousel');
	Hero.owlCarousel({
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoHeight: true,
		autoPlay: false
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
		autoPlay: true
	});

	$('.next').click(function() {
		developers.trigger('owl.next');
	});

	$('.prev').click(function() {
		developers.trigger('owl.prev');
	});

	var floorplan = $('.Floorplans');
	floorplan.owlCarousel({
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoPlay: false
	});

	$('.next').click(function() {
		floorplan.trigger('owl.next');
	});

	$('.prev').click(function() {
		floorplan.trigger('owl.prev');
	});

	//

	var projectCarousel = $('.Project__carousel');
	projectCarousel.owlCarousel({
		// lazyLoad: true
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