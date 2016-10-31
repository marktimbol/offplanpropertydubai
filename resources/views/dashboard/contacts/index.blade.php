@extends('layouts.dashboard')

@section('content')
	<h1>Contact Messages</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Message</th>
		</thead>
		<tbody>
			@forelse( $contacts as $contact )
			<tr>
				<td>{{ $contact->name }}</td>
				<td>{{ $contact->email }}</td>
				<td>{{ $contact->phone }}</td>
				<td>{{ $contact->message }}</td>
			</tr>
			@empty
				<tr>
					<td colspan="4">No contact message yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection