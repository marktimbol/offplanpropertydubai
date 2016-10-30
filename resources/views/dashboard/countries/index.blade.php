@extends('layouts.dashboard')

@section('content')
	<h1>Countries</h1>

	<h3>Add Country</h3>
	<div class="well">
		<form method="POST" action="{{ route('dashboard.countries.store') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Country Name</label>
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
			@forelse( $countries as $country )
			<tr>
				<td>{{ $country->name }}</td>
				<td>
					<form method="POST" action="{{ route('dashboard.countries.destroy', $country->id) }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<a href="{{ route('dashboard.countries.cities.index', $country->id) }}" 
							class="btn btn-default"
						>
							Manage Cities
						</a>
						<button type="submit" class="btn btn-danger">Delete</button>
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
@endsection