@script('js/components/products/image.js')

<div class="col-lg-3 col-md-6 image-container component-product-image">
    <i class="fa fa-times text-danger remove-image" aria-hidden="true" data-removeurl="{{ route('products.destroyImage', ['image' => $image->id]) }}"></i>
    <img src="{{ Storage::url($image->path) }}">
</div>