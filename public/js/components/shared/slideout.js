$('.component-shared-slideout .button').click(function() {
    var slideout = $(this).parent();
    var vee = $(this).children()[0];
    var content = $(slideout).children()[1];

    switch ($(slideout).data('open')) {
        case true:
            $(slideout).data('open', 'closing');

            $(vee).animate({  borderSpacing: 0 }, {
                step: function(now,fx) {
                    $(this).css('-webkit-transform','rotate('+now+'deg)'); 
                    $(this).css('-moz-transform','rotate('+now+'deg)');
                    $(this).css('transform','rotate('+now+'deg)');
                }},
                100
            );

            $(content).animate({'height': '0px'}, $(content).outerHeight() * 5, () => {
                $(content).css({'display': 'none', 'height': 'auto'});
                $(slideout).data('open', false);
            });

            break;

        case false:
            $(slideout).data('open', 'opening');

            $(vee).animate({  borderSpacing: 180 }, {
                step: function(now,fx) {
                    $(this).css('-webkit-transform','rotate('+now+'deg)'); 
                    $(this).css('-moz-transform','rotate('+now+'deg)');
                    $(this).css('transform','rotate('+now+'deg)');
                }},
                100
            );

            var contentHeight = $(content).actual('outerHeight');
            $(content).css({'display': 'block', 'height': '0'});
            $(content).animate({'height': contentHeight + 'px'}, contentHeight * 5, () => {
                $(content).css('height', 'auto');
                $(slideout).data('open', true);
            });

            break;
    }
});