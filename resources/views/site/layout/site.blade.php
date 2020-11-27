<!DOCTYPE html >
<html lang="vi-VN">
<head>
  <title>@yield('title')</title>
  <meta name="ROBOTS" content="@yield('robots')" />
  <meta name="googlebot" content="@yield('googlebot')"/>
  <meta name="bingbot" content="@yield('bingbot')"/>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="@yield('view_port')"/>
  <meta name="description" content="@yield('meta_description')" />
  <meta name="keywords" content="@yield('keywords')" />
  <meta property="og:locale" content="vi_VN"/>
  <meta property="og:type" content="@yield('type_meta')"/>
  <meta property="og:title" content="@yield('title')" />
  <meta property="og:description" content="@yield('meta_description')" />
  <meta property="og:url" content="@yield('meta_url')" />
  <meta property="og:site_name" content="THUỐC TRỰC TUYẾN 24H CHÍNH HÃNG UY TÍN CHẤT LƯỢNG" />
  <meta property="article:publisher" content="@yield('fb_publisher')"/>
  <meta property="article:author" content="@yield('fb_author')">
  <meta property="article:section" content="@yield('category_name')">
  <meta property="og:image" content="@yield('meta_image')" />
  <meta property="og:image:secure_url" content="@yield('meta_image')" />
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />
  <meta property="og:image:alt" content="@yield('title')" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('title')">
  <meta name="twitter:description" content="@yield('meta_description')">
  <meta name="twitter:creator" content="@yield('tw_author')">
  <meta name="twitter:image" content="@yield('meta_image')">
  <link rel="icon" type="image/x-icon" href="{{ !empty($information['icon']) ?  asset($information['icon']) : '' }}"/>
  <base href="{{ isset($information['domain']) ? $information['domain'] : '' }}">
  <link rel="canonical" href="@yield('canonical')" />
  <link rel="preload" href="assets/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="assets/css/bootstrap.min.css"></noscript>
  <link rel="preload" href="assets/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="assets/css/font-awesome.min.css"></noscript>
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css" />
  <meta name="p:domain_verify" content="ed6dd84cbf02424278fbcc0a8be8794f"/>
	
  {!! isset($information['google-alynic']) ? $information['google-alynic'] : '' !!}
</head>
<body>

  {!! isset($information['chat-facebook']) ? $information['chat-facebook'] : '' !!}

  @include('site.common.header')

  @yield('content')

  @include('site.common.footer')

  <script type="text/javascript" src="assets/js/owl.carousel.js" defer></script>
  <script type="text/javascript" src="assets/js/lazysizes.min.js" defer></script>
  <script type="text/javascript" src="assets/js/main.js" defer></script>

</body>
</html>
