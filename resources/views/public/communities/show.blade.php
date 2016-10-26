@extends('layouts.app')

@section('pageTitle', sprintf('%s Community', $community->name))

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{{ sprintf('%s Community', $community->name) }}</h1>
				<p class="lead">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
				</p>
			</div>
			<div class="col-md-12">
				<div class="ProjectListings">
					<div class="row">
						@foreach( $community->projects as $project )
							<?php
								$avatar = '/images/avatar.jpg';
								if( $project->developer->photo !== '' )
								{
									$avatar = getPhotoPath($project->developer->photo);
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
	</div>
@endsection