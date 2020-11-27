@extends('dashboards.layout.master')
@section('content')
<form action="{{route('dashboards.roles.store')}}" method="POST" role="form">
	<legend>Create Roles</legend>
	@csrf
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" placeholder="Input field">
	</div>

	<button type="submit" class="btn btn-primary" action="save">Create</button>
</form>
@endsection