@extends('layouts.dashboard')

@section('content')
	<h1>Inquiries</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>I Am</th>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Country</th>
			<th>Project</th>
			<th></th>
		</thead>
		<tbody>
			@forelse( $inquiries as $inquiry )
			<tr>
				<td>{{ $inquiry->iam }}</td>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->country }}</td>
				<td>{{ $inquiry->project }}</td>
				<td>{{ $inquiry->created_at->diffForHumans() }}</td>
			</tr>
			@empty
				<tr>
					<td colspan="6">No inquiries yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection