$(document).ready(function () {
    $('.add-cart').click(function () {
        var id = $(this).attr('data-id');
        var quantity = $('#input_quantity').val();
        var releated = $('#formQuantity #product_related').val();

        $.ajax({
            type: 'POST',
            url: '/index.php?module=product&view=cart&raw=1&task=addCart',
            dataType: 'json',
            data: {id: id, quantity: quantity, releated: releated},
            success: function (data) {
                // alert(data.message);
                $('.popup_cart,.mask').fadeIn();
                $('.popup_cart .content').append(data.message);
                $('header .wrapper .hotline-cart .cart a:nth-child(2)').text(data.count + ' sản phẩm');
                // location.reload(true);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
            }
        });
    });

// check không hiển thị popup lần sau
    $('.btn_ok').click(function () {
        var id = $(this).attr('data-id');
        if($("#check_note").is(':checked')){
            $.ajax({
            type: 'POST',
            url: '/index.php?module=product&view=product&raw=1&task=add_list_note',
            dataType: 'json',
            data: {id: id},
            success: function (data) {
                // alert(data.message);
                $("#popup_prd").modal('hide');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.sssss');
            }
        });
        }else{
            $("#popup_prd").modal('hide');
        }



    });



});


$(document).ready(function () {

//scroll đặt hàng chi tiết sản phẩm
$('.dathang ').addClass('original').clone().insertAfter('.dathang ').addClass('cloned').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

scrollIntervalID = setInterval(stickIt, 10);

function stickIt() {

  var orgElementPos = $('.original').offset();
  orgElementTop = orgElementPos.top;               

  if ($(window).scrollTop() >= (orgElementTop)) {
    // scrolled past the original position; now only show the cloned, sticky element.

    // Cloned element should always have same left position and width as original element.     
    orgElement = $('.original');
    coordsOrgElement = orgElement.offset();
    leftOrgElement = coordsOrgElement.left;  
    widthOrgElement = orgElement.css('width');
    $('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).show();
    $('.original').css('visibility','hidden');
  } else {
    // not scrolled past the menu; only show the original menu.
    $('.cloned').hide();
    $('.original').css('visibility','visible');
  }
}

    //tăng giảm số lượng
    $num_ = $('.input_quantity').val();

    $('.giam_sl').click(function () {
//        $num_ac = $num_--;
        if ($num_ == 1) {
            $('#input_quantity').val($num_);
        } else {
            $num_ac = $num_--;

            $('#input_quantity').val($num_ac);
        }

    });


    $('.tang_sl').click(function () {
     
        if($num_== 9){
               $('#input_quantity').val($num_);
        }else{
               $num_ac = $num_++;
                $('#input_quantity').val($num_ac);
        }
       
    });



});

$(document).ready(function () {
$(function() {
  $('.dat_hang').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $('.tuvan').offset().top}, 500, 'linear');
  });
    $('.dathang_tuvan').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $('.tuvan').offset().top}, 500, 'linear');
  });
  
  
});


//click đặt hàng
$('#btn_dathang').click(function(){
    if(validate_dathang()){
        $('.animationload').show();
            document.frm_dathang.submit();
    }
});


})

function validate_dathang() {
    //    if ($('#name_customer').val() == '') {
    //     alert('Bạn vui lòng nhập tên của bạn.');
    //     $('#name_customer').focus();
    //     return false;
    // }
    //    if ($('#address').val() == '') {
    //     alert('Bạn vui lòng nhập địa chỉ giao hàng.');
    //     $('#address').focus();
    //     return false;
    // }
       if ($('#phone').val() == '') {
        alert('Bạn vui lòng nhập số điện thoại liên hệ.');
        $('#phone').focus();
        return false;
    }
    return true;
}

function validateComment() {

    if ($('#frmComment input[name="score"]').val() == 0) {
        alert('Bạn chưa đánh giá sản phẩm');
        $('#frmComment input[name="score"]').focus();
        return false;
    }
    if ($('#txtCom').val() == '') {
        alert('Bạn vui lòng nhập bình luận.');
        $('#txtCom').focus();
        return false;
    }
    if ($('#txtName').val() == '') {
        alert('Bạn vui lòng nhập tên.');
        $('#txtName').focus();
        return false;
    }
    if (!isEmail($('#txtMail').val())) {
        alert('Hãy nhập địa chỉ Email.');
        $('#txtMail').focus();
        return false;
    }
    if ($('#txtCode').val() == '') {
        alert('Bạn vui lòng nhập mã bảo mật.');
        $('#txtCode').focus();
        return false;
    }
    var $data = $('form#frmComment').serialize();
    $('#waitting').addClass('show');
    $.ajax({
        type: 'POST',
        url: '/index.php?module=ajax&view=ajax&task=commentProduct',
        dataType: 'json',
        data: $data,
        success: function (data) {
            if (data.error == 'false') {
//                alert('Cám ơn bạn đã quan tâm đến sản phẩm của chúng tôi.');
                alert(data.message);
                $('#waitting').removeClass('show');
                location.reload(true);
            } else {
                alert(data.message);
                $('#waitting').removeClass('show');
//                location.reload(true);
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
//            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
            alert(data.message);
            $('div#waitting').css('display', 'none');
        }
    });
}
;
$(document).ready(function () {

    /* Tabs */
    /* $("#product-detail ul").idTabs();*/
    $('#quantity').change(function () {
        var $obj = $('.bound-quantity a.add-cart');
        $id = $obj.attr('data-id');
        $quantity = $(this).val();
        $('.bound-quantity a.add-cart').attr('href', '/index.php?module=product&view=cart&task=addCart&id=' + $id + '&quantity=' + $quantity)
    });

    $('ul.tabs li a.tabs-label').click(function () {
        $('ul.tabs li').removeClass('selected');
        $(this).parent().addClass('selected');
        $('.tabs-content').removeClass('selected');
        var $tab = $(this).attr('data-content');
        $('#' + $tab).addClass('selected');
    });

    $('#product-faqs .faq-heading a').click(function () {
        $(this).parent().parent().toggleClass('selected');
    });

});


function quickBuy($id, $link) {

    $.ajax({
        type: 'POST',
        url: '/index.php?module=product&view=product&raw=1&task=quickBuy',
        dataType: 'json',
        data: {id: $id, link: $link},
        success: function (json) {
            $('#TB_window,.mask').fadeIn();
            $('#TB_window .box-popup .bp-content').append(json.html);
            // location.reload(true);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
//            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nốdddddddddddddddddddddddi.');
        }
    });
}

function validquickBuy() {
    if ($('#qname').val() == '') {
        Boxy.alert('Bạn vui lòng nhập tên.', function () {
            $('#qname').focus();
        }, {title: 'Thông báo.', afterShow: function () {
                $('#boxy_button_OK').focus();
            }});
        return false;
    }
    if ($('#qmobile').val() == '') {
        Boxy.alert('Bạn vui lòng nhập số điện thoại.', function () {
            $('#qmobile').focus();
        }, {title: 'Thông báo.', afterShow: function () {
                $('#boxy_button_OK').focus();
            }});
        return false;
    }
    if ($('#qaddress').val() == '') {
        Boxy.alert('Bạn vui lòng nhập địa chỉ.', function () {
            $('#qaddress').focus();
        }, {title: 'Thông báo.', afterShow: function () {
                $('#boxy_button_OK').focus();
            }});
        return false;
    }
    var $data = $('form#frm_quick_buy').serialize();
    $('#waitting').show();
    $.ajax({
        type: 'POST',
        url: '/index.php?module=ajax&view=ajax&task=frm_quick_buy&raw=1',
        dataType: 'json',
        data: $data,
        success: function (data) {
            Boxy.alert(data.message, function () {
                $('#waitting').hide();
                if (data.error == false) {
                    location.reload(true)
                }
            }, {title: 'Thông báo.', afterShow: function () {
                    $('#boxy_button_OK').focus();
                }});
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            Boxy.alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.', function () {
                $('div#waitting').css('display', 'none');
            }, {title: 'Thông báo.', afterShow: function () {
                    $('#boxy_button_OK').focus();
                }});
        }
    });
    return false
}
;
function valid_quick_buy() {
    if ($('#txt_name').val() == '') {
        alert('Vui lòng nhập tên của bạn!');
        $('#txt_name').focus();
        return false;
    }
    if ($('#txt_mobile').val() == '') {
        alert('Vui lòng nhập số điện thoại!');
        $('#txt_mobile').focus();
        return false;
    }
    if (!isPhone('txt_mobile')) {
        alert('Số điện thoại không đúng.');
        $('#txt_mobile').focus();
        return false;
    }
    if ($('#txt_address').val() == '') {
        alert('Vui lòng nhập địa chỉ!');
        $('#txt_address').focus();
        return false;
    }
    if ($('#txt_content').val() == '') {
        alert('Vui lòng nhập nội dung!');
        $('#txt_content').focus();
        return false;
    }
    var $data = $('form#frm_callme').serialize();
    $('#btn-quick-popup').addClass('sending');
    $.ajax({
        type: 'POST',
        url: '/index.php?module=product&view=product&raw=1&task=saveQuick',
        dataType: 'json',
        data: $data,
        success: function (data) {
            alert(data.message);
            location.reload(true);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
            location.reload(true);
        }
    });
    return true;
}

$('.related_products_detail').click(function () {
    var $price = parseInt($('#product_price').val());

    var checkedVals = $('.related_products_detail:checkbox:checked').map(function () {
        return this.value;
    }).get();

    $ids = checkedVals.join(",");

    $('#product_related').val($ids);

    var $arrIds = $ids.split(',');
    $(".related_products").prop('checked', false);
    if ($ids != '')
        $.each($arrIds, function (key, value) {
            $(".related_" + value).prop('checked', true);
            $price = $price + parseInt($('#product_price_' + value).val());
        });

    $('span.price-all').html($.number($price, 0, ',', '.') + ' đ');

    var $obj = $('#add-cart-detail');
    $id = $obj.attr('data-id');
    $related = $('#product_related').val();
    $('a.add-cart').attr('href', '/dat-mua-' + $id + '?related=' + $related)
});

$('.related_products_quick').click(function () {

    var $price = parseInt($('#product_price').val());
    var $price_release = parseInt($('#product_price_').val());

    var checkedVals = $('.related_products_quick:checkbox:checked').map(function () {
        return this.value;
    }).get();

    $ids = checkedVals.join(",");

    $('#product_related').val($ids);

    var $arrIds = $ids.split(',');

    $(".related_products").prop('checked', false);
    if ($ids != '')
        $.each($arrIds, function (key, value) {
            $(".related_" + value).prop('checked', true);
            $price = $price + parseInt($('#product_price_' + value).val());
        });

    $('span.price-all').html($.number($price, 0, ',', '.') + ' đ');

    var $obj = $('#add-cart-detail');
    $id = $obj.attr('data-id');
    $related = $('#product_related').val();
//    $('a.add-cart').attr('href', '/gio-hang')
//    $('a.add-cart').attr('href', '/dat-mua-' + $id + '?related=' + $related)
});
$('.rated3').raty({
    readOnly: true,
    score: function () {
        return $(this).attr('data-score');
    },
    starOff: 'templates/version3/scss/images/star-off.png',
    starOn: 'templates/version3/scss/images/star-on.png'
});
$('.rated2').raty({
    readOnly: true,
    score: function () {
        return $(this).attr('data-score');
    },
    starOff: 'templates/version3/scss/images/star-off2.png',
    starOn: 'templates/version3/scss/images/star-on1.png'
});

