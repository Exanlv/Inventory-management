@extends('layout')

@section('body')
	<h1 class="text-center">Add category</h1>

	<form action="{{ route('categories.store') }}" method="post" style="width: 50%; margin: auto; margin-top: 50px;">
		@csrf
		<div class="form-group">
			<label for="category-name">Category name:</label>
		<input type="text" class="form-control" id="category-name" name="category" @isset($categoryName) value="{{ $categoryName }}" @endisset>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" style="width: 100%;">Add</button>
		</div>
	</form>
@endsection