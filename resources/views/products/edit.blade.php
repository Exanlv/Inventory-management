@extends('layout')

@section('title') {{ $product->category->name . ' // ' . $product->name  }} @endsection

@section('body')
    <form method="POST" action="{{ route('products.update', ['product' => $product])  }}" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name  }}" required>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{  $product->price }}">
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-12">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" style="height: 8rem; margin-bottom: 1rem;">{{ $product->description  }}</textarea>
                </div>
            </div>

            <br>

            @component('components.shared.slideout-component', ['title' => 'Images'])
                @component('components.products.images-component', ['images' => $product->images->all()])
            	@endcomponent
            @endcomponent

            <br>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id" value="{{ $product->category_id  }}">
                        @foreach($categories as $category)
                            <option value="{{ $category->id  }}">{{ $category->name  }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-6">
                    <label>&nbsp;</label>
                    <input type="submit" class="btn btn-primary float-right" style="width: 100%;" value="Edit product">
                </div>
            </div>
        </div>
    </form>
@endsection