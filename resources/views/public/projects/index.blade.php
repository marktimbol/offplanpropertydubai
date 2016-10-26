@extends('layouts.app')

@section('pageTitle', 'Dubai Off Plan Projects')

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						Dubai Off Plan Projects
					</h1>
					<p class="lead">
						When it comes to finding out about off-plan, just launched or under-construction real estate projects in Dubai, our ‘new projects section’ is just what you need. Home to Dubai’s comprehensive list of real estate projects every project listing provides in-depth details starting from artistic, live images and video gallery, fact sheet, location map, frequently asked questions (FAQs), and more on sub communities within the projects, their features and nearby places. Our aim to provide as much information as possible to help you understand thoroughly as you progress with your home buying and investments. 
					</p>
				</div>
			</div>
		</div>

		<div class="ProjectListings">
			<div class="container">
				<div class="row">
					@foreach( $projects as $project )
						<?php
							$avatar = '/images/avatar.jpg';
							if( $project->developer->photo !== '' )
							{
								$avatar = getPhotoPath($project->developer->photo);
							}
						?>
						<div class="ProjectListing col-md-4">
							<div class="ProjectListing__image">
								<div class="ProjectListing_compare">
									<form method="POST" action="{{ route('compares.store') }}">
										{{ csrf_field() }}
										<input type="hidden" name="project_id" value="{{ $project->id }}" />
										<button type="submit" class="btn btn-link">
											<i class="fa fa-heart fa-2x"></i>
										</button>
									</form>
								</div>
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
@endsection