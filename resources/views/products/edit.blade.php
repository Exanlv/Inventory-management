@extends('layout')

@section('title') {{ $product->category->name . ' // ' . $product->name  }} @endsection

@section('body')
    <form method="POST" action="{{ route('products.update', ['product' => $product])  }}">
        @method('patch')
        @csrf
        <div class="form-group">
            <table style="width: 100%; margin-bottom: 1rem;">
                <tr>
                    <td style="width: calc(50% - 0.5rem);">
                        <label for="name">Product Name</label>
                    </td>
                    <td style="width: 1rem;">

                    </td>
                    <td style="width: calc(50% - 0.5rem);">
                        <label for="price">Price</label>
                    </td>
                </tr>
                <tr style="width: 100%;">
                    <td>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name  }}" required>
                    </td>
                    <td>

                    </td>
                    <td>
                        <input type="number" class="form-control" id="price" name="price" value="{{  $product->price }}">
                    </td>
                </tr>
            </table>

            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" style="height: 8rem; margin-bottom: 1rem;">{{ $product->description  }}</textarea>

            <table style="width: 100%; margin-bottom: 1rem;">
                <tr>
                    <td style="width: calc(50% - 0.5rem);">
                        <label for="category">Category</label>
                    </td>
                    <td style="width: 1rem;">

                    </td>
                    <td style="width: calc(50% - 0.5rem);">

                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="form-control" id="category" name="category_id" value="{{ $product->category_id  }}">
                            @foreach($categories as $category)
                                <option value="{{ $category->id  }}">{{ $category->name  }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>

                    </td>
                    <td>
                        <input type="submit" class="btn btn-primary float-right" style="width: 100%;" value="Add product">
                    </td>
                </tr>
            </table>

        </div>
    </form>
@endsection