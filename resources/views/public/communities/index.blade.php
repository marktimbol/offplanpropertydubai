@extends('layouts.app')

@section('pageTitle', 'Communities')

@section('content')
	<h1>Communities</h1>

	@foreach( $communities as $community )
		<li>{{ $community->name }}</li>
	@endforeach
@endsection