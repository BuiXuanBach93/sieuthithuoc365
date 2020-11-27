var is_rewrite = 0;
var root = 'http://localhost:3012/';
function fsAlert($option){
    $option = $option||{};
    var box = $("<div></div>");
    box.html($option.msg).dialog({
        modal: true, 
        title: 'Thông báo', 
        buttons: { 
            Ok: function() {
                $.isFunction($option.func) && ($option.func)();
                $(this).dialog('destroy').remove();
            }
        }
    }).dialog('open');
    return false;
}

function changeCaptcha(){
        var url_=window.location.protocol + "//" + window.location.hostname;
	var date = new Date();
	var captcha_time = date.getTime();
	$("#imgCaptcha").attr({src:url_+'/libraries/jquery/ajax_captcha/create_image.php?'+captcha_time});
}

function isEmail(email) {
	var re = /^(\w|[^_]\.[^_]|[\-])+(([^_])(\@){1}([^_]))(([a-z]|[\d]|[_]|[\-])+|([^_]\.[^_])*)+\.[a-z]{2,3}$/i
	return re.test(email);
}

function isPhone(elemid){
	elem  = $('#'+elemid);
	var numericExpression = /^[0-9 .]+$/;
	if(elem.val().match(numericExpression) && elem.val().length >7 && elem.val().length < 13){
		return true;
	}else{
		return false;
	}
}

function isEmpty(elemid){
	elem  = $('#'+elemid);
	if(elem.val().length == 0){
		elem.focus(); // set the focus to this input
		return false;
	}
	else
	{
		return true;
	}
}

function submitSearch(){
	url = '';
	var keyword = $('#keyword').val();
	keyword  = keyword.replace(/[ ]/g,'-');
	var link_search = $('#link_search').val();
	if(keyword!= '' && keyword != '')	{
		url += 	'&keyword='+keyword;
		var check = 1;
	}else{
		var check =0;
	}
	if(check == 0){
		alert('Bạn phải nhập tham số tìm kiếm');
		return false;
	}
	if(link_search.indexOf("&") == '-1')
		var link = link_search+'/'+keyword;
	else
		var link = link_search+'&keyword='+keyword;
	    window.location.href=link;
	    return false;
}

function validMCallMe(){
    if(!isPhone('txtmphone')) {
        Boxy.alert('Bạn vui lòng nhập số điện thoại.',function(){ $('#qmobile').focus();},{title:'Thông báo.',afterShow: function() {$('#boxy_button_OK').focus();}});
      	return false;
   	}
    var $data = $('form#frm_call_me').serialize();
	$.ajax({
		type : 'POST',
		url : '/index.php?module=ajax&view=ajax&task=call_me&raw=1',
		dataType : 'json',
		data: $data,
		success : function(data){Boxy.alert(data.message,function(){if (data.error==false) {location.reload(true)}},{title:'Thông báo.',afterShow: function() { $('#boxy_button_OK').focus();} });},
		error : function(XMLHttpRequest, textStatus, errorThrown) {Boxy.alert('Có lỗi trong quá trình đưa lên máy chủ. Xin bạn vui lòng kiểm tra lại kết nối.',function(){},{title:'Thông báo.',afterShow: function() { $('#boxy_button_OK').focus();} });
		}
	});
    return false;
}

function isInteger(value) {
    for (i = 0; i < value.length; i++) {
        if ((value.charAt(i) < '0') || (value.charAt(i) > '9')) return false
    }
    return true;
}
	
$('a#gotop').click(function(){
    $('html, body').animate({scrollTop:0},'slow');
})

$(document).ready(function() {
    $('ul.cats li.selected').parent().parent('li').addClass('selected');
    
    $('.cart .show-cart').click(function(){
        tb_show('Giỏ hàng', '/index.php?module=product&view=cart&raw=1&task=display_ajax&width=865');
    });
});

jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});