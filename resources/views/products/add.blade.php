@extends('layout')

@section('title') Add product @endsection

@section('body')
<form method="POST" action="{{ route('products.store')  }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name')  }}" required>
            </div>
            <div class="col-sm-12 col-md-6">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{  old('price') }}">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-12">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" style="height: 8rem; margin-bottom: 1rem;">{{ old('description')  }}</textarea>
            </div>
        </div>

        <br>

        @component('components.products.images-component')
        @endcomponent

        <br>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id  }}" {{ $category->id == $category_id ? 'selected=selected' : ''  }}>{{ $category->name  }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-6">
                <label>&nbsp;</label>
                <input type="submit" class="btn btn-primary float-right" style="width: 100%;" value="Add product">
            </div>
        </div>
    </div>
</form>
@endsection