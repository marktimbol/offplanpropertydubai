<div class="modal fade" id="UploadProjectVideosModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Videos</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Cover</th>
									<th>Link</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@forelse( $project->videos as $video )
									<tr>
										<td>{{ $video->cover }}</td>
										<td>{{ $video->link }}</td>
										<td>
											<form method="POST" action="{{ route('dashboard.developers.projects.videos.destroy', [$developer->id, $project->id, $video->id]) }}">
												{{ csrf_field() }}
												{!! method_field('DELETE') !!}
												<button type="submit" class="btn btn-sm btn-link">
													<i class="fa fa-remove"></i>
												</button>
											</form>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="3">No video yet.</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<h3>Add Video</h3>
				<form 
					method="POST" 
					action="{{ route('dashboard.developers.projects.videos.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}

					<div class="form-group">
						<label for="cover">Video Cover</label>
						<input type="text" 
							name="cover" 
							id="cover" 
							class="form-control" 
							value="{{ old('cover') }}"
							placeholder="Image path. Should be .jpg format" />
					</div>

					<div class="form-group">
						<label for="link">Video Link</label>
						<input type="text" 
							name="link" 
							id="link" 
							class="form-control" 
							value="{{ old('link') }}"
							placeholder="Video path. Should be mp4 format." />
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Save Video</button>
					</div>
				</form>

				<p>&nbsp;</p>
				<div class="alert alert-info">
					<ul>
						<li>Video Cover recommended dimensions: 1366px &times; 769px</li>
						<li>Video Cover recommended file size: 200kb</li>
						<li>Video Link: .mp4 only</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>