@extends('layouts.dashboard')

@section('header_styles')
	{{-- <link rel="stylesheet" href="{{ elixir('css/editor.css') }}" /> --}}
	<link rel="stylesheet" href="/css/editor.css" />
@endsection

@section('content')
	<h1>Add Project to {{ $developer->name }}</h1>

	<div id="CreateProject"></div>

@endsection

@section('footer_scripts')
	{{-- // <script src="{{ elixir('js/editor.js') }}"></script> --}}
	{{-- // <script src="{{ elixir('js/CreateProject.js') }}"></script> --}}
	<script src="/js/editor.js"></script>
	<script src="/js/CreateProject.js"></script>
@endsection