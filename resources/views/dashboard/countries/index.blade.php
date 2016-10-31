@extends('layouts.dashboard')

@section('content')
	<h1>Countries</h1>

<<<<<<< HEAD
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
=======
	<div class="row">
		<div class="col-md-4">
			@include('dashboard.countries._create')
		</div>
		<div class="col-md-8">
			<h3>Lists</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $countries as $country )
					<tr>
						<td>{{ $country->name }}</td>
						<td>
							<form method="POST" action="{{ route('dashboard.countries.destroy', $country->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<a href="{{ route('dashboard.countries.cities.index', $country->id) }}" 
									class="btn btn-sm btn-default"
								>
									Manage Cities
								</a>
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="2">No country yet.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
@endsection