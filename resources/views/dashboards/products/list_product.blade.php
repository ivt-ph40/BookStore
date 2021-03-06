@extends('dashboards.layout.index')
@section('js')
@section('content')
<h1>List products</h1>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th>Name</th>
			<th>AuthorID</th>
			<th>PublisherID</th>
			<th>CategoryID</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->id}}</td>
			<td><img src="{{url(asset('./img'))}}/{{$product->image}}" width="100"></td>
			<td>{{$product->name}}</td>
			<td>{{$product->author_id}}</td>
			<td>{{$product->publisher_id}}</td>
			<td>{{$product->category_id}}</td>
			<td><a href="{{route('dashboards.products.edit_product', $product->id)}}" class="btn btn-success">Edit</a></td>
			<td><a href="#" class="btn btn-danger">Delete</a></td>
		</tr>
		@endforeach
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td>&nbsp</td>
			<td><a href="{{route('dashboards.products.create_product')}}" class="btn btn-primary">Create</a></td>
		</tr>
	</tbody>
</table>
@endsection