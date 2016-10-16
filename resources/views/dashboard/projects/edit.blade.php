@extends('layouts.dashboard')

@section('content')
	<h1>Edit Project</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.update', [$developer->slug, $project->slug]) }}">
		{{ csrf_field() }}
		{!! method_field('PUT') !!}
		<div class="form-group">
			<label for="name">Project Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') or $project->name }}" />
		</div>

		<div class="form-group">
			<label for="descriptio">Description</label>
			<textarea name="description" id="description" class="form-control">
				{{ old('description') or $project->description }}
			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</form>
@endsection