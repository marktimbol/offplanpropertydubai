@extends('layouts.dashboard')

@section('content')
	<h1>Inquiries</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Type</th>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Country</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $inquiries as $inquiry )
			<tr>
				<td>{{ $inquiry->iam }}</td>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->country }}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection