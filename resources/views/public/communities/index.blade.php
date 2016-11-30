@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<div class="Communities">
		<div class="Communities__bg Flex Flex--center Flex--column">
			<h1 class="Communities__title is-white">Communities</h1>
		</div>
	</div>
	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="Communities">
					@foreach( $communities as $community )
						<div class="Community">
							<div class="row">
								<div class="Community__image col-md-6">
									@if( $community->photo != '' )
										<img src="{{ getPhotoPath($community->photo) }}" alt="" title="" class="img-responsive" />
									@else
									
									@endif
								</div>
								<div class="Community__content col-md-6">
									<h2>{{ $community->name }}</h2>
									<p class="lead">
										{{ str_limit($community->description, 250, '...') }}
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>&nbsp;</p>
									<h4>Available in {{ $community->name }}</h4>
									@include('public.projects._listings', [
										'projects'	=> $community->projects->take(3)
									])
								</div>
							</div>
						</div>
					@endforeach
					{!! $communities->links() !!}
				</div>
			</div>
		</div>
	</div>
@endsection