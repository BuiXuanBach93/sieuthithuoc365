$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
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


