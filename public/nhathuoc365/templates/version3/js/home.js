// $(document).ready(function () {
//     var banner = $('.banner_left .item a');
//     var offset = banner.offset().top;
//     var main = $(".main-ctn").height();
//     var x = $(".main-ctn").width();
//     var padd = (x-1170)/2 -80;
//     var max = main + offset - 210;
//     banner.attr("style","top : 210px;bottom : 10px;");
//     $(window).on('scroll', function () {
//         var offset_fix = banner.offset().top;
//         if (banner.is(":visible"))
//         {
//             var top = $(this).scrollTop();
//             var val = top - offset + 210;
//             // console.log(max);
//             if (top > offset && top < max) {
//                 banner.attr("style","top : "+val+"px;bottom : 10px;");
//             }
//             else if (top <= offset) {
//                 banner.attr("style","top : 210px;bottom : 10px;");
//             }
//         }
//     });
// });
// $(document).ready(function () {
//     var banner_r = $('.banner_right .item a');
//     var offset = banner_r.offset().top;
//     var main = $(".main-ctn").height();
//     var x = $(".main-ctn").width();
//     var padd = (x-1170)/2 -80;
//     var max = main + offset - 210;
//     banner_r.attr("style","top : 210px;bottom : 10px;");
//     $(window).on('scroll', function () {
//         var offset_fix = banner_r.offset().top;
//         if (banner_r.is(":visible"))
//         {
//             var top = $(this).scrollTop();
//             var val = top - offset + 210;
//             // console.log(max);
//             if (top > offset && top < max) {
//                 banner_r.attr("style","top : "+val+"px;bottom : 10px;");
//             }
//             else if (top <= offset) {
//                 banner_r.attr("style","top : 210px;bottom : 10px;");
//             }
//         }
//     });
// });


$(document).ready(function () {
    $('.block-product-slideshow .block-content').owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        autoplay: true,
        interval: 1200,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
    });
    $('.block-news-slideshow .block-content').owlCarousel({
        loop: true,
        nav: true,
        items: 4,
        margin: 10,
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
    $('.t_p').click(function () {
        $('.mask_1').toggle();
        $('.product_views').toggleClass('show_p_s');
    })
    $('.mask_1').click(function () {
        $('.product_views').toggleClass('show_p_s');
        $('.mask_1').toggle();
    })


    $('#submitform').click(function () {
        if (validateRegister()) {
            document.getElementById("frmRegister").submit();
        }
    });


    $('.user_name_login').click(function () {
        $('.div_log').toggle();
    })


    $('.danhmuc').click(function () {
        $('.bmb-menu').toggleClass('action_menu_cat_mb');
    });



});
function changeCaptcha() {

    var date = new Date();
//    var url_='thegioilamdep.com';
    var url_ = location.host;

    var captcha_time = date.getTime();
    $("#imgCaptcha").attr({src: url_ + '/libraries/jquery/ajax_captcha/create_image.php?' + captcha_time});
}


