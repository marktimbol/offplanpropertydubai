@extends('layouts.dashboard')

@section('content')
	<h1>Developers
		<a href="{{ route('dashboard.developers.create') }}" class="btn btn-sm btn-primary">Add New</a>
	</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Country</th>
				<th>Name</th>
				<th>Projects</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@forelse($developers as $developer)
				<tr>
					<td width="200">{{ $developer->country->name }}</td>
					<td>
						<a href="{{ route('dashboard.developers.show', $developer->id) }}">
							{{ $developer->name }}
						</a>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			@empty
				<tr>
					<td colspan="2">No record yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	@endsection