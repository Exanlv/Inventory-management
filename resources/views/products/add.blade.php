@extends('layout')

@section('title') Add product @endsection

@section('body')
<form method="POST" action="{{ route('products.store')  }}" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')  }}" required>
                </td>
                <td>

                </td>
                <td>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{  old('price') }}">
                </td>
            </tr>
        </table>

        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" style="height: 8rem; margin-bottom: 1rem;">{{ old('description')  }}</textarea>

        <div id="image_fields">

        </div>

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
                    <select class="form-control" id="category" name="category_id">
                        @foreach($categories as $i => $category)
                            <option {{ $i === $category_id ? 'selected' : ''  }} value="{{ $category->id  }}">{{ $category->name  }}</option>
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
<script>
function imageField() {
    var inputField = $('<input class="form-control image_input_field" style="height: initial; margin-bottom: 5px;" type="file" name="images[]" accept=".png,.jpeg,.jpg">');
    $(inputField).change(() => {
        if ($(this).value === $('.image_input_field:last-of-type').value && $('.image_input_field').length < 10) {
            $('#image_fields').append(imageField());
        }
    })
    return inputField;
}

$('#image_fields').append(imageField());
</script>
@endsection