@extends('src.app')

@section('section')
<div class="container">
<button>Click Me </button>
</div>
<div id="app">
	<example-component></example-component>
</div>

<div id="app2">
	<todo-item v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></todo-item>
</div>

</body>
@endsection
