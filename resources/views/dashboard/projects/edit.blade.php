@extends('layouts.dashboard')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/editor.css') }}" />
@endsection

@section('content')
	<h1>Edit Project</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.update', [$developer->id, $project->id]) }}">
		{{ csrf_field() }}
		{!! method_field('PUT') !!}
		<div class="form-group">
			<label for="name">Project Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}" />
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="editor" class="form-control">
				{{ $project->description }}
			</textarea>
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