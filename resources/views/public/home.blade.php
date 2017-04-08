@extends('layouts.app')

@section('pageTitle', 'Home')

@section('header_styles')
{{-- 	<link rel="stylesheet" href="https://unpkg.com/react-instantsearch-theme-algolia@2.0.0/style.min.css" /> --}}
	<link rel="stylesheet" href="/css/video.css" />
@endsection

@section('bodyClass', 'Home')

@section('content')
	<div class="Hero--container Flex Flex--center">
		<div class="Hero__carousel owl-carousel" data-locale="{{ app()->getLocale() }}">
			@forelse($slides as $slide)
				<div>
					<img src="{{ getPhotoPath($slide->path) }}" alt="" title="" class="img-responsive" />
				</div>	
			@empty
				<div>
					<img src="/images/header-bg.jpg" alt="" title="" class="img-responsive" />
				</div>
			@endforelse
		</div>

		<div class="Hero__content">
			<img src="/images/logo.png" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" class="img-responsive" />
				<form method="GET" action="{{ route('search') }}" class="Search">
					<input type="text" 
						name="query" 
						class="form-control input-lg Search__input" 
						placeholder="@lang('messages.search-project')" />
					<button type="submit" class="btn-link Search__button">
						<i class="fa fa-search"></i>
					</button>
				</form>
		</div>

		<div class="Hero__carousel--nav">
			<a class="Hero__prev">
				<i class="fa fa-angle-left" aria-hidden="true"></i>
			</a>
			<a class="Hero__next">
				<i class="fa fa-angle-right" aria-hidden="true"></i>
			</a>
		</div>
	</div>

	<?php /*
	<div class="Slide Flex Flex--center">
		<div class="Slide__content">
			<img src="/images/logo.png" alt="{{ config('app.name') }}" title="{{ config('app.name') }}" class="img-responsive" />
			<form method="GET" action="{{ route('search') }}" class="Search">
				<input type="text" 
					name="query" 
					class="form-control input-lg Search__input" 
					placeholder="Search for a Project, Communities or Developer" />
				<button type="submit" class="btn-link Search__button">
					<i class="fa fa-search"></i>
				</button>
			</form>
		</div>
	</div>
	*/ ?>

	<section class="About">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="Row Flex--center">
						<div class="Column-6">
							<div class="padding-20">
								<div class="Home__video--container Flex Flex--center">
									<video id="Home__video"
										class="video-js" 
										muted controls
										preload="auto"
										height="391"
										{{-- poster="/images/burj-khalifa-fountain.jpg" --}}
									>
										<source src="http://pcasa.ae/pcasa/uploads/QaZeieDYLoeU3Mtn.mp4" type='video/mp4'>
										<p class="vjs-no-js">
											To view this video please enable JavaScript, and consider upgrading to a web browser that
											<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
										</p>
									</video>	
									<button class="btn btn-link PlayButton">
										<div class="play-video-icon Flex Flex--center">
											<span></span>
										</div>
									</button>
								</div>														
							</div>
						</div>
						<div class="Column-6">
							<div class="padding-20">
								<h3 class="Section__title">@lang('messages.about-dubai-offplan-projects')</h3>
								<p>
									Property which is still in the process of construction or is yet to be constructed is called off plan property. Off plan properties play a major role in strengthening the real estate sector of Dubai. Almost all property developers of Dubai have off plan projects scattered across the Emirates.
								</p>
								<p>
									When buying real estate in Dubai off Plan property is a highly successful option. We offer the most comprehensive and latest information about project developments and our off plan specialists give free property consultation services.
								</p>
								<p class="mt-20">
									<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#RegisterYourIntestForm">
										@lang('messages.register-your-interest')
									</button>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@if( count($projects) > 0 )
		<section class="ProjectListings--container is-gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="Section__title text-center">@lang('messages.latest-offplan-projects')</h3>
						@include('public.projects._listings', [
							'projects' => $projects
						])
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<p class="text-center">
							<a href="/projects" class="btn btn-default">@lang('messages.see-all-projects')</a>
						</p>
					</div>
				</div>
			</div>
		</section>
	@endif

	<section class="CommunityListings--container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">@lang('messages.explore-communities')</h2>
					<p class="lead text-center">
						
					</p>
				</div>
				<div class="col-md-12">
					<div class="CommunityListings">
						<div class="Row">
							<div class="CommunityListing Column-6 full-height downtown-dubai-community">
								<a href="{{ route('communities.show', 'downtown-dubai') }}"></a>
								<div class="CommunityListing__content">
									<p>Downtown Dubai</p>
								</div>
							</div>
							<div class="Flex-1">
								<div class="Row">
									<div class="CommunityListing Column-6 al-barsha-community">
										<a href="{{ route('communities.show', 'al-barsha') }}"></a>
										<div class="CommunityListing__content">
											<p>Al Barsha</p>
										</div>
									</div>
									<div class="CommunityListing Column-6 dubai-marina-community">
										<a href="{{ route('communities.show', 'dubai-marina') }}"></a>
										<div class="CommunityListing__content">
											<p>Dubai Marina</p>
										</div>
									</div>
								</div>
								<div class="Row">
									<div class="CommunityListing Column-6 jumeirah-lakes-towers-community">
										<a href="{{ route('communities.show', 'jumeirah-lakes-towers') }}"></a>
										<div class="CommunityListing__content">
											<p>Jumeirah Lakes Towers</p>
										</div>
									</div>
									<div class="CommunityListing Column-6 sheikh-zayed-road-community">
										<a href="{{ route('communities.show', 'sheikh-zayed-road') }}"></a>
										<div class="CommunityListing__content">
											<p>Sheikh Zayed Road</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="Row">
							<div class="CommunityListing Column-6 business-bay-community">
								<a href="{{ route('communities.show', 'business-bay') }}"></a>
								<div class="CommunityListing__content">
									<p>Business Bay</p>
								</div>
							</div>
							<div class="CommunityListing Column-6 palm-jumeirah-community">
								<a href="{{ route('communities.show', 'palm-jumeirah') }}"></a>
								<div class="CommunityListing__content">
									<p>Palm Jumeirah</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('footer_scripts')
	{{-- <script src="/js/SearchProjects.js"></script> --}}
	<script src="{{ elixir('js/home-video.js') }}"></script>
@endsection