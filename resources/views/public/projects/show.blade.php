@extends('layouts.project')

@section('header_styles')
	<link rel="stylesheet" href="/css/carousel.css" />
	<link rel="stylesheet" href="/css/video.css" />
@endsection

@section('bodyClass', 'Single-project')

@section('pageTitle', $project->name)

@section('content')
	<div class="Project">
		<div class="Project__carousel--container">
			<div class="Project__carousel">
				@forelse($project->photos as $photo)
					<div>
						<img src="{{ getPhotoPath($photo->photo) }}" 
							alt="{{ $project->name }}" 
							title="{{ $project->name }}" 
							class="img-responsive" />
					</div>
				@empty
					<div>
						<img src="/images/video-cover.jpg" alt="" title="" />
					</div>
					<div>
						<img src="/images/header-bg.jpg" alt="" title="" />
					</div>				
				@endforelse
			</div>
			<div class="Project__carousel__content--container">
				<h2>
					{{ $project->title }}
					<small>by {{ $project->developer->name }}</small>
				</h2>
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

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h1 class="Project__title">
						{{ $project->title }}
					</h1>
					<div class="Project__description">
						<ul class="list-group">
							<li class="list-group-item">
								<i class="fa fa-home"></i> &nbsp; Project Type: 
								@foreach( $project->types as $type )
									{{ $type->name . ' ' }}
								@endforeach
							</li>
							<li class="list-group-item">
								<i class="fa fa-calendar"></i> &nbsp; 
								Expected Completion Date: {{ $project->expected_completion_date }}
							</li>
							<li class="list-group-item">
								<i class="fa fa-external-link"></i> &nbsp; 
								<a href="{{ $project->dld_project_completion_link }}" target="_blank">
									DLD Project Completion %
								</a> 
							</li>
							<li class="list-group-item">
								<i class="fa fa-external-link"></i> &nbsp; 
								<a href="{{ $project->project_escrow_account_details_link }}" target="_blank">
									Escrow Account Details %
								</a>
							</li>
							<li class="list-group-item">
								<i class="fa fa-map-marker"></i> &nbsp; 
								{{ sprintf('%s &mdash; %s, %s', $project->community, $project->city, $project->country) }}
							</li>
						</ul>
						{!! $project->description !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="Inquiry">
						<h3 class="Inquiry__title">Inquire Now</h3>
						<form method="POST" action="{{ route('projects.inquiries.store', $project->slug) }}">
							{{ csrf_field() }}
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label for="name">Name *</label>
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required/>
								@if( $errors->has('name') )
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label for="email">eMail *</label>
								<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required />
								@if( $errors->has('email') )
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
								<label for="phone">Phone *</label>
								<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required />
								@if( $errors->has('phone') )
									<span class="help-block">
										<strong>{{ $errors->first('phone') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								<label for="passport">Passport No.</label>
								<input type="text" name="passport" id="passport" class="form-control" value="{{ old('passport') }}" />
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea name="message" id="message" class="form-control">
									{{ old('message') }}
								</textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-send"></i> &nbsp; Send Message</button>
							</div>
						</form>
					</div>		
				</div>
			</div>
		</div>

		<div class="Project__video--container">
			<video id="Project__video" 
				class="video-js" 
				controls muted 
				preload="auto"
				poster="/images/header-bg.jpg"
			>
				<source src="http://vjs.zencdn.net/v/oceans.mp4" type='video/mp4'>
				<p class="vjs-no-js">
					To view this video please enable JavaScript, and consider upgrading to a web browser that
					<a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
				</p>
			</video>
			<button class="btn btn-link PlayButton">
				<div class="play-video-icon Flex Flex--center">
					<span></span>
				</div>
			</button>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Floor Plan</h3>
					<div class="Floorplans">
						@foreach( $project->floorplans as $floorplan )
						<div class="Floorplan">
							<h4>{{ $floorplan->title }}</h4>
							<img src="{{ getPhotoPath($floorplan->photo) }}" 
								alt="{{ $floorplan->title }}" 
								title="{{ $floorplan->title }}" 
								class="img-responsive" />
						</div>
						@endforeach
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Payment Plans</h3>

					<table class="table table-bordered table-striped">
						@foreach( $project->payments as $plan )
						<tr>
							<td width="200">{{ $plan->title }}</td>
							<td width="100">{{ $plan->percentage }}</td>
							<td>{{ $plan->date }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>

		<div class="Googlemap">

		</div>
	</div>

	<section class="RelatedProjects is-light-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="mb-30">More Projects from {{ $project->developer->name }}</h3>
				</div>
			</div>
			<div class="row">
				@foreach( $project->developer->projects as $developerProject )
					<div class="col-md-4">
						<div class="Project">
							<div class="Project__image">
								<img src="/images/projects/project.jpg" alt="{{ $developerProject->name }}" title="{{ $developerProject->name }}" class="img-responsive" />
							</div>
							<div class="Project__content Flex Flex--space-between">
								<h4 class="Project__title">
									<a href="{{ route('projects.show', $developerProject->slug) }}">
										{{ $developerProject->name }}
									</a>
									<small>by <a href="{{ route('developers.show', $project->developer->slug) }}">
										{{ $project->developer->name }}
									</a></small>
								</h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection

@section('footer_scripts')
	<script src="/js/carousel.js"></script>
	<script src="/js/video.js"></script>
@endsection