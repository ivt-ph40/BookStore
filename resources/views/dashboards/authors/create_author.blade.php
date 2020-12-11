@extends('dashboards.layout.index')
@section('js')
@section('content')
<form action="{{route('dashboards.authors.store')}}" method="POST" role="form">
	<legend>Create Authors</legend>
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection