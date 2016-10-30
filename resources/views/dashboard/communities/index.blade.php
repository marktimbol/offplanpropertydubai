@extends('layouts.dashboard')

@section('content')
	<h1>{{ $city->name }} Communities</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.communities._create')
		</div>
		<div class="col-md-8">
			<h3>Lists</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $communities as $community )
					<tr>
						<td width="200">
							<a href="{{ route('dashboard.cities.communities.show', [$city->id, $community->id]) }}">
								{{ $community->name }}
							</a>
						</td>
						<td>
							<form method="POST" action="{{ route('dashboard.cities.communities.destroy', [$city->id, $community->id]) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
		</div>
	</div>
@endsection