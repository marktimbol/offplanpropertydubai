<h3>Add Community</h3>
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
		<label for="slug">Slug</label>
		<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" />
	</div>	
	<div class="form-group">
		<label for="description">Description</label>
		<textarea name="description" id="description" class="form-control" rows="5">
			{{ old('description') }}
		</textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Save Community</button>
	</div>
</form>