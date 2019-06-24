@extends('layout')

@section('title') Add category @endsection

@section('body')
	<form action="{{ route('categories.store') }}" method="post" style="width: 50%; margin: auto; margin-top: 50px;">
		@csrf
		<div class="form-group">
			<label for="category-name">Category name:</label>
		<input type="text" class="form-control {{ $errors->has('category') ? 'border-danger' : ''}}" id="category-name" name="category" value="{{ old('category') }}" required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit" style="width: 100%;">Add</button>
		</div>
	</form>
@endsection