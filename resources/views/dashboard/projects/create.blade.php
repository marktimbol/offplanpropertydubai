@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/editor.css') }}" />
@endsection

@section('content')
	<h1>Add Project to {{ $developer->name }}</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.store', $developer->id) }}">
		{{ csrf_field() }}

		<h3>Project Details</h3>

		<div class="form-group">
			<label class="control-label">Developer</label>
			<input type="text" class="form-control" value="{{ $developer->name }}"  disabled />
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name" class="control-label">Project Name*</label>
					<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
					@if( $errors->has('name') )
						<span class="help-block">
							{{ $errors->first('name') }}
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
					<label for="title" class="control-label">Marketing Title*</label>
					<input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" />
					@if( $errors->has('title') )
						<span class="help-block">
							{{ $errors->first('title') }}
						</span>
					@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="expected_completion_date" class="control-label">Expected Completion Date</label>
					<input type="text" name="expected_completion_date" id="expected_completion_date" class="form-control" value="{{ old('expected_completion_date') }}" />
				</div>
			</div>
		</div>

		<h3>Project Type</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="project_type">Types</label>
					<select class="form-control">
						<option value=""></option>
						<option value="residential">Residential</option>
						<option value="commercial">Commercial</option>
						<option value="mixed-use">Mixed Use</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="types">Sub Categories</label>
					<input type="text" id="types" class="form-control" />
				</div>
			</div>
		</div>

		<h3>Location</h3>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
					<label for="country" class="control-label">Country*</label>
					<input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" />
					@if( $errors->has('country') )
						<span class="help-block">
							{{ $errors->first('country') }}
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
					<label for="city" class="control-label">City*</label>
					<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" />
					@if( $errors->has('city') )
						<span class="help-block">
							{{ $errors->first('city') }}
						</span>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group {{ $errors->has('community') ? 'has-error' : '' }}">
					<label for="community" class="control-label">Community*</label>
					<input type="text" name="community" id="community" class="form-control" value="{{ old('community') }}" />
					@if( $errors->has('community') )
						<span class="help-block">
							{{ $errors->first('community') }}
						</span>
					@endif
				</div>
			</div>
		</div>

		<h3>Google Map</h3>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="latitude" class="control-label">Latitude</label>
					<input type="text" 
						name="latitude" 
						id="latitude" 
						class="form-control" 
						value="{{ old('latitude') }}" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="longitude" class="control-label">Longitude</label>
					<input type="text" 
						name="longitude" 
						id="longitude" 
						class="form-control" 
						value="{{ old('longitude') }}" />
				</div>
			</div>
		</div>

		<h3>External Links</h3>
		
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="dld_project_completion_link" class="control-label">DLD Project Completion %</label>
					<input type="text" 
						name="dld_project_completion_link" 
						id="dld_project_completion_link" 
						class="form-control" 
						value="{{ old('dld_project_completion_link') }}" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="project_escrow_account_details_link" class="control-label">Escrow Account Details Link</label>
					<input type="text" 
						name="project_escrow_account_details_link" 
						id="project_escrow_account_details_link" 
						class="form-control" 
						value="{{ old('project_escrow_account_details_link') }}" />
				</div>
			</div>
		</div>

		<h3>Project Description</h3>

		<div class="form-group">
			<label for="description">&nbsp;</label>
			<textarea name="description" id="editor" class="form-control">
				{{ old('description') }}
			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-primary">
				<i class="fa fa-save"></i> Save
			</button>
		</div>
	</form>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/editor.js') }}"></script>
@endsection