<h3>Edit Community</h3>
<form method="POST" action="{{ route('dashboard.cities.communities.update', [$city->id, $community->id]) }}">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="form-group">
		<label>City Name</label>
		<input type="text" class="form-control" value="{{ $city->name }}" disabled />
	</div>
	<div class="form-group">
		<label for="name">Community Name</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $community->name) }}" />
	</div>
	<div class="form-group">
		<label for="description">Description</label>
		<textarea name="description" id="description" class="form-control" rows="5">
			{{ old('description', $community->description) }}
		</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Update Community</button>
	</div>
</form>