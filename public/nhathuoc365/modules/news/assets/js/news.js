//$(window).load(function(){
//    var x= $('#aside .banner-sidebar').position();
//    var x2= $('#block-products-seen').position();
//    if (!x2) {
//        x2 = $('footer').position();
//    }
//    var h = $('#aside .banner-sidebar').height();
//    $(window).scroll(function(){
//        if ($(this).scrollTop() > x.top && $(this).scrollTop() < x2.top - h) {
//            $('#aside .banner-sidebar').css({
//                position: 'fixed',
//                top: '0'
//            });
//        } else {
//            $('#aside .banner-sidebar').css({
//                position: 'inherit',
//                top: 'inherit'
//            });
//          }
//    });
//});
$(document).ready(function() {
    var $id = $('input#category_id').val();
    $('ul.cats li.menu-'+$id).addClass('selected');
    $('ul.cats li.selected').parent().parent('li').addClass('selected');
    $('.show-cat').click(function(event) {
        $('#aside .sidebar-content').slideToggle();
    });
});
