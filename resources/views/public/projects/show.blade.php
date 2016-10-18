@extends('layouts.app')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('pageTitle', $project->name)

@section('content')
	<div class="Project">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="Project__carousel--container">
						<div class="Project__carousel">
							@foreach( range(1, 3) as $index )
							<div class="item">
								<img src="/images/projects/project.jpg" alt="{{ $project->name }}" title="{{ $project->name }}" class="img-responsive" />
							</div>
							@endforeach
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
			<div class="row">
				<div class="col-md-12">
					<h1 class="Project__title">
						{{ $project->name }}
						<small>
							by <a href="{{ route('developers.show', $project->developer->slug) }}">
							{{ $project->developer->name }}</a>
						</small>
					</h1>
					<hr />
				</div>
				<div class="col-md-9">
					<div class="Project__description">
						{!! $project->description !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="Download">
						<a href="#" class="btn btn-lg btn-block btn-success">
							<i class="fa fa-download"></i>&nbsp;
							Download Brochure
						</a>
					</div>
					<hr />
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
	</div>

	<section class="RelatedProjects is-gray-bg">
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
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection