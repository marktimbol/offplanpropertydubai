@extends('layouts.app')

@section('header_styles')
	<link rel="stylesheet" href="/css/map.css" />
@endsection

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<h1 class="ProjectListings__title">
		Dubai Off Plan Projects
	</h1>
	<p class="lead">
		When it comes to finding out about off-plan, just launched or under-construction real estate projects in Dubai, our ‘new projects section’ is just what you need. Home to Dubai’s comprehensive list of real estate projects every project listing provides in-depth details starting from artistic, live images and video gallery, fact sheet, location map, frequently asked questions (FAQs), and more on sub communities within the projects, their features and nearby places. Our aim to provide as much information as possible to help you understand thoroughly as you progress with your home buying and investments. 
	</p>
	<div class="ProjectListings is-gray-bg">
		<div class="Column-7 Flex Flex--wrap scroll-y">
			@foreach( $projects as $project )
				<?php
					$avatar = '/images/avatar.jpg';
					if( $project->developer->photo !== '' )
					{
						$avatar = getPhotoPath($project->developer->photo);
					}
				?>
				<div class="ProjectListing col-md-6">
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
		<div class="Column-5 Googlemap">
			<section id="cd-google-map">
				<div id="google-container"></div>
				<div id="cd-zoom-in"></div>
				<div id="cd-zoom-out"></div>
			</section>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemap.key') }}"></script>
	<script src="/js/MapListings.js"></script>
@endsection