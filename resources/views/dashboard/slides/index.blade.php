@extends('layouts.dashboard')

@section('content')
	<h1>Slides</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.slides._create')
		</div>
		<div class="col-md-8">
			<h3>All Slides</h3>
			<table class="table table-bordered table-striped">
				<thead>
					<th>Path</th>
					<th>&nbsp;</th>
				</thead>
				<tbody>
					@forelse( $slides as $slide )
					<tr>
						<td>{{ $slide->path }}</td>
						<td>
							<form method="POST" action="{{ route('dashboard.slides.destroy', $slide->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@empty
						<tr>
							<td colspan="2">No slides yet.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection