@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/editor.css') }}" />
@endsection

@section('content')
	<h1>Add Project</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.store', $developer->id) }}">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="control-label">Project Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
			@if( $errors->has('name') )
				<span class="help-block">
					{{ $errors->first('name') }}
				</span>
			@endif
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="editor" class="form-control">
				{{ old('description') }}
			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-save"></i> Save
			</button>
		</div>
	</form>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/editor.js') }}"></script>
@endsection