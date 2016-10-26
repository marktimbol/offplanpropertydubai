@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<h1>Communities</h1>

	@foreach( $communities as $community )
		<li>
			<a href="{{ route('communities.show', $community->slug) }}">
				{{ $community->name }}
			</a>
		</li>
	@endforeach
@endsection