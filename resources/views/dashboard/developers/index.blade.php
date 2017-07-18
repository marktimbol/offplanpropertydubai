@extends('layouts.dashboard')

@section('content')
	<h1>Developers
		<a href="{{ route('dashboard.developers.create') }}" class="btn btn-sm btn-primary">Add New</a>
	</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Developer Name</th>
				<th>Projects</th>
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
					<td>
						<ul class="list-group">
							@forelse( $developer->projects as $project )
								<li class="list-group-item">{{ $project->name }}</li>
							@empty
							@endforelse
						</ul>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="2">No record yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	@endsection