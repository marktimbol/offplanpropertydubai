@extends('layouts.dashboard')

@section('content')
	<h1>Developers
		<a href="{{ route('dashboard.developers.create') }}" class="btn btn-default">Add New</a>
	</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@forelse($developers as $developer)
				<tr>
					<td>
						<a href="{{ route('dashboard.developers.show', $developer->id) }}">
							{{ $developer->name }}
						</a>
					</td>
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