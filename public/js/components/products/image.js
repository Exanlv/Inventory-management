$('.remove-image').click(function() {

    $(this).click(() => {});
    console.log($(this).data('removeurl'));
    var parent = $(this).parent();
    $.get($(this).data('removeurl'), (data) => {
        if (data === 'true') {
            $(parent).remove();
        }
    });
});