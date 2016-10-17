@extends('layouts.app')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/carousel.css') }}" />
@endsection

@section('pageTitle', $developer->name)

@section('content')
	<h1>{{ $developer->name }}</h1>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/carousel.js') }}"></script>
@endsection