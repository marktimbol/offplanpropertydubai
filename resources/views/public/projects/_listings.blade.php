<div class="row ProjectListings">
	@foreach( $projects as $project )
		<?php 
			$avatar = '/images/avatar.jpg';
			if( $project->developer->photo != '' ) {
				$avatar = getPhotoPath($project->developer->photo);
			}
			$path = '/images/no-project-image.jpg';
			if( $projectPhoto = $project->photos->first() ) {								
				$path = getPhotoPath($projectPhoto->photo );
			}
		?>
			<div class="ProjectListing col-md-4">
				<div class="ProjectListing__image">
					<div class="ProjectListing_compare">
						<form method="POST" action="{{ route('compares.store') }}">
							{{ csrf_field() }}
							<input type="hidden" name="project_id" value="{{ $project->id }}" />
							<button type="submit" class="btn btn-link btn-heart">
								<i class="fa fa-heart fa-2x"></i>
							</button>
						</form>
					</div>
					<a href="{{ route('projects.show', $project->slug) }}">
						<img src="{{ $path }}" 
							alt="{{ $project->name }}" 
							title="{{ $project->name }}" 
							class="img-responsive" />
					</a>
					<div class="ProjectListing__developer">
						<a href="{{ route('developers.show', $project->developer->slug) }}">
							<img src="{{ $avatar }}" 
								alt="{{ $project->developer->name }}" 
								title="{{ $project->developer->name }}" 
								width="68" height="68"
								class="img-circle img-bordered" />
						</a>
					</div>
				</div>
				<div class="ProjectListing__description">
					<h4 class="text-truncate">
						<a href="{{ route('projects.show', $project->slug) }}">
							{{ sprintf('%s: %s', $project->name, $project->title) }}
						</a>
					</h4>
				</div>
			</div>
	@endforeach
</div>