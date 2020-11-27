function callme() {

    document.getElementById("frmNewsletter").submit();
}

$(document).ready(function () {
    
    //click call form call 1
    $('.submit_phone').click(function () {
        var $id_ = $(this).attr('data-id');
        if ($('#txtbmphone_sp').val() == '') {
            alert('Vui lòng nhập số điện thoại!.');
            $('#txtbmphone_sp').focus();
            return false;
        }
        if ($('#txtbmphone_sp').val().length < 9) {
            alert('Số điện thoại không đúng!.');
            $('#txtbmphone_sp').focus();
            return false;
        }
        re = /^[0-9 .]+$/;
        if (!re.test($("#txtbmphone_sp").val())) {
            alert('Số điện thoại  không đúng định dạng.');
            $('#txtbmphone_sp').focus();
            return false;
        }

        var $link_ = $(this).attr('data-link');
        var $phone = $('#txtbmphone_sp').val();

        $.ajax({
            type: 'POST',
            url: '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
            dataType: 'json',
            data: {link: $link_, txtphone: $phone},
            success: function (data) {
                  $('.submit_phone').off('click');
                 alert(data.message);
                  location.reload();
               
            },
//            error: function (XMLHttpRequest, textStatus, errorThrown) {
//                alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
//                $('.block-callme .box-form').removeClass('sending');
//            }
        });

    });
    
        //click call form call 2
    $('.submit_phone_1').click(function () {
        var $id_ = $(this).attr('data-id');
        if ($('#txt_phone').val() == '') {
            alert('Vui lòng nhập số điện thoại!.');
            $('#txt_phone').focus();
            return false;
        }
        if ($('#txt_phone').val().length < 9) {
            alert('Số điện thoại không đúng!.');
            $('#txt_phone').focus();
            return false;
        }
        re = /^[0-9 .]+$/;
        if (!re.test($("#txt_phone").val())) {
            alert('Số điện thoại  không đúng định dạng.');
            $('#txt_phone').focus();
            return false;
        }

        var $link_ = $(this).attr('data-link');
        var $phone = $('#txt_phone').val();

        $('.animationload').show();
        $.ajax({
            type: 'POST',
            url: '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
            dataType: 'json',
            data: {link: $link_, txtphone: $phone},
            success: function (data) { 
                  // $('.submit_phone_1').off('click');
                  
                  if(data.error==false){
                     alert(data.message);
                     location.reload();
                  }else{
                    alert(data.message);
                  }
                  
               
            },
           error: function (XMLHttpRequest, textStatus, errorThrown) {
               alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
               $('.block-callme .box-form').removeClass('sending');
           }
        });

    });


            //click call form call chuyen trang
    $('.submit_phone_spe').click(function () {
        var $id_ = $(this).attr('data-id');
        if ($('#txtbmphone_sp').val() == '') {
            alert('Vui lòng nhập số điện thoại!.');
            $('#txtbmphone_sp').focus();
            return false;
        }
        if ($('#txtbmphone_sp').val().length < 9) {
            alert('Số điện thoại không đúng!.');
            $('#txtbmphone_sp').focus();
            return false;
        }
        re = /^[0-9 .]+$/;
        if (!re.test($("#txtbmphone_sp").val())) {
            alert('Số điện thoại  không đúng định dạng.');
            $('#txtbmphone_sp').focus();
            return false;
        }

        var $link_ = $(this).attr('data-link');
        var $phone = $('#txtbmphone_sp').val();

        $('.animationload').show();
        $.ajax({
            type: 'POST',
            url: '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
            dataType: 'json',
            data: {link: $link_, txtphone: $phone},
            success: function (data) { 
                  // $('.submit_phone_1').off('click');
                  
                  if(data.error==false){
                     alert(data.message);
                     location.reload();
                  }else{
                    alert(data.message);
                  }
                  
               
            },
           error: function (XMLHttpRequest, textStatus, errorThrown) {
               alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
               $('.block-callme .box-form').removeClass('sending');
           }
        });

    });

});

function validBCallMe() {
    alert(1111);
//        if ('#txtbmphone').val() =='') {
//            alert('Bạn vui lòng nhập số điện thoại.');
//            $('#txtbmphone').focus();
//            return false;
//        }
    $('.block-callme .box-form').addClass('sending');
    var $data = $('form#frm_block_call_me<?php echo $id ?>').serialize();
    $.ajax({
        type: 'POST',
        url: '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
        dataType: 'json',
        data: $data,
        success: function (data) {
            alert('Chúng tôi đã nhận được yêu cầu của bạn và sẽ gọi cho bạn trong thời gian sớm nhất.');
            $('.block-callme .box-form').removeClass('sending');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
            $('.block-callme .box-form').removeClass('sending');
        }
    });
    return false;
}