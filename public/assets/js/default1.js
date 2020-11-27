$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
		autoplay: true,
		autoplayHoverPause: true,
        autoplayTimeout: 3000,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            800:{
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            },
            
        }
    })
});

    $('.owl-carousel').hover(function () {
        $(".owl-carousel").carousel('pause');
    }, function () {
        $(".owl-carousel").carousel('cycle');
    });


