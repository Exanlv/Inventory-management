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

            @component('components.shared.slideout', ['title' => 'Images'])
                <div class="row">
                    @foreach($product->images->all() as $image)
                        <div class="col-lg-3 col-md-6 image-container" style="position: relative; margin-bottom: 0.5rem;">
                            <i class="fa fa-times text-danger remove-image" aria-hidden="true" style="position: absolute; font-size: 1.5rem; top: 0.375rem; right: 1.5rem; opacity: 0.5"></i>
                            <img src="{{ Storage::url($image->path) }}" style="max-width: 100%" data-id="{{ $image->id }}">
                        </div>
                    @endforeach
                </div>
                <script>
                    $('.remove-image').click(function() {

                        $(this).click(() => {});
                        var parent = $(this).parent();
                        var url = '{{ route('products.destroyImage', ['image' => ':id:']) }}'.replace(':id:', $($(parent).children()[1]).data('id'));
                        $.get(url, (data) => {
                            if (data === 'true') {
                                $(parent).remove();
                            }
                        });
                    });
                </script>
            @endcomponent
            <table style="width: 100%; margin: 1rem 0;">
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
                        <input type="submit" class="btn btn-primary float-right" style="width: 100%;" value="Edit product">
                    </td>
                </tr>
            </table>

        </div>
    </form>
@endsection