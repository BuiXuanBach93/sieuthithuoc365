$(document).ready(function () {
    $('.other-news .list-thumb').owlCarousel({
        nav: false,
        items: 5,
        margin: 18,
        touchDrag: false,
        mouseDrag: false,
        autoplay: false,
        autoplayTimeout: 2000,
        responsive: {
            0: {
                items: 2,
                touchDrag: true,
                autoplay: true,
                mouseDrag: true
            },
            500: {
                items: 3,
                touchDrag: true,
                autoplay: true,
                mouseDrag: true
            },
            800: {
                items: 3,
                touchDrag: true,
                autoplay: true,
                mouseDrag: true
            },
            900: {
                items: 5,
                touchDrag: true,
                autoplay: true,
                mouseDrag: true
            }
        }
    });
    $('#news-content .related-products .block-content').owlCarousel({
        // loop:true,
        nav: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000
    });
});

function validateComment() {

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
        url: '/index.php?module=ajax&view=ajax&task=commentNews',
        dataType: 'json',
        data: $data,
        success: function (data) {
            if (data.error == 'false') {
                alert(data.message);
                $('#waitting').removeClass('show');
                location.reload(true);
            } else {
                alert(data.message);
                $('#waitting').removeClass('show');
                location.reload(true);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.');
            $('div#waitting').css('display', 'none');
        }
    });
}