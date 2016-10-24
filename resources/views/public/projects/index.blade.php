@extends('layouts.app')

@section('header_styles')
	<link rel="stylesheet" href="/css/carousel.css" />
	<link rel="stylesheet" href="/css/map.css" />
@endsection

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<h1 class="ProjectListings__title">
		Dubai Off Plan Projects
	</h1>
	<div class="ProjectListings">
		<div class="Column-7 Flex Flex--wrap scroll-y">
			@foreach( $projects as $project )
				<div class="ProjectListing col-md-6">
					<div class="ProjectListing__image">
						<img src="/images/projects/project.jpg" 
							alt="{{ $project->name }}" 
							title="{{ $project->name }}" 
							class="img-responsive" />

						<div class="ProjectListing__developer">
							<img src="/images/avatar.jpg" alt="{{ $project->developer->name }}" title="{{ $project->developer->name }}" class="img-circle img-bordered" />
						</div>
					</div>
					<div class="ProjectListing__description">
						<h4 class="text-truncate">
							<a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
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
	<script src="/js/carousel.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemap.key') }}"></script>
	<script src="/js/MapListings.js"></script>
@endsection