@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', isset($information['meta_title']) ? $information['meta_title'] : '')
@section('meta_description', isset($information['meta_description']) ? $information['meta_description'] : '')
@section('keywords', isset($information['meta_keyword']) ? $information['meta_keyword'] : '')
@section('meta_image', 'https://sieuthithuoc365.com/public/library/images/danhmucsp/category_logo/cate_sanpham.jpg' )
@section('meta_url', 'https://sieuthithuoc365.com/' )
@section('canonical', 'https://sieuthithuoc365.com/' )
@section('category_name', 'SIÊU THỊ THUỐC 365' )
@section('fb_publisher', 'https://www.facebook.com/sieuthithuoc365.com/' )
@section('fb_author', 'https://www.facebook.com/sieuthithuoc365.com/' )
@section('tw_author', '@UyThuoc' )
@section('content')
<script type="application/ld+json">{
    "@context": "https://schema.org",
    "@type": "MedicalBusiness",
    "name": "Siêu Thị Thuốc 365",
    "image": "https://sieuthithuoc365.com/public/library/images/sieuthithuoc365-logo.png",
    "@id": "https://sieuthithuoc365.com/#sieuthithuoc365",
    "url": "https://sieuthithuoc365.com",
    "telephone": "+84338814456",
    "priceRange": "500",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Tòa V6 The Vesta, Phú Lãm, Hà Đông, Hà Nội",
      "addressLocality": "TP. Hà Nội",
      "postalCode": "100000",
      "addressCountry": "VN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 20.9616647,
      "longitude": 105.795733
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
      ],
      "opens": "08:00",
      "closes": "22:00"
    },
    "sameAs": [
                "https://www.facebook.com/sieuthithuoc365",
                "https://twitter.com/sieuthithuoc365",
                "https://www.linkedin.com/company/sieuthithuoc365",
                "https://sieuthithuoc365.business.site",
                "https://www.pinterest.com/sieuthithuoc365",
                "https://www.instagram.com/sieuthithuoc365",
                "https://sieuthithuoc365.tumblr.com"
              ],
    "founder": {
    "@type": "Person",
    "alternateName": [
      "Lê Kim Oanh",
      "Lê Kim Oanh"
    ],
    "sameAs": [
      "http://www.linkedin.com/in/duocsilekimoanh",
      "https://www.pinterest.com/duocsilekimoanh/",
      "https://www.instagram.com/duocsilekimoanh/",
      "https://vi.gravatar.com/duocsikimoanh2020",
      "https://duocsilekimoanh.tumblr.com/",
      "https://twitter.com/duocsilekimoanh",
      "https://www.flickr.com/people/duocsilekimoanh/"
    ],
    "url": "https://sieuthithuoc365.com/author/duocsilekimoanh",
    "mainEntityOfPage": "https://sieuthithuoc365.com/author/duocsilekimoanh",
    "@id": "https://sieuthithuoc365.com/author/duocsilekimoanh#person",
    "familyName": "Lê",
    "additionalName": "Kim",
    "givenName": "Oanh",
    "name": "Lê Kim Oanh",
    "description": "Tôi là Lê Kim Oanh, hiện đang là CEO của Siêu Thị Thuốc 365, tôi luôn nỗ lực cống hiến hết mình để góp phần đẩy lùi bệnh tật mang đến cuộc sống khỏe đẹp cho những người xung quanh, cống hiến cho nền Y Dược nước nhà.",
    "jobTitle": {
      "@type": "DefinedTerm",
      "name": "CEO",
      "description": "CEO là viết tắt của từ Chief Executive Officer, có nghĩa là giám đốc điều hành, giữ trách nhiệm thực hiện những chính sách của hội đồng quản trị. Ở những tập đoàn có tổ chức chặt chẽ, các bạn sẽ thấy chủ tịch hội đồng quản trị thường đảm nhận luôn chức vụ CEO này"
    },
    "gender": "https://schema.org/Female",
    "email": "duocsikimoanh2020@gmail.com",
    "image": "https://sieuthithuoc365.com/public/library/images/baiviet/duocsy/duocsy_lekimoanh_thumb.jpg"
  }          
  }</script>
   @include('site.partials.slider')
   <style type="text/css">
       .block-menu-banner
        {
        display: block;
        }
        @media (max-width: 768px)
        {
            .block-menu-banner
              {
                 display: none;
              }
        }
   </style>
   <section class="main-ctn">
	<div class="container">
      <div class="wrapper">
         <section id="content">
             <div class="clearfix"></div>

<!-- start push notify customer -->
<div class="notneva" id="notineva">

</div>
<style>
    .notifi{position: fixed;top: 40px;right:10px;z-index: 999999999999999;background-color: #fff!important;border-radius: 20px;padding: 10px 10px;box-shadow: 0px 0px 20px #333;display: none;}
    .img-noti{float: left;padding-right: 20px;}
    .contentnotify{float: right;}
    .contentnotify p.name{font-weight: bold;margin-bottom: 0px;}
    .contentnotify p.stt{margin-bottom:0px;}
    .display{display:block; transition: display 2s;-webkit-transition: display 2s;}
    .hidden{display:none!important;}
    @media screen and (max-width: 600px){
        .notifi{top: 40px!important;}
    }

</style>

<!-- end push notify customer -->

 <div class="clearfix"></div>

            @foreach (\App\Entity\Menu::showWithLocation('menu-cate-tab-index') as $Mainmenu)
               @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
               <div class="block-categories block-categories-default bgwhite" >
                  <?php $urlscate = explode('/', $menuelement['url']); ?> 
                  <?php $cateTour = \App\Entity\Category::getDetailCategory($urlscate[2]); ?>
    
                  <div class="block-heading row" style="border:2px solid {{  isset( $cateTour['backgruod-title']) ? $cateTour['backgruod-title'] : '#54a8d2' }} ">

                     <div class="heading col-md-3 col-sm-3 col-xs-12" style="background: {{  isset( $cateTour['backgruod-title']) ? $cateTour['backgruod-title'] : '#54a8d2' }} ">
                        <span class="icon_cat" style="background: {{  isset( $cateTour['backgruod-icon']) ? $cateTour['backgruod-icon'] : '#0073ad' }} "><img class="img_cat lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" data-src="{{  isset( $cateTour['icon-danh-muc']) ? $cateTour['icon-danh-muc'] : '#54a8d2' }}"></span>
                        <i class="icon_title" style="background:{{  isset( $cateTour['backgruod-icon']) ? $cateTour['backgruod-icon'] : '#0073ad' }}"></i>
                        <a  style="background: {{  isset( $cateTour['backgruod-title']) ? $cateTour['backgruod-title'] : '#54a8d2' }} " href="{{ $menuelement['url'] }}" title="{{ $menuelement['title_show'] }}" style="color: #fff">{{ $menuelement['title_show'] }}</a>
                     </div>

                     <div class="view-more-product">
                         <a href="{{ $menuelement['url'] }}" style="color: {{  isset( $cateTour['backgruod-title']) ? $cateTour['backgruod-title'] : '#54a8d2' }};
                         ">Xem thêm<span style="width: 0; height: 0; display: inline-block;margin-left: 5px;
                         border-top:5px solid transparent;border-bottom: 5px solid transparent;
                         border-left: 9px solid {{  isset( $cateTour['backgruod-title']) ? $cateTour['backgruod-title'] : '#54a8d2' }};"></span>
                         </a>
                    </div>

                  </div>
                  <div class="block-content row">
                     <div class="list_cat_child col-md-3 col-sm-3 col-xs-12">
                        <div class="child_cat">
                           @if (!empty($menuelement['children']))
                              @foreach ($menuelement['children'] as $elemenparent)
                                 <a class="item_child" href="{{ $elemenparent['url']}}" title="{{ $elemenparent['title_show']}}" >
                                 {{ $elemenparent['title_show']}}  
                                 </a>
                             @endforeach
                          @endif
                           
                        </div>
                        <div class="banner_cat mbds-none">
							 <a href="{{ $menuelement['url'] }}" title=""><img class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" data-src="{{ $menuelement['image'] }}" alt="banner category"></a>
                        </div>
                     </div>
                     <div class="list-item clearfix col-md-9 col-sm-9 col-xs-12 pdtop10">
                        <div class="clearfix">  
                      
                        <?php $urls = explode('/', $menuelement['url']) ?>
                        @foreach (\App\Entity\Product::showProduct($urls[2],8) as $id => $product)
                           @include('site.partials.itempr')
                        @endforeach
                       </div>
                     </div>
                  </div>
               </div>
               @endforeach
            @endforeach
            <!-- .share-face-->
             @foreach (\App\Entity\Menu::showWithLocation('show-category-new') as $Mainmenu)
               @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                     <?php $urlscate = explode('/', $menuelement['url']); ?>
                     <?php $cateTour = \App\Entity\Category::getDetailCategory($urlscate[2]); ?>
             <style>
                 .block-news-succes_story_ct #story_heading{{$id}} >a:before {
                     border-left-color: {{ $cateTour['backgruod-icon'] }};
                     background: {{ $cateTour['backgruod-icon'] }} url(../images/icon_title.png) no-repeat 10px;
                 }
                 .block-news-succes_story_ct #story_heading{{$id}} {
                     background: {{ $cateTour['backgruod-title'] }};
                 }
                 .block-news-succes_story_ct #story_heading{{$id}} >a:after {
                     border-left-color: {{ $cateTour['backgruod-title'] }};
                 }
             </style>
            <div class="block-news block-news-succes_story_ct clearfix" style="float:none;margin-bottom:15px;">
               <div class="block-news-heading story_heading clearfix" id="story_heading{{$id}}">
                  <a class="selected" title="{{ $menuelement['title_show'] }}" href="{{ $menuelement['url'] }}">{{ $menuelement['title_show'] }}</a>
                   <i class="icon_title" style="background:{{  isset( $cateTour['backgruod-icon']) ? $cateTour['backgruod-icon'] : '#0073ad' }}"></i>
               </div>
               <!--end: .block-news-title-->
               <div class="block-news-content clearfix">
                  <div class="owl-carousel-story  owl-theme">
                    <?php $urls = explode('/', $menuelement['url']) ?>
                    @foreach(\App\Entity\Post::categoryShow($urls[2],5) as $post)
                        @php $category = \App\Entity\Category::getDetailCategory($urls[2]); @endphp
                         @include('site.partials.itemnew')
                    @endforeach
                  </div>
               </div>
            </div>
             @endforeach
            @endforeach
         </section>
      </div>
	  </div>
   </section>
   <div class="banner_left">
   </div>
   <div class="banner_right">
   </div>
   
<input type="hidden" id="cateId" value="0">
<div><div id="mp-notification" class="mp-notification-element-wrapper mp-floating-cart-active" >
    <div id="mp-notification-content" class="mp-notification-element-content" style="display: none;">
        <a href="javascript:void(0)" onclick="hideListPushContent()" id="mp-notification-button-close" class="mp-btn-close">
            <div class="mp-notification-item-close"></div>
        </a>
        <ul class="mp-notification-list-group">
            <li class="mp-notification-list-group-item-active">Sản phẩm bán chạy</li>
            <li id="campagn_slot_1" class="mp-notification-list-group-item item1">
            </li>
            <li id="campagn_slot_2" class="mp-notification-list-group-item item2">
            </li>
            <li id="campagn_slot_3" class="mp-notification-list-group-item item3">
            </li>
        </ul>
    </div>
</div>
</div> 
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script> 
@endsection
