@extends('layouts.app')

@section('pageTitle', sprintf('%s Off Plan Projects', $community->name))

@section('content')
	<div class="Communities">
		<div class="Communities__bg Flex Flex--center Flex--column">
			<h1 class="Communities__title is-white">{{ $community->name }} Off Plan Projects</h1>
		</div>
	</div>
	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="Communities">
					<div class="Community">
						<div class="Flex Flex--center">
							@if( $community->photo != '' )
								<div class="Column-6 Community__image">
									<img src="{{ getPhotoPath($community->photo) }}" alt="" title="" class="img-responsive" />									
								</div>
								<div class="Column-6 Community__content--container">
							@else
								<div class="Column-12 Community__content--container Community--no-image">
							@endif
								<div class="Community__content">
									<h2>{{ $community->name }}</h2>
									<p class="lead">
										{{ str_limit($community->description, 250, '...') }}
									</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h4>Projects in {{ $community->name }}</h4>
								@include('public.projects._listings', [
									'projects'	=> $community->projects
								])
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection