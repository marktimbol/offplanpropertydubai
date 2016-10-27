@extends('layouts.app')

@section('pageTitle', sprintf('%s Community', $community->name))

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{{ sprintf('%s Community', $community->name) }}</h1>
				<p class="lead">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
				</p>
			</div>
			<div class="col-md-12">
				@include('public.projects._listings', [
					'projects' => $community->projects
				])
			</div>
		</div>
	</div>
@endsection