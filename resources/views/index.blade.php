<div id="app">

@extends('src.app')

@section('section')
	{{csrf_field()}} 
	<example-component></example-component>



@endsection
</div>