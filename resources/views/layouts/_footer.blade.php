<section class="is-gray-bg mt-20">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="Flex Flex--center Space-between">
					<h3 class="Invest__title Section__title">
						The best investment on earth is earth.
					</h3>
					<div class="Invest__action">
						<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#RegisterYourIntestForm">
							Register your interest
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@if( Route::current()->getName() != 'developers.projects.show' )
	@if( count($developers) > 0 )
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="Section__title text-center">Developers</h3>

						<div class="DeveloperListings--container">
							<div class="DeveloperListings">
								@foreach( $developers as $developer )
								<?php 
									$path = '/images/no-developer-image.jpg';
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

							<div class="DeveloperListings--nav">
								<a class="prev">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
								</a>
								<a class="next">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif
@endif

@include('public._register-your-interest')

<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>

<footer></footer>


