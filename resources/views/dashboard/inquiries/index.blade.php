@extends('layouts.dashboard')

@section('content')
	<h1>Inquiries</h1>

	<table class="table table-bordered table-striped">
		<thead>
<<<<<<< HEAD
			<th>Type</th>
=======
			<th>I Am</th>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Country</th>
<<<<<<< HEAD
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $inquiries as $inquiry )
=======
			<th>Project</th>
		</thead>
		<tbody>
			@forelse( $inquiries as $inquiry )
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
			<tr>
				<td>{{ $inquiry->iam }}</td>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->country }}</td>
<<<<<<< HEAD
				<td></td>
			</tr>
			@endforeach
=======
				<td>{{ $inquiry->project }}</td>
			</tr>
			@empty
				<tr>
					<td colspan="6">No inquiries yet.</td>
				</tr>
			@endforelse
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
		</tbody>
	</table>
@endsection