@extends('layouts.dashboard')

@section('content')
	<h1>Cities</h1>

	<h3>Add City</h3>
	<div class="well">
		<form method="POST" action="{{ route('dashboard.countries.cities.store', $country->id) }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Country Name</label>
				<input type="text" class="form-control" value="{{ $country->name }}" disabled />
			</div>
			<div class="form-group">
				<label for="name">City Name</label>
				<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>

	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@forelse( $cities as $city )
			<tr>
				<td>{{ $city->name }}</td>
				<td>
					<form method="POST" action="{{ route('dashboard.countries.cities.destroy', [$country->id, $city->id]) }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<a href="{{ route('dashboard.cities.communities.index', $city->id) }}" 
							class="btn btn-default"
						>
							Manage Communities
						</a>
						<button type="submit" class="btn btn-danger">Delete</button>
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
@endsection