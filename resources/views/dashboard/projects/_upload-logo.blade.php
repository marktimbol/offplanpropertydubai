<div class="modal fade" id="ChangeProjectLogo" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>{{ $project->name }} Logo</h4>
			</div>
			<div class="modal-body">
				<form 
					method="POST" 
					class="dropzone is-centered-xy"
					id="UploadProjectLogo"
					action="{{ route('dashboard.developers.projects.logos.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
				<p>
					Image / PDF only<br />
					Maximum file size: 2mb
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>