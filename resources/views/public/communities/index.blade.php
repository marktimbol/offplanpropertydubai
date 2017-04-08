@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<div class="Communities">
		<div class="Communities__bg Flex Flex--center Flex--column">
			<h1 class="Communities__title is-white">@lang('nav.communities')</h1>
		</div>
	</div>
	<p>&nbsp;</p>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form method="GET" action="/communities">
					<div class="form-group">
						<div class="form-group__content Flex">
							<label for="filter">By</label>
							<select name="filter" id="filter" class="form-control">
								<option value=""></option>
								@foreach( $filters as $filter )
									<option value="{{ $filter->slug }}">
										{{ $filter->name }} ({{ $filter->projects_count }} Projects)
									</option>
								@endforeach
							</select>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Filter</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="Communities">
					@forelse( $communities as $community )
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
										'projects'	=> $community->projects->take(3)
									])
								</div>

								<div class="col-md-12">
									<p class="text-center">
										<a href="/communities/{{ $community->slug }}/projects" class="btn btn-success">All Projects in {{ $community->name }}</a>
									</p>
								</div>
							</div>
						</div>
					@empty
						<p class="lead">No community found.</p>
					@endforelse
					{!! $communities->links() !!}
				</div>
			</div>
		</div>
	</div>
@endsection