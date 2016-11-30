@extends('layouts.dashboard')

@section('content')
	<h1>
		<a href="{{ route('dashboard.cities.communities.index', [
			$city->id
		]) }}"
		>
			{{ $city->name }}
		</a> - {{ $community->name }}
	</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.communities._edit')
		</div>
		<div class="col-md-8">
			<h3>Description</h3>
			<p>
				{{ $community->description }}</p>
			</p>

			<h3>Photo <small>(710px &times; 414px)</small></h3>
			<div class="row">
				@if( getPhotoPath($community->photo) != '' )
					<div class="col-md-6">
						<div class="has-delete-icon">
							<img src="{{ getPhotoPath($community->photo) }}" alt="{{ $community->name }}" title="{{ $community->title }}" class="img-responsive" />
							<form 
								method="POST" 
								action="{{ route('dashboard.communities.photos.destroy', [$community->id, 1]) }}"
							>
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-sm btn-danger">&times;</button>
							</form>
						</div>
					</div>
				@else			
					<div class="col-md-6">	
						<form 
							method="POST" 
							class="dropzone" 
							action="{{ route('dashboard.communities.photos.store', $community->id) }}"
						>
							{{ csrf_field() }}
						</form>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection