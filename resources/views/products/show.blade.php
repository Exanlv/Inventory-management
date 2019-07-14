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
    @if($product->images->all())
        @component('components.carousel', ['images' => $product->images->all()])
        @endcomponent
    @endif
    <!-- @foreach($product->images->all() as $image) -->
        <!-- <p>{{ $image->path }}</p> -->
    <!-- @endforeach -->
</div>