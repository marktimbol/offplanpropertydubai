@extends('layouts.dashboard')

@section('content')
	<h1>{{ $category->name }} Project Types</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.types._create')
		</div>
		<div class="col-md-8">
			<h3>Lists</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $types as $type )
					<tr>
						<td>{{ $type->name }}</td>
						<td>
							<form method="POST" action="{{ route('dashboard.categories.types.destroy', [$category->id, $type->id]) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="2">No Project type yet.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection