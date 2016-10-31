@extends('layouts.dashboard')

@section('content')
	<h1>{{ $country->name }} Cities</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.cities._create')
		</div>
		<div class="col-md-8">
			<h3>Lists</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $cities as $city )
					<tr>
						<td width="200">{{ $city->name }}</td>
						<td>
							<form method="POST" action="{{ route('dashboard.countries.cities.destroy', [$country->id, $city->id]) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<a href="{{ route('dashboard.cities.communities.index', $city->id) }}" 
									class="btn btn-sm btn-default"
								>
									Manage Communities
								</a>
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="2">No cities yet.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection