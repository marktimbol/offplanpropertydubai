@extends('layouts.app')

@section('pageTitle', 'Developers')

@section('content')
<div class="DeveloperListings is-gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Developers</h1>
				<p class="lead">
					Dubai real estate developers are not only outstanding when it comes to their craft, they are able to combine luxury and the intertwine it with the comforts of living by giving its residents all the best that Dubai life has to offer. These developers have shaped the city into a global once that is today, providing homes to families that are not only prestigious but complete amenities to cater to their wants and needs.
				</p>
			</div>
			<div class="col-md-12">
				<div class="row">
					@foreach( $developers as $developer )
						<?php
							$photo = '/images/no-developer-image.jpg';
							if( $developer->photo != '' ) {
								$photo = getPhotoPath($developer->photo);
							}
						?>
						<div class="DeveloperListing col-md-3">
							<div class="DeveloperListing__image">
								<a href="{{ route('developers.show', $developer->slug) }}">
									<img src="{{ $photo }}" 
										alt="{{ $developer->name }}" 
										title="{{ $developer->name }}" 
										class="img-responsive" />
								</a>
							</div>
							<div class="DeveloperListing__content">
								<h4 class="Flex Space-between">
									<a href="{{ route('developers.show', $developer->slug) }}">{{ $developer->name }}</a>
									<small>
										{{ 
											sprintf('%s %s', count($developer->projects), str_plural('Project', count($developer->projects)))
										}}
									</small>
								</h4>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection