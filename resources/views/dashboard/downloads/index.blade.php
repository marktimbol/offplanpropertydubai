@extends('layouts.dashboard')

@section('content')
	<h1>Downloads</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Project</th>
<<<<<<< HEAD
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $downloads as $download )
=======
		</thead>
		<tbody>
			@forelse( $downloads as $download )
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			<tr>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->project }}</td>
<<<<<<< HEAD
				<td></td>
			</tr>
			@endforeach
=======
			</tr>
			@empty
				<tr>
					<td colspan="4">No downloads yet.</td>
				</tr>
			@endforelse
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
		</tbody>
	</table>
@endsection