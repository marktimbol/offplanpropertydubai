@extends('layouts.dashboard')

@section('content')
	<h1>Communities</h1>

	<h3>Add Community</h3>
	<div class="well">
		<form method="POST" action="{{ route('dashboard.cities.communities.store', $city->id) }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label>City Name</label>
				<input type="text" class="form-control" value="{{ $city->name }}" disabled />
			</div>
			<div class="form-group">
				<label for="name">Community Name</label>
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
			@forelse( $communities as $community )
			<tr>
				<td>{{ $community->name }}</td>
				<td>
					<form method="POST" action="{{ route('dashboard.cities.communities.destroy', [$city->id, $community->id]) }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
			@empty
				<tr>
					<td colspan="2">No communities yet.</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection