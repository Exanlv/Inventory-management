@extends('layout')

@section('title') {{ $category->name }} @endsection

@section('body')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    #
                </th>
                <th scope="col">
                    Name
                </th>
                <th scope="col">
                    Price
                </th>
                <th scope="col">
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
                <tr>
                    <th scope="row">{{ $product->id  }}</th>
                    <td>{{ $product->name  }}</td>
                    <td>{{ $product->price ? '€' . $product->price : '-'  }}</td>
                    <td>{{ $product->description ? strlen($product->description) > 30 ? substr($product->description, 0, 27) . '...' : $product->description : '-' }}</td>
                    <td><a href="#" onclick="openModal({{ $product->id  }})"><i class="fa fa-eye text-info"></i></a></td>
                    <td><a href="{{ route('products.edit', ['product' => $product]) }}"><i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i></td>
                    <td><i class="fa fa-times text-danger" aria-hidden="true"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal" tabindex="-1" role="dialog" id="productModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
    </script>
@endsection