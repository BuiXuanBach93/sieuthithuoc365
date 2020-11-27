$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'top'
    });


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


               //click call form call 2
    $('.submit_phone_2_no-use').click(function () {
        var id_ = $(this).attr('data-id');
        
        var $link_ = $(this).attr('data-link');
        var phone = $('#txt_phone_'+id_).val();
      
        if ($('#txt_phone_'+id_).val() == '') {
            alert('Vui lòng nhập số điện thoại!.');
            $('#txt_phone_'+id_).focus();
            return false;
        }
        if ($('#txt_phone_'+id_).val().length < 9) {
            alert('Số điện thoại không đúng!.');
            $('#txt_phone_'+id_).focus();
            return false;
        }
        re = /^[0-9 .]+$/;
        if (!re.test($('#txt_phone_'+id_).val())) {
            alert('Số điện thoại không đúng định dạng.');
            $('#txt_phone_'+id_).focus();
            return false;
        }

        

        $('.animationload').show();
        $.ajax({
            type: 'POST',
            url: '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
            dataType: 'json',
            data: {link: $link_, txtphone: phone},
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