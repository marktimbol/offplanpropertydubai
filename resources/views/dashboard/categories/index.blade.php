@extends('layouts.dashboard')

@section('content')
	<h1>Categories</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.categories._create')
		</div>
		<div class="col-md-8">
			<h3>Lists</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Name</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $categories as $category )
					<tr>
						<td>{{ $category->name }}</td>
						<td>
							<form method="POST" action="{{ route('dashboard.categories.destroy', $category->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<a href="{{ route('dashboard.categories.types.index', $category->id) }}" 
									class="btn btn-sm btn-success"
								>
									Manage Project Types
								</a>
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