@extends('layouts.home')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('bodyClass', 'Home')

@section('content')
	<div class="Slide Flex Flex--center">
		<div class="Slide__content">
			<h2 class="Slide__title">Invest in the Future</h2>
			<form method="GET" class="Search">
				<input type="text" 
					name="search" 
					id="search" 
					class="form-control input-lg Search__input" 
					placeholder="Search for a project name" />
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

	<section class="LatestProjects">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="Section__title text-center">Latest Off Plan Projects</h3>
					<div class="row Projects">
						@foreach( $projects as $project )
							<div class="col-md-4">
								<div class="Project">
									<div class="Project__image">
										<img src="/images/projects/project.jpg" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
									</div>
									<div class="Project__content Flex Flex--space-between">
										<h4 class="Project__title">
											<a href="{{ route('developers.projects.show', [$project->developer->slug, $project->slug]) }}">
												{{ ucfirst($project->name) }}
											</a>
										</h4>
										<a href="#" class="btn btn-link btn-download">
											<i class="fa fa-download"></i> Brochure
										</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">
						<p class="text-center">
							<a href="/projects" class="btn btn-link">All Projects</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="Developers">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="Section__title text-center">Off Plan Developers</h3>
					<div class="Developers Carousel">
						@foreach( $developers as $developer )
						<div class="Developer">
							<div class="Developer__image">
								<a href="#">
									<img src="/images/developers/developer.jpg" alt="{{ $developer->name }}" title="{{ $developer->Name }}" class="img-responsive" />
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection