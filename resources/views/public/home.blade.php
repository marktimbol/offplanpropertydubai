@extends('layouts.app')

@section('pageTitle', 'Home')

@section('bodyClass', 'Home')

@section('content')

    <header>

    </header>

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

	<section class="About">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="Row">
						<div class="Column-6">
							<div class="padding-10">
								<img src="/images/real-estate-agent-and-customer.jpg" alt="" title="" class="img-responsive" />
							</div>
						</div>
						<div class="Column-6">
							<div class="padding-10">
								<h3 class="Section__title">About Dubai Off Plan Projects</h3>
								<p>
									When buying real estate in Dubai off Plan property is a highly successful option. We offer the most comprehensive and latest information about project developments and our off plan specialists give free property consultation services.
								</p>
								<p>&nbsp;</p>
								<p>
									<button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#RegisterYourIntestForm">
										Register your interest
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
						<h3 class="Section__title text-center">Latest Off Plan Projects</h3>
						@include('public.projects._listings', [
							'projects' => $projects
						])
					</div>
				</div>
			</div>
		</section>
	@endif

	<section class="CommunityListings--container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">Explore Communities</h2>
					<p class="lead text-center">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit.
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