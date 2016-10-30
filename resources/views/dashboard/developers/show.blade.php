@extends('layouts.dashboard')

@section('content')
	<h1>{{ $developer->name }}
		<small>
			<a href="{{ route('dashboard.developers.edit', $developer->id) }}">
				<i class="fa fa-pencil"></i>
			</a>	
		</small>
	</h1>

	<div class="row">
		<div class="col-md-3">
			@if( getPhotoPath($developer->photo) != '' )
				<img src="{{ getPhotoPath($developer->photo) }}" alt="{{ $developer->name }}" title="{{ $developer->title }}" class="img-responsive" />
				<p>&nbsp;</p>
			@endif

			<form 
				class="dropzone" 
				action="{{ route('dashboard.developers.photos.store', $developer->id) }}" 
				id="UploadDeveloperLogo"
			>
				{{ csrf_field() }}
			</form>
		</div>
		<div class="col-md-9">
			{!! $developer->profile !!}
		</div>
	</div>

	<hr />
	
	<h3>Projects
		<small>
			<a href="{{ route('dashboard.developers.projects.create', $developer->id) }}" 
				class="btn btn-sm btn-primary"
			>
				Add Project
			</a>
		</small>
	</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Project Name</th>
			</tr>
		</thead>
		<tbody>
			@forelse( $developer->projects as $project )
			<tr>
				<td>
					<a href="{{ route('dashboard.developers.projects.show', [$developer->id, $project->id]) }}">{{ $project->name }}</a>
				</td>
			</tr>
			@empty
			<tr>
				<td>No record yet.</td>
			</tr>
			@endforelse
		</tbody>
	</table>

	<form method="POST" action="{{ route('dashboard.developers.destroy', $developer->id) }}">
		{{ csrf_field() }}
		{!! method_field('DELETE') !!}
		<div class="form-group">
			<button type="submit" class="btn btn-danger">
				<i class="fa fa-remove"></i> Delete Developer
			</button>
		</div>
	</form>
@endsection