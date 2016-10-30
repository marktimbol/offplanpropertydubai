$(document).ready(function() {
	$(".Carousel").owlCarousel({
		pagination: false,
		autoPlay: true,
	});

	$('.Floorplans').owlCarousel({		
		singleItem: true,
		pagination: true,
		navigation: false,
		autoPlay: true
	});

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