@extends('layouts.dashboard')

@section('content')
	<h1>Edit Developer</h1>

	<form method="POST" action="{{ route('dashboard.developers.update', $developer->slug) }}">
		{{ csrf_field() }}
		{!! method_field('PUT') !!}
		<div class="form-group">
			<label for="name">Developer Name</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') or $developer->name }}" />
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</form>
@endsection