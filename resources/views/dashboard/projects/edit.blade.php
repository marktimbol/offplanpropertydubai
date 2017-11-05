@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/editor.css') }}" />
@endsection

@section('content')
	<h1>Edit Project: 
		<a href="{{ route('dashboard.developers.projects.show', [$developer->id, $project->id]) }}">
			{{ $project->name }}
		</a>
	</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.update', [$developer->id, $project->id]) }}">
		{{ csrf_field() }}
		{!! method_field('PUT') !!}

		<div class="row">
			<div class="col-md-6">
				<h3>Project Details</h3>

				<div class="form-group">
					<label class="control-label">Developer</label>
					<input type="text" class="form-control" value="{{ $developer->name }}"  disabled />
				</div>

				<div class="form-group {{ $errors->has('en.name') ? 'has-error' : '' }}">
					<label for="name" class="control-label">Project Name*</label>
					<input type="text" name="en[name]" id="name" class="form-control" value="{{ $project->name }}" />
					@if( $errors->has('en.name') )
						<span class="help-block">
							{{ $errors->first('en.name') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('en.title') ? 'has-error' : '' }}">
					<label for="title" class="control-label">Marketing Title*</label>
					<input type="text" name="en[title]" id="title" class="form-control" value="{{ $project->title }}" />
					@if( $errors->has('en.title') )
						<span class="help-block">
							{{ $errors->first('en.title') }}
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="price" class="control-label">Price</label>
					<input type="text" name="en[price]" id="price" class="form-control" value="{{ $project->price }}" />
				</div>
				<div class="form-group">
					<label for="expected_completion_date" class="control-label">Expected Completion Date</label>
					<input type="text" name="en[expected_completion_date]" id="expected_completion_date" class="form-control" value="{{ $project->expected_completion_date }}" />
				</div>

				<h3>Google Map</h3>
				<div class="form-group">
					<label for="latitude" class="control-label">Latitude</label>
					<input type="text" 
						name="latitude" 
						id="latitude" 
						class="form-control" 
						value="{{ $project->latitude }}" />
				</div>
				<div class="form-group">
					<label for="longitude" class="control-label">Longitude</label>
					<input type="text" 
						name="longitude" 
						id="longitude" 
						class="form-control" 
						value="{{ $project->longitude }}" />
				</div>

				<h3>External Links</h3>	
				<div class="form-group">
					<label for="dld_project_completion_link" class="control-label">DLD Project Completion %</label>
					<input type="text" 
						name="dld_project_completion_link" 
						id="dld_project_completion_link" 
						class="form-control" 
						value="{{ $project->dld_project_completion_link }}" />
				</div>
				<div class="form-group">
					<label for="project_escrow_account_details_link" class="control-label">Escrow Account Details Link</label>
					<input type="text" 
						name="project_escrow_account_details_link" 
						id="project_escrow_account_details_link" 
						class="form-control" 
						value="{{ $project->project_escrow_account_details_link }}" />
				</div>

				<div class="form-group">
					<label class="control-label">Show Availability</label>
					<input type="text" name="show_availability" class="form-control" value="{{ $project->show_availability }}" />
				</div>	

				<h3>Project Description</h3>

				<div class="form-group">
					<label for="description">&nbsp;</label>
					<textarea name="en[description]" id="editor" class="form-control">
						{{ $project->description }}
					</textarea>
				</div>			
			</div>

			<div class="col-md-6 rtl">
				<h3>Project Details</h3>

				<div class="form-group">
					<label class="control-label">Developer</label>
					<input type="text" class="form-control" value="{{ $developer->name }}"  disabled />
				</div>

				<div class="form-group {{ $errors->has('ar.name') ? 'has-error' : '' }}">
					<label for="name" class="control-label">Project Name*</label>
					<input type="text" 
						name="ar[name]" 
						id="name" 
						class="form-control" 
						value="{{ $project->hasTranslation('ar') ? $project->translate('ar')->name : '' }}" />
					@if( $errors->has('ar.name') )
						<span class="help-block">
							{{ $errors->first('ar.name') }}
						</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('ar.title') ? 'has-error' : '' }}">
					<label for="title" class="control-label">Marketing Title*</label>
					<input type="text" name="ar[title]" id="title" class="form-control" value="{{ $project->hasTranslation('ar') ? $project->translate('ar')->title : '' }}" />
					@if( $errors->has('ar.title') )
						<span class="help-block">
							{{ $errors->first('ar.title') }}
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="price" class="control-label">Price</label>
					<input type="text" name="ar[price]" id="price" class="form-control" value="{{ $project->hasTranslation('ar') ? $project->translate('ar')->price : old('ar.price') }}" />
				</div>
				<div class="form-group">
					<label for="expected_completion_date" class="control-label">Expected Completion Date</label>
					<input type="text" name="ar[expected_completion_date]" id="expected_completion_date" class="form-control" value="{{ $project->hasTranslation('ar') ? $project->translate('ar')->expected_completion_date : '' }}" />
				</div>

				<h3>Project Description</h3>

				<div class="form-group">
					<label for="description">&nbsp;</label>
					<textarea name="ar[description]" id="editor_ar" class="form-control">
						{{ $project->hasTranslation('ar') ? $project->translate('ar')->description : '' }}
					</textarea>
				</div>
			</div>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-primary">
				<i class="fa fa-save"></i> Update
			</button>
		</div>
	</form>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/editor.js') }}"></script>
@endsection