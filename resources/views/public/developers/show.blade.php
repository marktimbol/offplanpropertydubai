@extends('layouts.app')

@section('pageTitle', $developer->name)

@section('content')
	<div class="container Developer">
		<div class="row">
			<div class="col-md-12">
				<h1 class="Developer__title">{{ $developer->name }}</h1>
				<div class="Flex">
					<div class="Developer__image Column-4">
						<?php
							$path = '/images/developers/developer.jpg';
							if( getPhotoPath($developer->photo) != '' ) {
								$path = getPhotoPath($developer->photo);
							}
						?>
						
						<img src="{{ $path }}" 
							alt="{{ $developer->name }}" 
							title="{{ $developer->name }}" 
							class="img-responsive" />

						<div class="Developer__info">
							<p>
								<a href="{{ $developer->website }}" class="btn btn-lg btn-block btn-default" target="_blank">
									Visit Website <i class="fa fa-external-link"></i>
								</a>
							</p>
						</div>
					</div>
					<div class="Developer__description Column-8">
						{!! $developer->profile !!}
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
				<div class="ProjectListings">
					<div class="row">
						@foreach( $developer->projects as $project )
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
	</section>
@endsection