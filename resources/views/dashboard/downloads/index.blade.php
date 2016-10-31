@extends('layouts.dashboard')

@section('content')
	<h1>Downloads</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Project</th>
		</thead>
		<tbody>
			@forelse( $downloads as $download )
			<tr>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->project }}</td>
			</tr>
			@empty
				<tr>
					<td colspan="4">No downloads yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection