function validContact(){
    if(!isEmpty('contact_name')){
        alert('Hãy nhập họ và tên của bạn.');
        $('#contact_name').focus();
        return false;
    }
    if(!isPhone('contact_phone')){
        alert('Số điện thoại không đúng.');
        $('#contact_phone').focus();
        return false;
    }
    if(!isEmail($('#contact_email').val())){
        alert('Địa chỉ email không đúng.');
        $('#contact_email').focus();
        return false;
    }
    if(!isEmpty('message')){
        alert('Hãy nhập nội dung.');
        $('#message').focus();
        return false;
    }
    if(!isEmpty('txtCaptcha')){
        alert('Hãy nhập Mã bảo mật.');
        $('#txtCaptcha').focus();
        return false;
    }
    document.forms['frm_contact'].submit();
}