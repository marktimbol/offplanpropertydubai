<div class="row ProjectListings">
	@foreach( $projects->chunk(3) as $chunks )
		<div class="row">
			@foreach( $chunks as $project )
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
						<a href="{{ route('developers.projects.show', [$project->developer->slug, $project->slug]) }}">
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
									class="img-bordered img-responsive" />
							</a>
						</div>
					</div>
					<div class="ProjectListing__description">
						<h4 class="text-truncate">
							<a href="{{ route('developers.projects.show', [$project->developer->slug, $project->slug]) }}">
								{{ sprintf('%s: %s', $project->name, $project->title) }}
							</a>
						</h4>
					</div>
				</div>
			@endforeach
		</div>
	@endforeach
</div>