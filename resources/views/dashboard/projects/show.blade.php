@extends('layouts.dashboard')

@section('content')
	<h1>{{ $project->name }}
		<small>
			<a href="{{ route('dashboard.developers.projects.edit', [$developer->id, $project->id]) }}">
				<i class="fa fa-pencil"></i>
			</a>	
		</small>
	</h1>

	<p>{!! $project->description !!}</p>
	
	<h3>Photos</h3>
	<div class="row ProjectPhotos">
		@foreach( $project->photos as $photo )
			<?php 
				$path = sprintf('https://s3-%s.amazonaws.com/%s/%s', 
						config('filesystems.disks.s3.region'), 
						config('filesystems.disks.s3.bucket'), 
						$photo->photo
				);
			?>
			<div class="col-md-3 ProjectPhoto">
				<img src="{{ $path }}" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
				<form method="POST" action="{{ route('dashboard.developers.projects.photos.destroy', [$developer->id, $project->id, $photo->id]) }}">
					{{ csrf_field() }}
					{!! method_field('DELETE') !!}
					<button type="submit" class="btn btn-sm btn-danger">
						<i class="fa fa-remove"></i>
					</button>
				</form>
			</div>
		@endforeach
	</div>

	<hr />

	<form action="{{ route('dashboard.developers.projects.photos.store', [$developer->id, $project->id]) }}" class="dropzone">
		{{ csrf_field() }}
	</form>

	<hr />

	<form method="POST" action="{{ route('dashboard.developers.projects.destroy', [$developer->id, $project->id]) }}">
		{{ csrf_field() }}
		{!! method_field('DELETE') !!}
		<div class="form-group">
			<button type="submit" class="btn btn-danger">
				<i class="fa fa-remove"></i> Delete Project
			</button>
		</div>
	</form>
@endsection