<div class="modal fade" id="UploadProjectFloorPlanModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Floor Plans</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Title</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach( $project->floorplans as $floorplan )
									<?php 
										$path = getPhotoPath($floorplan->photo);
									?>
									<tr>
										<td>
											<a href="{{ $path }}" target="_blank">
												{{ $floorplan->title }}
											</a>
										</td>
										<td>
											<form method="POST" action="{{ route('dashboard.developers.projects.floorplans.destroy', [
												$developer->id, $project->id, $floorplan->id
											]) }}">
												{{ csrf_field() }}
												{!! method_field('DELETE') !!}
												<a href="#" class="btn btn-link">
													<i class="fa fa-pencil"></i>
												</a>
												<button type="submit" class="btn btn-sm btn-link">
													<i class="fa fa-remove"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<form 
					method="POST" 
					class="dropzone is-centered-xy"
					id="UploadProjectFloorplans"
					action="{{ route('dashboard.developers.projects.floorplans.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
				<div class="alert alert-info">
					<ul>
						<li>Recommended dimensions: 1366px &times; 769px</li>
						<li>Upload Format: Images (.jpg, .png) only</li>
						<li>Maximum file size: 200kb / upload</li>
						<li>For now, the "Title" will be the filename of the image you will upload.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>