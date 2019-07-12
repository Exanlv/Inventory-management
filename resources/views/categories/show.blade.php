@extends('layout')

@section('title') {{ $category->name }} @endsection

@section('body')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Name
                </th>
                <th scope="col" class="d-none d-md-table-cell">
                    Price
                </th>
                <th scope="col" class="d-none d-md-table-cell">
                    Description
                </th>
                <th scope="col">

                </th>
                <th scope="col">

                </th>
                <th scope="col">

                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->products->all() as $product)
                <tr id="product-{{ $product->id  }}">
                    <th scope="row">{{ $product->id  }}</th>
                    <td>{{ $product->name  }}</td>
                    <td class="d-none d-md-table-cell">{{ $product->price ? '€' . $product->price : '-'  }}</td>
                    <td class="d-none d-md-table-cell">{{ $product->description ? strlen($product->description) > 30 ? substr($product->description, 0, 27) . '...' : $product->description : '-' }}</td>
                    <td><a href="" onclick="event.preventDefault(); openModal({{ $product->id  }})"><i class="fa fa-eye text-info"></i></a></td>
                    <td><a href="{{ route('products.edit', ['product' => $product]) }}"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i></a></td>
                    <td><a href="" onclick="event.preventDefault(); removeProduct({{ $product->toJson()  }})"><i class="fa fa-times text-danger"  aria-hidden="true"></i></a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6"></td>
                <td><a href="{{ route('products.create.inCategory', ['category' => $category]) }}"><i class="fa fa-plus text-success" aria-hidden="true"></i></a></td>
            </tr>
        </tbody>
    </table>
    <div class="modal" tabindex="-1" id="productModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="productModalLoader">
                    <div class="text-center">
                        <div class="spinner-border" style="width: 8rem; height: 8rem; margin: 2rem 0;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div id="productModalContent">

                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="removeConfirmModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove <span id="removeConfirmModalProductName"></span></h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove this product?
                    <form method="post" id="removeConfirmModalForm">
                        @method('delete')
                        @csrf
                        <br>
                        <input type="submit" value="Remove" class="btn btn-danger float-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openModal(prod_id) {
            $('#productModalLoader').show();
            $('#productModalContent').hide();

            let route = '{{  route('products.show', ['product' => ':id']) }}'.replace(':id', prod_id);

            $('#productModalContent').load(route, () => {
                $('#productModalLoader').hide();
                $('#productModalContent').show();
            });

            $('#productModal').modal('show');
        }

        function removeProduct(product) {
            $('#removeConfirmModalProductName').html(product.name);
            $('#removeConfirmModalForm').attr('action', '{{ route('products.destroy', ['category' => ':id'])  }}'.replace(':id', product.id));

            $('#removeConfirmModal').modal('show');
        }
    </script>
@endsection