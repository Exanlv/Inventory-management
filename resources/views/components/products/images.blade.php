<div class="row">
    @foreach($images as $image)
        @component('components.products.image', ['image' => $image])
        @endcomponent
    @endforeach
</div>