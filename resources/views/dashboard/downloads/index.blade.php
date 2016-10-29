@extends('layouts.dashboard')

@section('content')
	<h1>Downloads</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>eMail</th>
			<th>Phone</th>
			<th>Project</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $downloads as $download )
			<tr>
				<td>{{ $inquiry->name }}</td>
				<td>{{ $inquiry->email }}</td>
				<td>{{ $inquiry->phone }}</td>
				<td>{{ $inquiry->project }}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection