<div class="modal fade" id="DownloadBrochureForm" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4>Download {{ $project->name }} Brochure</h4>
			</div>
			<form method="POST" action="{{ route('projects.brochures.store', $project->slug) }}">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Name *</label>
						<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required/>
						@if( $errors->has('name') )
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label for="email">eMail *</label>
						<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required />
						@if( $errors->has('email') )
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
						<label for="phone">Phone *</label>
						<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required />
						@if( $errors->has('phone') )
							<span class="help-block">
								<strong>{{ $errors->first('phone') }}</strong>
							</span>
						@endif
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">
						Submit Form
					</button>
				</div>
			</form>
		</div>
	</div>
</div>