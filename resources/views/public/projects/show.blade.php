@extends('layouts.project')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/lightbox.css') }}" />
	<link rel="stylesheet" href="/css/video.css" />
	<link rel="stylesheet" href="/css/map.css" />
@endsection

@section('bodyClass', 'Single-project')

@section('pageTitle', sprintf('%s - %s', $project->name, $project->title))

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
				<div class="col-md-8">
					<h1 class="Project__title">
						{{ $project->name }} - {{ $project->title }}
						<small>by {{ $project->developer->name }}</small>
					</h1>
					<div class="Project__description">
						<ul class="list-group">
							<li class="list-group-item">
								<i class="fa fa-home"></i> &nbsp; Project Type: 
								@foreach( $project->types as $type )
									<span class="label label-success">{{ $type->name }}</span>
								@endforeach
							</li>
							<li class="list-group-item">
								<i class="fa fa-money"></i> &nbsp; 
								Price starting from: {{ $project->price }}
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
								Location: 
								@foreach( $project->communities as $community )
									{{ sprintf('%s %s %s, %s', $community->name, '-' , $community->city->name, $community->city->country->name) }}
								@endforeach
							</li>
						</ul>
						{!! $project->description !!}
					</div>

					<div class="row">
						<div class="col-md-12">
							@if( count($project->payments) > 0 )
								<h3>Payment Terms</h3>
								<table class="table table-bordered">
									@foreach( $project->payments as $plan )
									<tr>
										<td width="200">{{ $plan->title }}</td>
										<td width="100">{{ $plan->percentage }}</td>
										<td>{{ $plan->date }}</td>
									</tr>
									@endforeach
								</table>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<p>
						@if( count($project->brochure) > 0 )
							<button class="btn btn-block btn-lg btn-success" data-toggle="modal" data-target="#DownloadBrochureForm">
								<i class="fa fa-cloud-download"></i> &nbsp; Download Brochure
							</button>
						@endif
					</p>
					<h3>Register your Interest</h3>
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
							<label for="iam">I Am:</label>
							<select name="iam" class="form-control">
								<option value=""></option>
								<option value="Investor">Investor</option>
								<option value="Agent">Agent</option>
								<option value="Guest">Guest</option>
							</select>
						</div>
						<div class="form-group">
							<label for="country">Country</label>
							<input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required />
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea name="message" id="message" class="form-control">
								{{ old('message') }}
							</textarea>
						</div>

						<div class="form-group">
							<div class="g-recaptcha" data-sitekey="6LeKrhIUAAAAAASOmIxl4WVSzfHE4E1dooL8LuNy"></div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Send Inquiry
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		@if( count($project->videos) > 0 )
			<div class="Project__videos--container">
				<?php
					$video = $project->videos()->first();
				?>
				<video id="Project__video"
					class="video-js" 
					controls muted 
					preload="auto"
					poster="{{ $video->cover }}"
				>
					<source src="{{ $video->link }}" type='video/mp4'>
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
		@endif
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@if( count($project->floorplans) > 0 )
						<h3>Floor Plan</h3>
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

													<div class="Floorplan__zoom-icon">
														<i class="fa fa-search"></i> <small>Enlarge Photo</small>
													</div>											
												</a>
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

		<div class="Googlemap">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Project Location</h3>
					</div>
				</div>
			</div>
			<section id="cd-google-map">
				<div id="google-container"></div>
				<div id="cd-zoom-in"></div>
				<div id="cd-zoom-out"></div>
			</section>
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
	<script src="{{ elixir('js/video.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.googlemap.key') }}"></script>
	<script src="/js/map.js"></script>
@endsection