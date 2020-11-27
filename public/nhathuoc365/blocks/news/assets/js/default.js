$(document).ready(function () {
      $('.owl-carousel-story').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:true,
    autoplay: true,
     autoplayTimeout: 5000,
    dotData:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        800:{
            items:3
        },
        1200:{
            items:4
        }
    }
});

    $('.block-news-product .block-content').owlCarousel({
         loop:true,
        nav: true,
        items: 4,
        margin: 15,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 2
            },
            500: {
                items: 3
            },
            650: {
                items: 4
            },
            900: {
                items: 4
            }
        }
    });  


});