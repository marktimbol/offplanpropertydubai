@extends('layouts.project')

@section('bodyClass', 'Single-project')

@section('pageTitle', sprintf('%s - %s', $project->name, $project->title))

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/lightbox.css') }}" />
@endsection

@section('content')

	<div class="Project">
		<div class="container">
			<div class="row">
				<div class="col-md-12">				
					<div class="Project__carousel--container">
						@if( $logo !== '' )
							<div class="Project__logo--container">
								<img src="{{ $logo }}" alt="{{ $project->title }}" title="{{ $project->title }}" class="img-responsive" />
							</div>
						@endif
						<div class="Project__carousel owl-carousel">
							@forelse($project->photos as $photo)
								<div>
									<img src="{{ getPhotoPath($photo->photo) }}" 
										alt="{{ $project->name }}" 
										title="{{ $project->name }}" 
										class="img-responsive" />
								</div>					
							@empty
								<div>
									<img src="/images/header-bg.jpg" alt="" title="" class="img-responsive" />
								</div>		
							@endforelse
						</div>
						<div class="Project__carousel--nav">
							<a class="prev">
								<i class="fa fa-angle-left" aria-hidden="true"></i>
							</a>
							<a class="next">
								<i class="fa fa-angle-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="Project__title">
						{{ $project->name }} - {{ $project->title }}
						<small>by {{ $project->developer->name }}</small>
					</h1>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if( count($project->floorplans) > 0 )
						<h3>@lang('nav.floorplans')</h3>
						<div class="Floorplan--container">
							<div class="Floorplans">
								@foreach( $project->floorplans->chunk(4) as $chunks )
									<div class="Row">
										@foreach( $chunks as $floorplan )
											<div class="Floorplan Column-3">
												<h4 class="text-center">
													{{ $floorplan->title }}<br />
													<small>{{ $floorplan->price }}</small>
												</h4>
												<a href="{{ getPhotoPath($floorplan->photo) }}"
													data-lightbox="floorplans"
													data-title="{{ $floorplan->title }} - {{ $floorplan->price }}"
												>
													<img src="{{ getPhotoPath($floorplan->photo) }}" 
													alt="{{ $floorplan->title }}" 
													title="{{ $floorplan->title }}" 
													class="img-responsive" />
												</a>
												<div class="Floorplan__actions">
													<a href="{{ getPhotoPath($floorplan->photo) }}"
														data-lightbox="floorplans"
														data-title="{{ $floorplan->title }} - {{ $floorplan->price }}"
													>
														<i class="fa fa-search"></i> <small>Enlarge Photo</small>
													</a>
													<a href="{{ getPhotoPath($floorplan->photo) }}">
														<i class="fa fa-download"></i> <small>Download</small>
													</a>
												</div>
											</div>
										@endforeach							
									</div>
								@endforeach													
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	<section class="RelatedProjects is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-30">All Projects of {{ $project->developer->name }}</h3>
				</div>
			</div>
			
			@include('public.projects._listings', [
				'projects' => $project->developer->projects
			])
		</div>
	</section>

	@include('public.projects._download-brochure')
	
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/lightbox.js') }}"></script>
@endsection