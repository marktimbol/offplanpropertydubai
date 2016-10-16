@extends('layouts.dashboard')

@section('content')
	<h1>{{ $developer->name }} Projects</h1>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Project Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@forelse( $developer->projects as $project )
			<tr>
				<td>{{ $project->name }}</td>
				<td>&nbsp;</td>
			</tr>
			@empty
			<tr>
				<td colspan="2">No record yet.</td>
			</tr>
			@endforelse
		</tbody>
	</table>

	<form method="POST" action="{{ route('dashboard.developers.destroy', $developer->id) }}">
		{{ csrf_field() }}
		{!! method_field('DELETE') !!}
		<div class="form-group">
			<button type="submit" class="btn btn-danger">Delete</button>
		</div>
	</form>
@endsection