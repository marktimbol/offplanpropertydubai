@extends('layouts.dashboard')

@section('content')
	<div class="row">
		<div class="col-md-4">
			@if( count($project->logo) > 0 )
				<?php
					$path = getPhotoPath($project->logo->photo);
				?>
				<div class="Project__logo">
					<img src="{{ $path }}" 
						alt="{{ $project->name }}" 
						title="{{ $project->name }}" 
						class="img-responsive img-bordered" />

					<a class="camera" 
						data-toggle="modal" 
						data-target="#ChangeProjectLogo"
					>
						<i class="fa fa-camera"></i>
					</a>
				</div>

				@include('dashboard.projects._upload-logo')

			@else
				<form 
					method="POST" 
					action="{{ route('dashboard.developers.projects.logos.store', [
						$developer->id, $project->id
					]) }}"
					class="dropzone" 
					id="UploadProjectLogo"
				>
					{{ csrf_field() }}
				</form>
			@endif
		</div>
		<div class="col-md-8">
			<h1>{{ $project->name }}: {{ $project->title }}
				<small>
					<a href="{{ route('dashboard.developers.projects.edit', [
						$developer->id, $project->id
					]) }}">
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
					Expected Completion Date: {{ $project->expected_completion_date }}
				</li>

				<li class="list-group-item">
					Location: {{ sprintf('%s &mdash; %s, %s', $project->community, $project->city, $project->country) }}
				</li>
			</ul>
		</div>
	</div>

	<div class="btn-group btn-flexible">
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectPhotosModal">
			<i class="fa fa-file-photo-o"></i> Manage Photos
		</button>
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectBrochureModal">
			<i class="fa fa-file-pdf-o"></i> Manage Brochure
		</button>
		<button class="btn btn-default" data-toggle="modal" data-target="#UploadProjectFloorPlanModal">
			<i class="fa fa-file-photo-o"></i> Manage Floor Plan
		</button>
		<button class="btn btn-default">
			<i class="fa fa-file-video-o"></i> Manage Video
		</button>
	</div>

	<h3>Project Type</h3>
	<table class="table table-bordered">
		<tbody>
			@foreach( $project->types as $type )
			<tr>
				<td>{{ $type->name }}</td>
				<td>
					<form method="POST" 
						action="{{ route('dashboard.developers.projects.types.destroy', [
							$developer->id, $project->id, $type->id
						]) }}"
					>
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-sm btn-link">
							<i class="fa fa-close"></i>
						</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<h3>Payment Terms</h3>
	<table class="table table-bordered">
		<thead>
			<th>Title</th>
			<th>Percentage</th>
			<th>Date</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			@foreach( $project->payments as $term )
				<tr>
					<td>{{ $term->title }}</td>
					<td>{{ $term->percentage }}</td>
					<td>{{ $term->date }}</td>
					<td>
						<form method="POST" 
							action="{{ route('dashboard.developers.projects.payments.destroy', [
								$developer->id, $project->id, $term->id
							]) }}"
						>
							{{ csrf_field() }}
							{!! method_field('DELETE') !!}
							<button type="submit" class="btn btn-sm btn-link">
								<i class="fa fa-close"></i>
							</button>
						</form>
					</td>
				</tr>
			@endforeach
			<form method="POST" action="{{ route('dashboard.developers.projects.payments.store', [$developer->id, $project->id]) }}">
				{{ csrf_field() }}
				<tr>		
					<td>
						<div class="form-group">
							<input 
								type="text" 
								name="title" 
								class="input-sm form-control" 
								placeholder="1st Installment"
								value="{{ old('title') }}" required />
						</div>
					</td>
					<td>
						<div class="form-group">
							<input 
								type="text" 
								name="percentage" 
								class="input-sm form-control"
								placeholder="10%" 
								value="{{ old('percentage') }}" required />
						</div>
					</td>
					<td>
						<div class="form-group">
							<input 
								type="text" 
								name="date" 
								class="input-sm form-control"
								placeholder="Purchase Date"
								value="{{ old('date') }}" required />
						</div>
					</td>
					<td>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">Save</button>
						</div>
					</td>
				</tr>
			</form>
		</tbody>
	</table>

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