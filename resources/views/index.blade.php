@extends('src.app')

@section('section')
<div class="container">
<button>Click Me <button>
</div>
<div id="app">
	<example-component></example-component>
</div>

<div id="app2">
	<todo-item v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></todo-item>
</div>

<script>
$(document).ready(function(){
$("button").click(function(){
$("div").animate({
	left: '250px',
	opacity: '0.5',
	height: '150px',
	width: '150px'
	

});
});
});


</script>
@endsection
