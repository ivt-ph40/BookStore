@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.products.store')}}" method="POST" role="form">
	<legend>Create Products</legend>
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-control" name="description" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Quantity</label>
		<input type="number" class="form-control" name="quantity" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Price</label>
		<input type="text" class="form-control" name="price" placeholder="Input field">
	</div>

	<div class="form-group">
		<label for="">Image</label>
		<input type="file" name="image" class="form-control" placeholder="Input field">
	</div>

	<select name="author_id" id="inputAuthor_id" class="form-control" required="required">
		<option value="">Select</option>
		@foreach($authors as $author)
		<option value="{{$author->id}}"><span class="badge badge-secondary">{{$author->name}}</span></option>
		@endforeach
	</select>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection