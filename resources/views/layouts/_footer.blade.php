
@if( count($developers) > 0 )
	<section class="DeveloperListings--container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="Section__title text-center">Developers</h3>
					<div class="DeveloperListings Carousel">
						@foreach( $developers as $developer )
						<?php 
							$path = '/images/developers/developer.jpg';
							if( $developer->photo != '' ) {
								$path = getPhotoPath($developer->photo);
							}
						?>
						<div class="DeveloperListing">
							<div class="DeveloperListing__image">
								<a href="{{ route('developers.show', $developer->slug) }}">
									<img src="{{ $path }}" 
										alt="{{ $developer->name }}" 
										title="{{ $developer->Name }}" 
										class="img-responsive" />
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endif


<footer></footer>