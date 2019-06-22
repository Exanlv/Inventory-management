@extends('layout')

@section('body')
	<h1 class="text-center">Add category</h1>

	<form action="#" style="width: 50%; margin: auto; margin-top: 50px;">
		<div class="form-group">
			<label for="category-name">Category name:</label>
			<input type="text" class="form-control" id="category-name">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" style="width: 100%;">Add</button>
		</div>
	</form>
@endsection