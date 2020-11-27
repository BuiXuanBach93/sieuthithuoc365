
$(window).load(function () {
//    $('.slider-rating').owlCarousel({
//        loop: true,
//        margin: 20,
//        items: 3,
//        dots: false,
//        navText: [" ", " "],
//        responsiveClass: true,
//        responsive: {
//            0: {
//                items: 1,
//                nav: true,
//                dots: false
//
//            },
//            400: {
//                items: 1,
//                nav: true,
//                dots: false
//            },
//            600: {
//                items: 1,
//                nav: true,
//                dots: false
//            },
//            835: {
//                items: 1,
//                nav: true,
//                dots: false
//            }
//        }
//    });
    $('.rating-car-detail').raty({
        halfShow: false,
        readOnly: true,
        score: function () {
            return $(this).attr('data-rating');
        },
        starOff: '../images/star-empty-rating.png',
        starOn: '../images/star-fill-rating.png',
    });

//    var ratingconfig = {
//        animate: true,
//        duration: 100,
//        ease: "easeOutBounce",
//        maxRating: 90,
//        wrapperWidth: 140,
//        showText: false,
//        wrapperClass: "wrapper-quality",
//        innerClass: "inner-quality",
//        textClass: "rating-quality"
//    }
//    $('.price-rate').ratingbar(ratingconfig);

});



$(document).ready(function () {
//    var rep_id = $('#vl_rating').val();
   
    var exit_log = $('#check_login').val();

    $('.rep_click').click(function () {
         var rep_id = $(this).attr('data-id');
        if (exit_log) {
            $('.item-rating-' + rep_id).toggle();
        } else {
            alert('Bạn cần đăng nhập để thực hiện chức năng này!');
        }

    });


    $('#rep_rating_prd').click(function () {
        if (checkFormsubmit()) {
            document.rep_rating.submit();
        }
    });
    $('.bt-write-rating').click(function () {
//window.location.href = "http://carly.local/danh-gia-xe.html#tabs-2";
            document.write_rating.submit();

    });


});


function checkFormsubmit()
{
    if (!isEmpty('comment'))
    {
        alert('Bạn chưa nhập nội dung!');
        return false;
    }
 
return true;

}
    $(document).ready(function () {
        $('div#raty-id').raty({
            half: false,
            hints: ['Thất vọng', 'Dưới trung bình', 'Bình thường', 'Hài lòng', 'Rất hài lòng'],
            click: function (score, evt) {
                $('#product_score').val(score);
            }
        });


        $('div#raty-display').raty({
            half: false,
            readOnly: true,
            starType: 'i',
            hints: ['Thất vọng', 'Dưới trung bình', 'Bình thường', 'Hài lòng', 'Rất hài lòng'],
            score: function () {
                return $(this).attr('raty-score');
            }
        });

        $('div.raty-item').raty({
            half: false,
            readOnly: true,
            starType: 'i',
            hints: ['Thất vọng', 'Dưới trung bình', 'Bình thường', 'Hài lòng', 'Rất hài lòng'],
            score: function () {
                return $(this).attr('raty-score');
            }
        });
    });