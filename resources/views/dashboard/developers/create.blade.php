@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/editor.css') }}" />
@endsection

@section('content')
	<h1>Add Developer</h1>

	<form method="POST" action="{{ route('dashboard.developers.store') }}">
		{{ csrf_field() }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="control-label">Developer Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
			@if( $errors->has('name') )
				<span class="help-block">
					{{ $errors->first('name') }}
				</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
			<label for="website" class="control-label">Website URI</label>
			<input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}" />
			@if( $errors->has('website') )
				<span class="help-block">
					{{ $errors->first('website') }}
				</span>
			@endif
		</div>

		<div class="form-group">
			<label for="profile" class="control-label">Profile</label>
			<textarea name="profile" id="editor" class="form-control">
				{{ old('profile') }}
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