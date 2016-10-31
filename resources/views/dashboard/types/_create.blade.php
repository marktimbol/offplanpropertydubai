<h3>Add Project Type</h3>
<form method="POST" action="{{ route('dashboard.categories.types.store', $category->id) }}">
	{{ csrf_field() }}
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label for="name" class="control-label">Project Type</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
		@if( $errors->has('name') )
			<span class="help-block">
				{{ $errors->first('name') }}
			</span>
		@endif
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Save Project Type</button>
	</div>
</form>