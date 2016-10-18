@extends('layouts.dashboard')

@section('content')
	<h1>{{ $project->name }}</h1>

	<p>{{ $project->description }}</p>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
	
	<form method="POST" action="{{ route('dashboard.developers.projects.destroy', [$developer->id, $project->id]) }}">
		{{ csrf_field() }}
		{!! method_field('DELETE') !!}
		<div class="form-group">
			<button type="submit" class="btn btn-danger">
				<i class="fa fa-remove"></i> Delete Project
			</button>
		</div>
	</form>
@endsection