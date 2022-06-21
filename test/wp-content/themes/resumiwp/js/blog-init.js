(function ($) {
    "use strict";
    $(document).ready(function () {
        if (screen.width > 600) {
            //$("html").niceScroll();
        }

        $('.top-nav').superfish();
        /*==Syntax Higlighter ===*/
        window.prettyPrint && prettyPrint();

        /*==Scroll Top===*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '<i class="fa fa-angle-double-up"></i>' // Text for element
        });

        $(' #scrollUp').smoothScroll({
            offset: -80,
            easing: 'easeInExpo',
            speed: 500,
            // $.fn.smoothScroll only: whether to prevent the default click action
            preventDefault: true
        });

        $('.navigation').waypoint('sticky', {
            stuckClass: 'sticky-nav'
        });


        $('.flickr-feed').jflickrfeed({
                limit: flickr.limit,
                qstrings: {
                    id: flickr.id
                },
                itemTemplate: '<li>' +
                    '<a href="{{image_b}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}"/></a>' +
                    '</li>'
            },
            function (data) {
                $('.flickr-feed a').magnificPopup({
                    type: 'image',

                    gallery: {
                        enabled: true
                    },
                    image: {
                        markup: '<div class="mfp-figure">' +
                            '<div class="mfp-close"></div>' +
                            '<div class="mfp-img"></div>' +
                            '<div class="mfp-bottom-bar">' +
                            '<div class="mfp-title"></div>' +
                            '<div class="mfp-counter"></div>' +
                            '</div>' +
                            '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button

                        cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor.

                        titleSrc: 'title', // Attribute of the target element that contains caption for the slide.


                        verticalFit: true, // Fits image in area vertically

                        tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
                    }

                });
            });

    });

})(jQuery);

/*==WOW JS==*/
wow = new WOW({
    animateClass: 'animated',
    offset: 0
});
wow.init();