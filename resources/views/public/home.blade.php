@extends('layouts.app')

@section('pageTitle', 'Home')

@section('bodyClass', 'Home')

@section('content')

    <header>

    </header>

	<div class="Slide Flex Flex--center">
		<div class="Slide__content">
			<img src="/images/logo.png" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" class="img-responsive" />
			<form method="GET" class="Search">
				<input type="text" 
					name="search" 
					id="search" 
					class="form-control input-lg Search__input" 
					placeholder="Search for a developer or Project" />
				<button type="submit" class="btn-link Search__button">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>

	<section class="About">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="Section__title text-center">About Dubai Off Plan Projects</h3>
					<p class="text-center">
						Property which is still in the process of construction or is yet to be constructed is called off plan property. Off plan properties play a major role in strengthening the real estate sector of Dubai. Almost all property developers of Dubai have off plan projects scattered across the Emirates.
					</p>
					<p class="text-center">
						When buying real estate in Dubai off Plan property is a highly successful option. We offer the most comprehensive and latest information about project developments and our off plan specialists give free property consultation services.
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="ProjectListings--container is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="Section__title text-center">Latest Off Plan Projects</h3>
					<div class="row ProjectListings">
						@foreach( $projects as $project )
							<?php 
								$avatar = '/images/avatar.jpg';
								$path = '/images/projects/project.jpg';
								if( $projectPhoto = $project->photos->first() ) {								
									$path = getPhotoPath($projectPhoto->photo );
								}
							?>
								<div class="ProjectListing col-md-4">
									<div class="ProjectListing__image">
										<img src="/images/projects/project.jpg" 
											alt="{{ $project->name }}" 
											title="{{ $project->name }}" 
											class="img-responsive" />
										<div class="ProjectListing__developer">
											<a href="{{ route('developers.show', $project->developer->slug) }}">
												<img src="{{ $avatar }}" 
													alt="{{ $project->developer->name }}" 
													title="{{ $project->developer->name }}" 
													width="68" height="68"
													class="img-circle img-bordered img-responsive" />
											</a>
										</div>
									</div>
									<div class="ProjectListing__description">
										<h4 class="text-truncate">
											<a href="{{ route('projects.show', $project->slug) }}">
												{{ $project->title }}
											</a>
										</h4>
									</div>
								</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection