$('.component-products-image .remove-image').click(function() {

    $(this).click(() => {});
    var parent = $(this).parent();
    $.get($(this).data('removeurl'), (data) => {
        if (data === 'true') {
            $(parent).remove();
        }
    });

    $($(parent).parent()).trigger('update');
});