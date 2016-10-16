@extends('layouts.dashboard')

@section('content')
	<h1>Add Project</h1>

	<form method="POST" action="{{ route('dashboard.developers.projects.store', $developer->id) }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Project Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
		</div>

		<div class="form-group">
			<label for="descriptio">Description</label>
			<textarea name="description" id="description" class="form-control">
				{{ old('description') }}
			</textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</form>
@endsection