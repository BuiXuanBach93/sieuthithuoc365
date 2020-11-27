
function submit_form_search() {
    url = '';
    // var keyword = $('#txt-search').val();
    var link_search = $('#link_search').val();

    var keyword = document.getElementById('txt-search').value;
    keyword = change_alias(keyword);

    if (keyword != '') {
        url += keyword;
        var check = 1;
    } else {
        var check = 0;
    }
    if (check == 0) {
        alert('Bạn phải nhập tham số tìm kiếm');
        return false;
    }
    // var ccode = $('#ccode_search').val();
    // var cid = $('#cid').val();

    // if (cid && ccode) {
       
    //     var link = link_search + ccode + '-p' + cid + url;
    // } else {

        var link_search = document.getElementById('link_search2').value;
        var link = link_search + url;
    // }


    window.location.href = link;
    return false;
}

//$(document).ready(function () {
//    var $query = $('#txt-search').val();
//    var $type = $(".cate_search").attr("id");
//    search($type, $query);
//
//
//    if ($("#ccode_search").val()) {
//
//        $("#link_search").attr("value", "http://thegioilamdep.local/tim-kiem-" + $("#ccode_search").val());
//    } else {
//        $("#link_search").attr("value", "http://thegioilamdep.local/tim-kiem");
//    }
//
//
//});

$('#txt-search').keypress(function () {
    var $query = $('#txt-search').val();
    var $type = $(".cate_search").attr("id");
    search($type, $query);

});
function search($type, $query) {
    $('#txt-search').autocomplete({
        serviceUrl: "/index.php?module=products&view=search&raw=1&task=get_ajax_search",
        groupBy: "brand",
        params: {"query": $query, "type": $type},
        minChars: 2,
        formatResult: function (n, t) {
            t = t.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            var i = n.data.text.split(" "), r = "";
            for (j = 0; j < i.length; j++)
                r += t.toLowerCase().indexOf(i[j].toLowerCase()) >= 0 ? "<strong>" + i[j] + "</strong> " : i[j] + " ";
            return' <a href = "' + n.value + '" > <img src = "' + n.data.image + '" /> <label> <span> ' + r + ' </span> <span class = "price"> ' + n.data.price + "</span></label></a>"
        },
        onSelect: function (n) {
            $(".control input[name=kwd]").val(n.data.text)
        }
    });
}

$("#select-search > div").click(function () {
    $(this).toggleClass("show-sub");
    $(this).children('.sub-select-search').toggle();
});

$(".item-cate-search").click(function () {
    $(this).addClass("active-cat");
    $(".text").html($(this).html());
    $(".text").attr("id", $(this).attr("id"));
    $("#ccode_search").attr("value", $(this).attr("data"));
    $("#cid").attr("value", $(this).attr("id"));
//    if ($(this).attr("data")) {
//
//        $("#link_search").attr("value", "http://thegioilamdep.local/tim-kiem-" + $(this).attr("data"));
//    } else {
//        $("#link_search").attr("value", "http://thegioilamdep.local/tim-kiem");
//    }
    $(this).siblings('.item-cate-search').removeClass("active-cat");
});

function change_alias(alias) {
    var str = alias;
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str = str.replace(/đ/g,"d");
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
    str = str.replace(/ + /g," ");
    str = str.replace(" ","-");
    str = str.trim(); 
    return str;
}