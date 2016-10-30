<div class="modal fade" id="UploadProjectPhotosModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Photos</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row ProjectPhotos">
							@forelse( $project->photos as $photo )
								<?php 
									$path = getPhotoPath($photo->photo);
								?>
								<div class="col-md-3 ProjectPhoto">
									<img src="{{ $path }}" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
									<form method="POST" action="{{ route('dashboard.developers.projects.photos.destroy', [$developer->id, $project->id, $photo->id]) }}">
										{{ csrf_field() }}
										{!! method_field('DELETE') !!}
										<button type="submit" class="btn btn-sm btn-danger">
											<i class="fa fa-remove"></i>
										</button>
									</form>
								</div>
							@empty
							@endforelse
						</div>
					</div>
				</div>
				<p>&nbsp;</p>
				<form 
					method="POST" 
					class="dropzone is-centered-xy"
					id="UploadProjectPhotos"
					action="{{ route('dashboard.developers.projects.photos.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
				<ul class="list-group">
					<li class="list-group-item">
						<strong>Recommended dimensions:</strong> 1366px &times; 769px
					</li>
					<li class="list-group-item">
						<strong>Upload Format:</strong> Images (.jpg, .png) only
					</li>
					<li class="list-group-item">
						<strong>Maximum file size:</strong> 200kb / upload
					</li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>