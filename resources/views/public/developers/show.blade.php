@extends('layouts.app')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('pageTitle', $developer->name)

@section('content')
	<div class="container Developer">
		<div class="row">
			<div class="col-md-12">
				<h1 class="Developer__title">{{ $developer->name }}</h1>
				<div class="Flex">
					<div class="Developer__image Column-4">
						<img src="/images/developers/developer.jpg" 
							alt="{{ $developer->name }}" 
							title="{{ $developer->name }}" 
							class="img-responsive" />
						<div class="Developer__info">
							<p><strong>CEO / Chairman:</strong> HE Saeed Humaid Al Tayer / Mr PNC Menon</p>
							<p><strong>Established:</strong> 1976</p>
							<p>&nbsp;</p>
							<p>
								<a href="#" class="btn btn-lg btn-block btn-default" target="_blank">Visit Website</a>
							</p>
						</div>
					</div>
					<div class="Developer__description Column-8">
						@foreach( range(1, 7) as $index )
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-3">

			</div>
		</div>
	</div>

	<section class="RelatedProjects is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-30 text-center">Projects of {{ $developer->name }}</h3>
				</div>
			</div>
			<div class="row">
				@foreach( $developer->projects as $project )
					<div class="col-md-4">
						<div class="Project">
							<div class="Project__image">
								<img src="/images/projects/project.jpg" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
							</div>
							<div class="Project__content Flex Flex--space-between">
								<h4 class="Project__title">
									<a href="{{ route('projects.show', $project->slug) }}">
										{{ $project->name }}
									</a>
									<small>by <a href="#">{{ $project->developer->name }}</a></small>
								</h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection