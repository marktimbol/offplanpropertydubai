<h3>Add Country</h3>
<form method="POST" action="{{ route('dashboard.countries.store') }}">
	{{ csrf_field() }}
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label for="name" class="control-label">Country Name</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
		@if( $errors->has('name') )
			<span class="help-block">
				{{ $errors->first('name') }}
			</span>
		@endif
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Save Country</button>
	</div>
</form>