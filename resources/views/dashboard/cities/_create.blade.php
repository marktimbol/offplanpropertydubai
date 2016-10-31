<h3>Add City</h3>
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
		<button type="submit" class="btn btn-primary">Save City</button>
	</div>
</form>