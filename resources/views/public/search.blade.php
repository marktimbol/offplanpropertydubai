@extends('layouts.app')

@section('pageTitle', sprintf('Search results for %s', $query))

@section('content')
	<div class="is-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="ProjectListings__title">
						{!! sprintf('Search results for <em>%s</em>', $query) !!}
					</h1>
				</div>
			</div>

			<div class="row Projects__search">
				<div class="col-md-5">
					<form method="GET" action="{{ route('search') }}" class="Search">
						<label>@lang('messages.search-project')</label>
						<div class="input-group">
							<input type="text" name="query" class="form-control Search__input" />
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Search</button>
							</span>
						</div>
					</form>
				</div>
			</div>

			@if( count($projects) > 0 )
				@include('public.projects._listings', [
					'projects' => $projects
				])
			@else
				<div class="row">
					<div class="col-md-12">
						<p class="lead">
							{{ sprintf('No search results for %s', $query) }}
						</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection