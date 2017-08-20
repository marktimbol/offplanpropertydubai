@extends('layouts.app')

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						@lang('nav.projects')
					</h1>
					<p class="lead">
						When it comes to finding out about off-plan, just launched or under-construction real estate projects in Dubai, our ‘new projects section’ is just what you need. Home to Dubai’s comprehensive list of real estate projects every project listing provides in-depth details starting from artistic, live images and video gallery, fact sheet, location map, frequently asked questions (FAQs), and more on sub communities within the projects, their features and nearby places. Our aim to provide as much information as possible to help you understand thoroughly as you progress with your home buying and investments. 
					</p>
				</div>
			</div>

			@include('public.projects._listings', [
				'projects' => $projects
			])

			<div class="pagination-container">
				{{ $projects->render() }}
			</div>			
		</div>
	</div>
@endsection