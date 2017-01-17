$(document).ready(function() {
	var home__video = videojs('Home__video');

	$('.PlayButton').on('click', function() {
		home__video.play();
	});
	home__video.on('play', function() {
		$('.PlayButton').hide();
	});
	home__video.on('pause', function() {
		$('.PlayButton').show();
	});		
});