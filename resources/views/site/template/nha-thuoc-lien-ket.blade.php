@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')

@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/products/assets/css/sidebar.css" />
<link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/breadcrumbs/assets/css/home_new.css" />
      <!-- <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/bootstraps/bootstrap/bootstrap.min.css" /> -->
     <!--  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/news/assets/css/news-responsive.css" /> -->
     <!--  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/news/assets/css/home.css" /> -->
<!--       <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/special_pages/assets/css/cat.css" />
      
      
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
      <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/blocks/search/assets/css/search.css" /> -->
      <!-- <script type="text/javascript" src="nhathuoc365/libraries/jquery/jquery.min.js"></script>
 -->
        <section class="main-ctn container">
         <div class="wrapper wrapper-news-category row">
         <div class="breadcrumbs col-xs-12">
            <div class="wrapper">
                <ul>
                  <li class="breadcrumb-item">
                     <a class="home" href="/">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item">
                     <a itemprop="url" title="{{ $post->title}}"><span itemprop="title">{{ $post->title}}</span></a>
                  </li>
                  
               </ul>
            </div>
         </div>
         <!--end: .breadcrumbs-->
         
       
         <!--end: #aside-->
         <section id="news-content" class="col-md-9 col-sm-12 col-xs-12">
            <div class="news-category">
               <div class="block-news-heading clearfix">
                  <h1 class="head_cat"><span>{{ isset($post['title']) ? $post['title'] : ''}}</span></h1>
               </div>

               
               
                 <div class="clearfix"></div>
                 <p></p> 
               <div class="list_2 clearfix row">
                  @foreach(\App\Entity\SubPost::showSubPost('nha-thuoc-lien-ket', 20) as $id=>$post)
                        <div class="item col-xs-12">
                           <div class="img_sp col-md-4 col-sm-5 col-xs-12" style="float: left;padding-right: 15px;padding-left: 0;">
                             <div class="CropImg CropImg60 CropImgw100">
                                    <div class="thumbs">
                                       <a><img src="{{ isset($post['image']) ? asset($post['image']) : ''}}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}"></a>
                                     </div>
                                   </div>
                           </div>
                           <div class="info col-md-8 col-sm-7 col-xs-12">
                              <h5 class="headding">
                              <a title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}
                              </a>
                            </h5>
                              <p class="time">{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</p>
                              <p class="summary">{!! isset($post['content']) ? \App\Ultility\Ultility::textLimit($post['content'], 50) : '' !!}</p>
                           </div>
                        </div>
                  @endforeach
                   
               </div>

               
         </section>

         <div class="col-md-3 col-sm-12 col-xs-12">
              @include('site.partials.side_barnew')
          </div>
         <!--end: #content-->
         <div class="clearfix"></div>
         </div>
         <script>
            $('.show-cat').click(function (event) {
                $('.sidebar-content').slideToggle();
            });
         </script>
      </section>




      

@endsection
