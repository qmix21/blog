<div id="app">

@extends('src.app')

@section('section')
<meta name="csrf-token" content="{{ csrf_token() }}">
	@csrf
	<example-component></example-component>



@endsection
</div>