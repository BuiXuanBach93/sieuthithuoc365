$(document).ready(function () {
    // $('.block-menu-banner ul li:nth-child(1)').addClass('active');
    $('.block-menu-banner ul li').mouseover(function () {
        $('.block-menu-banner ul li').removeClass('active');
        $(this).addClass('active');
    });
    $('.block-menu-banner ul').mouseout(function (event) {
        $('.block-menu-banner ul li').removeClass('active');
        // $('.block-menu-banner ul li:nth-child(1)').addClass('active');
    });

    $('.rated').raty({
        readOnly: true,
        score: function () {
            return $(this).attr('data-score');
        }
    });
    $('#same_products .block-content').owlCarousel({
        nav: true,
        items: 5,
      
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 2
            },
            500: {
                items: 3
            },
            800: {
                items: 3
            },
            900: {
                items: 5
            }
        }
    });

    $('footer .block-news-product .block-content').owlCarousel({
        // loop:true,
        nav: true,
        items: 5,
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
            800: {
                items: 3
            },
            900: {
                items: 5
            }
        }
    });

    $('.block-categories-default .block-news-product .block-content').owlCarousel({
        // loop:true,
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
            800: {
                items: 3
            },
            900: {
                items: 4
            }
        }
    });



    $('.web-pagination .disable').click(function (event) {
        event.preventDefault();
    })
});

function validEmailGetNews($gender) {
    if (!isEmail($('#EmailGetNews').val())) {
        alert('Email của bạn không đúng');
        $('#EmailGetNews').focus();
        return false;
    }
    var email = $('#EmailGetNews').val();
    var gd = $gender;
    $.ajax({
        type: 'POST',
        url: '/index.php?module=ajax&view=ajax&task=saveGetNews&raw=1',
        dataType: 'json',
        data: {email: email, gender: gd},
        success: function (data) {
            alert('Chúng tôi đã nhận được yêu cầu của bạn.');
            $('#EmailGetNews').val('');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
        }
    });
}

function valid_phone_popup() {
    // if (!isEmail($('#email_popup').val())) {
    //     alert('Email của bạn không đúng');
    //     $('#email_popup').focus();
    //     return false;
    // }
     if ($('#phone_popup').val()=='') {
        alert('Vui lòng nhập số điện thoại');
        $('#phone_popup').focus();
        return false;
    }
    var phone = $('#phone_popup').val();
     var email = $('#email_popup').val();
  
    $.ajax({
        type: 'POST',
        url: '/index.php?module=ajax&view=ajax&task=saveGetPhone&raw=1',
        dataType: 'json',
        data: {email: email,phone:phone},
        success: function (data) {
            alert('Chúng tôi đã nhận được yêu cầu của bạn.');
            $('#phone_popup').val('');
            $('#myModal_popup').hide();

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
        }
    });
}


//responsive
$(document).ready(function () {
    // if($(window).width() < 1170){
    $('.navigation .main-nav').click(function () {
        $(this).children('.block-menu-banner-default').toggleClass('active');
        $('.navigation .block-menu-tablet ul').removeClass('active');
    });
    // }
    $('.navigation .block-menu-tablet .view-more').click(function () {
        $(this).siblings('ul').toggleClass('active');
        $('.navigation .main-nav .block-menu-banner-default').removeClass('active');
    });

    $('.block-news-slideshow .block-heading .show').click(function () {
        $(this).siblings('.mb').slideToggle();
    })
});


//show menu left
$(document).ready(function () {
    $('.danhmuc').click(function(){
        $('.bmb-menu').toggle();
    })
});