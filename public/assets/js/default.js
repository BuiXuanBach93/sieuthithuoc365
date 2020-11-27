$(document).ready(function () {
    
    $(window).scroll(function(e){ 
  var $el = $('.fix_prd_seen'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
  if ($(this).scrollTop() > 1300 && !isPositionFixed){ 
    $('.fix_prd_seen').css({'position': 'fixed', 'top': '10px'}); 
  }
  if ($(this).scrollTop() < 1200 && isPositionFixed)
  {
    $('.fix_prd_seen').css({'position': 'static', 'top': '0px'}); 
  } 
});
    
    
    $('.owl-carousel-product-seen').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    $('.owl-carousel-product-seen-2').owlCarousel({
        loop: false,
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
});

