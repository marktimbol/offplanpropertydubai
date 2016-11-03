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
				<td>{{ $download->name }}</td>
				<td>{{ $download->email }}</td>
				<td>{{ $download->phone }}</td>
				<td>{{ $download->project }}</td>
			</tr>
			@empty
				<tr>
					<td colspan="4">No downloads yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection