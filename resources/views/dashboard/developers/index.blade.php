@extends('layouts.dashboard')

@section('content')
	<h1>Developers
		<a href="{{ route('dashboard.developers.create') }}" class="btn btn-sm btn-primary">Add New</a>
	</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
<<<<<<< HEAD
				<th>Country</th>				
				<th>Name</th>
				<th>Projects</th>
				<th>&nbsp;</th>
=======
				<th>Developer Name</th>
				<th>Country</th>				
				<th>Projects</th>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			</tr>
		</thead>
		<tbody>
			@forelse($developers as $developer)
				<tr>
<<<<<<< HEAD
					<td width="200">{{ $developer->country->name }}</td>
=======
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
					<td>
						<a href="{{ route('dashboard.developers.show', $developer->id) }}">
							{{ $developer->name }}
						</a>
					</td>
<<<<<<< HEAD
					<td>&nbsp;</td>
					<td>&nbsp;</td>
=======
					<td width="200">{{ $developer->country->name }}</td>
					<td>
						<ul class="list-group">
							@forelse( $developer->projects as $project )
								<li class="list-group-item">{{ $project->name }}</li>
							@empty
							@endforelse
						</ul>
					</td>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
				</tr>
			@empty
				<tr>
					<td colspan="2">No record yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	@endsection