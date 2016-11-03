$(document).ready(function() {
	$(".Carousel").owlCarousel({
		pagination: false,
		autoPlay: true,
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
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoPlay: false
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