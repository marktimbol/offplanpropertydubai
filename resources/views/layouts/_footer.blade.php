<section class="Developers">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="Section__title text-center">Developers</h3>
				<div class="Developers Carousel">
					@foreach( $developers as $developer )
					<?php 
						$path = getPhotoPath('/images/developers/developer.jpg');
					?>
					<div class="Developer">
						<div class="Developer__image">
							<a href="{{ route('developers.show', $developer->slug) }}">
								<img src="{{ $path }}" alt="{{ $developer->name }}" title="{{ $developer->Name }}" class="img-responsive" />
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<footer></footer>