$(document).ready(function() {
	$(".Carousel").owlCarousel({
		pagination: false,
		autoPlay: true,
	});

	let floorplan = $('.Floorplans');
	floorplan.owlCarousel({
		singleItem: true,
		pagination: false,
		navigation: true,
		autoPlay: true,
	});

	$('.Floorplan__next').click(function() {
		floorplan.trigger('owl.next');
	});

	$('.Floorplan__prev').click(function() {
		floorplan.trigger('owl.prev');
	});

	//

	let projectCarousel = $('.Project__carousel');
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
});