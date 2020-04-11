(function () {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({
        styler: "fb",
        cursorcolor: "#4a9cfd",
        cursorwidth: '6',
        cursorborderradius: '10px',
        background: '#FFFFFF',
        spacebarenabled: false,
        cursorborder: '0',
        zindex: '1000'
    });

    $(".scrollbar1").niceScroll({
        styler: "fb",
        cursorcolor: "#4a9cfd",
        cursorwidth: '6',
        cursorborderradius: '0',
        autohidemode: 'false',
        background: '#FFFFFF',
        spacebarenabled: false,
        cursorborder: '0'
    });


    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);

(function () {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({
        styler: "fb",
        cursorcolor: "#e53238",
        cursorwidth: '6',
        cursorborderradius: '10px',
        background: '#FFFFFF',
        spacebarenabled: false,
        cursorborder: '0',
        zindex: '1000'
    });

    $(".scrollbar1").niceScroll({
        styler: "fb",
        cursorcolor: "#e53238",
        cursorwidth: '6',
        cursorborderradius: '0',
        autohidemode: 'false',
        background: '#FFFFFF',
        spacebarenabled: false,
        cursorborder: '0'
    });


    $(".scrollbar1").getNiceScroll();
    if ($('nav.gn-menu-wrapper').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

})(jQuery);


$(function () {
    $('.toggle-class').change(function () {
        let status = $(this).prop('checked') == true ? 1 : 0;
        let house_id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: {status: status, id: house_id},
            success: function (data) {
                toastr.success(data.success);
            }
        });
    })
})
