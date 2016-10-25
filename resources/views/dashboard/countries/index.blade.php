@extends('layouts.dashboard')

@section('content')
	<h1>Countries</h1>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $countries as $country )
			<tr>
				<td>{{ $country->name }}</td>
				<td><a href="#" class="btn btn-default">Manage Cities</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection