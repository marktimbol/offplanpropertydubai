<div class="modal fade" id="UploadProjectBrochureModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Brochure</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Brochure Download Link</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@if( count($project->brochure) > 0 )
									<?php
										$file  = getPhotoPath($project->brochure->photo);
									?>
									<tr>
										<td>
											<a href="{{ $file }}" target="_blank">
												{{ $file }}
											</a>
										</td>
										<td>
											<form method="POST" action="#">
												{{ csrf_field() }}
												{!! method_field('DELETE') !!}
												<button type="submit" class="btn btn-sm btn-link">
													<i class="fa fa-remove"></i>
												</button>
											</form>
										</td>
									</tr>
								@else
									<tr>
										<td colspan="2">No uploaded brochure yet.</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
				<form 
					method="POST" 
					class="dropzone is-centered-xy"
					id="UploadProjectBrochure"
					action="{{ route('dashboard.developers.projects.brochures.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
				<p>
					Image / PDF only<br />
					Maximum file size: 5mb
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>