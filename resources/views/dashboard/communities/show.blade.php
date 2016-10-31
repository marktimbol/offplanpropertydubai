@extends('layouts.dashboard')

@section('content')
	<h1>
		<a href="{{ route('dashboard.cities.communities.index', [
			$city->id
		]) }}"
		>
			{{ $city->name }}
		</a> - {{ $community->name }}
	</h1>

	<div class="row">
		<div class="col-md-4">
			@include('dashboard.communities._edit')
		</div>
		<div class="col-md-8">
			<h3>Description</h3>
			<p>
				{{ $community->description }}</p>
			</p>
		</div>
	</div>
@endsection