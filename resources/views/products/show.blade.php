<div class="modal-header">
    <h5 class="modal-title">{{ $product->name }}</h5>
</div>
<div class="modal-body">
    <h5>Description:</h5>
    <p>{{ $product->description ? $product->description : '-' }}</p>
    <br>
    <h5>Price:</h5>
    <p>{{ $product->price ? '€' . $product->price : '-' }}</p>
    <br>

</div>