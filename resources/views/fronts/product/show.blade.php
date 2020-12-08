@extends('layouts.index')
@section('content')
<h1>Detail product</h1>
	<ul class="list-group">
		<img class="list-group-item"><img src="{{asset('./img')}}/{{$products->image}}" alt="img"></li>
		<li class="list-group-item">Item 2</li>
		<li class="list-group-item">Item 3</li>
	</ul>
@endsection 