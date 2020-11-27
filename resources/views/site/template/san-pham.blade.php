<!DOCTYPE html >
<html mlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#" class="no-js">
<head>
  <title>@yield('title')</title>
  <!-- meta -->
  <meta name="ROBOTS" content="index, follow" />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@yield('meta_description')" />
  <meta name="keywords" content="@yield('keywords')" />
  <!-- facebook gooogle -->
  <!-- <meta property="fb:app_id" content="" />
  <meta property="fb:admins" content=""> -->

  <link rel="icon" href="{{ !empty($information['icon']) ?  asset($information['icon']) : '' }}" type="image/x-icon" />

  <meta property="og:url"                content="@yield('meta_url')" />
  <meta property="og:type"               content="Website" />
  <meta property="og:title"              content="@yield('title')" />
  <meta property="og:description"        content="@yield('meta_description')" />
  <meta property="og:image"              content="@yield('meta_image')" />

 <!--  <base href="{{ isset($domainUrl) ? $domainUrl : ''}}"> -->
  <base href="{{ isset($information['domain']) ? $information['domain'] : '' }}">
 
  <link href="//fonts.googleapis.com/css?family=Roboto:300italic,300,400italic,400,700italic,700" rel="stylesheet" type="text/css"/>
  <link rel="canonical" href="@yield('meta_url')" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/bootstraps/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/products_sale/assets/css/slideshow.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/banners/assets/css/default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/categories/assets/css/default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/help_home/assets/css/default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/news/assets/css/new_hot.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/scss/css/reset.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/scss/style.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/product/assets/css/cart.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/scss/css/jquery.raty.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/scss/css/owl.carousel.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/scss/responsive.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/libraries/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/menu/assets/css/menu_header.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/menu/assets/css/navigation.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/menu/assets/css/mobile.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/menu_banner/assets/css/default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/libraries/jquery/jquery.ui/jquery-ui.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/search/assets/css/search.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/slideshow/assets/css/style_default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/css/styles.css" />
  <script type="text/javascript" src="nhathuoc365/libraries/jquery/jquery.min.js"></script>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NW7ZDTH');</script>

  <script src="nhathuoc365/js/numeral.min.js"></script>
</head>
<body>
  <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
         
      
  @include('site.common.header')

    <!-- Phần nội dung -->
  @yield('content')

  @include('site.common.footer')    
         
  <script type="text/javascript" src="nhathuoc365/libraries/jquery/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/home.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/products_sale/assets/js/default.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/categories/assets/js/category.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/news/assets/js/default.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/owl.carousel.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/library.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/jquery.raty.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/script_main.js"></script>
  <script type="text/javascript" src="nhathuoc365/templates/version3/js/function.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/menu_banner/assets/js/menu_cat.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/search/assets/js/jquery.autocomplete.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/search/assets/js/search.js"></script>
  <script type="text/javascript" src="nhathuoc365/blocks/slideshow/assets/js/default.js"></script>


<!-- Bizweb javascript customer -->
<!-- Add to cart -->    
   
    
<!-- DANG KI EMAIL VA THEM GIO HANG -->
<script>
    function subcribeEmailSubmit(e) {
        var email = $(e).find('.emailSubmit').val();
        var token =  $(e).find('input[name=_token]').val();

        $.ajax({
            type: "POST",
            url: '{!! route('subcribe_email') !!}',
            data: {
                email: email,
                _token: token
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);

                alert(obj.message);
            }
        });
        return false;
    }

    function addToOrder(e) {
        var data = $(e).serialize();
        $.ajax({
            type: "POST",
            url: '{!! route('addToCart') !!}',
            data: data,
            success: function(result){
                var obj = jQuery.parseJSON( result);

                window.location.replace("/gio-hang");
            },
            error: function(error) {
                alert('Lỗi gì đó đã xảy ra!')
            }

        });

        return false;
    }
</script>

</body>
</html>