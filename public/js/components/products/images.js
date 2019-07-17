class componentProductsImages {
    static uploadField() {
        let col = $('<div class="col-lg-3 col-md-6"></div>');
        let input = $('<input class="form-control image-upload" type="file" name="images[]" accept=".png,.jpeg,.jpg">')

        $(input).change(function() {
            $($($(this).parent()).parent()).trigger('update');
            console.log($(this).val())
        });

        $(col).append(input);

        return col;
    }
}

$('.component-products-images').on('update', function() {
    var lastField = $(this).children().last().children().last()[0];
    if ($(this).children().length < 10 && ((!lastField || $(lastField).prop('tagName') !== 'INPUT') || $(lastField).val())) {
        $(this).append(componentProductsImages.uploadField());
    }
});

$('.component-products-images').trigger('update');
