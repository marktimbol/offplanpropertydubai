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
									<th>Brochure Link</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@if( count($project->brochure) > 0 )
									<tr>
										<td>
											<a href="{{ $project->brochure->file }}" target="_blank">
												{{ $project->brochure->file }}
											</a>
										</td>
										<td>
											<form method="POST" 
												action="{{ route('dashboard.developers.projects.brochures.destroy', [
													$developer->id, $project->id, $project->brochure->id
												]) }}"
											>
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
										<td colspan="2">No brochure yet.</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
				<form method="POST" 
					action="{{ route('dashboard.developers.projects.brochures.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
					<div class="input-group">
						{{-- <label for="file">File Path</label> --}}
						<input type="text" name="file" id="file" class="form-control" placeholder="Path of the brochure" />

						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Save</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>