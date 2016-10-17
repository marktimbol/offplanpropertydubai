$(document).ready(function() {
	$(".Carousel").owlCarousel({
		pagination: false,
		autoPlay: true,
	});

	let projectCarousel = $('.Project__carousel');
	projectCarousel.owlCarousel({
		singleItem: true,
		navigation: false, 
		pagination: false,
		autoPlay: false
		// transitionStyle : "fade"
	});

	$('.next').click(function() {
		projectCarousel.trigger('owl.next');
	});

	$('.prev').click(function() {
		projectCarousel.trigger('owl.prev');
	});
});