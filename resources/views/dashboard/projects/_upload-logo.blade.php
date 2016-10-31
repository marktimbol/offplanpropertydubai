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
<<<<<<< HEAD
					class="dropzone is-centered-xy"
=======
					class="dropzone is-centered-xy Flex Flex--center"
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
					id="UploadProjectLogo"
					action="{{ route('dashboard.developers.projects.logos.store', [
					$developer->id, $project->id
					]) }}" 
				>
					{{ csrf_field() }}
				</form>

				<p>&nbsp;</p>
<<<<<<< HEAD
				<p>
					Image / PDF only<br />
					Maximum file size: 2mb
				</p>
=======
				<ul class="list-group">
					<li class="list-group-item">
						<strong>Recommended dimensions:</strong> 230px &times; 85px
					</li>
					<li class="list-group-item">
						<strong>Upload Format:</strong> Images (.jpg, .png) only
					</li>
					<li class="list-group-item">
						<strong>Maximum file size:</strong> 20kb
					</li>
				</ul>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>