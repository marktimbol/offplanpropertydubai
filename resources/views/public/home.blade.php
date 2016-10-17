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

	<section class="LatestProjects is-gray-bg">
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
											<a href="{{ route('projects.show', $project->slug) }}">
												{{ ucfirst($project->name) }}
											</a>
											<small>by <a href="{{ route('developers.show', $project->developer->slug) }}">{{ $project->developer->name }}</a></small>
										</h4>
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
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection