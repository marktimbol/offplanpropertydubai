@extends('layouts.dashboard')

@section('content')
	<div class="row">
		<div class="col-md-4">
			<form method="POST" action="#" class="dropzone is-centered-xy" id="uploadProjectLogoForm">
				{{ csrf_field() }}
			</form>
		</div>
		<div class="col-md-8">
			<h1>{{ $project->name }}: {{ $project->title }}
				<small>
					<a href="{{ route('dashboard.developers.projects.edit', [$developer->id, $project->id]) }}">
						<i class="fa fa-pencil"></i>
					</a>	
				</small>
			</h1>

			<ul class="list-group">
				<li class="list-group-item">
					Developer:
						<a href="{{ route('dashboard.developers.show', $developer->id) }}">
							{{ $developer->name }}
						</a>
				</li>

				<li class="list-group-item">
					Expected Completion Date: {{ $developer->expected_completion_date }}
				</li>
			</ul>
		</div>
	</div>

	<div class="btn-group btn-flexible">
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectPhotosModal">
			<i class="fa fa-upload"></i> Manage Photos
		</button>
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectBrochureModal">
			<i class="fa fa-upload"></i> Manage Brochure
		</button>
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectFloorPlanModal">
			<i class="fa fa-upload"></i> Manage Floor Plan
		</button>
		<button class="btn btn-default">
			<i class="fa fa-upload"></i> Manage Video
		</button>
	</div>

	<h3>Project Location</h3>
	<ul class="list-group">
		<li class="list-group-item">Country: {{ $project->country }}</li>
		<li class="list-group-item">City: {{ $project->city }}</li>
		<li class="list-group-item">Community: {{ $project->community }}</li>
	</ul>

	<h3>Project Type</h3>
	<h3>Payment Terms</h3>
	<h3>External Links</h3>
	<ul class="list-group">
		<li class="list-group-item">
			DLD Project Completion %:
			<a href="{{ $project->dld_project_completion_link }}" target="_blank">
				{{ $project->dld_project_completion_link }}
			</a>
		</li>

		<li class="list-group-item">
			Escrow Account Details Link:
			<a href="{{ $project->project_escrow_account_details_link }}" target="_blank">
				{{ $project->project_escrow_account_details_link }}
			</a>
		</li>
	</ul>
	
	<h3>Project Description</h3>
	<p>{!! $project->description !!}</p>

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

	@include('dashboard.projects._upload-floorplan')
	@include('dashboard.projects._upload-brochure')
	@include('dashboard.projects._upload-photos')
@endsection