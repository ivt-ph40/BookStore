@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>Edit: {{$products->name}}</h1>
<form action="{{route('dashboards.products.update', $products->name)}}" method="POST" category="form">
	
	@csrf

	@method('PUT')

	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field" value="{{$products->name}}">
	</div>

	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-control" name="description" placeholder="Input field" value="{{$products->description}}">
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field" value="{{$products->quantity}}">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="number" class="form-control" name="price" placeholder="Input field" value="{{$products->price}}">
	</div>

	<div class="form-group">
		<label for="">image</label>
		<input type="file" name="image" class="form-control" placeholder="Input field" value="{{$products->image}}">
	</div>

	<select name="author_id" id="inputAuthor_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($authors as $author)
		<option value="{{$author->id}}"><span class="badge badge-secondary">{{$author->name}}</span></option>
		@endforeach
	</select>

	<select name="publisher_id" id="inputPublisher_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($publishers as $publisher)
		<option value="{{$publisher->id}}"><span class="badge badge-secondary">{{$publisher->name}}</span></option>
		@endforeach
	</select>

	<select name="category_id" id="inputcategory_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($categories as $category)
		<option value="{{$category->id}}"><span class="badge badge-secondary">{{$category->name}}</span></option>
		@endforeach
	</select>

	<button type="submit" class="btn btn-primary" action="update">Update</button>
</form>
@endsection