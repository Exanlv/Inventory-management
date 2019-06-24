@extends('layout')

@section('title') Edit category @endsection

@section('body')
	<form action="{{ route('categories.update', ['category' => $category]) }}" method="post" style="width: 50%; margin: auto; margin-top: 50px;">
		@method('patch')
		@csrf
		<div class="form-group">
			<label for="category-name">Category name:</label>
		<input type="text" class="form-control" id="category-name" name="category" value="{{ $category->name }}" required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" style="width: 100%;">Add</button>
		</div>
	</form>
@endsection