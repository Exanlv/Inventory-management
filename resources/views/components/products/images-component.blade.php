@script('js/components/products/images.js')

<div class="component-products-images row">
    @isset($images)
        @foreach($images as $image)
            @component('components.products.image-component', ['image' => $image])
            @endcomponent
        @endforeach
    @endisset
</div>