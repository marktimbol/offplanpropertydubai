$(document).ready(function() {
	let video = videojs('Project__video');

	$('.PlayButton').on('click', function() {
		video.play();
	});

	video.on('play', function() {
		$('.PlayButton').hide();
	});

	video.on('pause', function() {
		$('.PlayButton').show();
	});
});