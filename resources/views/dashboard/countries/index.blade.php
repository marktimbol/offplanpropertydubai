@extends('layouts.dashboard')

@section('content')
	<h1>Countries</h1>

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
									class="btn btn-sm btn-success"
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
@endsection