@extends('layouts.dashboard')

@section('content')
	<h1>{{ $project->name }}</h1>

	<p>{{ $project->description }}</p>

	<form method="POST" action="{{ route('dashboard.developers.projects.destroy', [$developer->slug, $project->slug]) }}">
		{{ csrf_field() }}
		{!! method_field('DELETE') !!}
		<div class="form-group">
			<button type="submit" class="btn btn-danger">Delete</button>
		</div>
	</form>
@endsection