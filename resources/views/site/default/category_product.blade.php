@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('type_meta', 'website')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')
@section('meta_image', isset($category->image) && !empty($category->image) ?  asset($category->image) : $information['logo'] )
@section('meta_url', isset($category->slug) ? 'https://sieuthithuoc365.com/cua-hang/'.$category->slug : 'https://sieuthithuoc365.com/cua-hang/san-pham')
@section('canonical', isset($category->slug) ? 'https://sieuthithuoc365.com/cua-hang/'.$category->slug : 'https://sieuthithuoc365.com/cua-hang/san-pham')
@section('fb_publisher', 'https://www.facebook.com/sieuthithuoc365.com/' )
@section('fb_author', 'https://www.facebook.com/sieuthithuoc365.com/' )
@section('tw_author', '@UyThuoc' )
@section('category_name', $category->title)
@section('content')
<section class="main-ctn">
	<div class="container">
   <div class="wrapper wrapper-product-category">
      <div class="breadcrumbs row">
         <div class="wrapper col-xs-12">
            <ul class="breadcrumbUrl">
               <li class="breadcrumb-item">
                  <a class="home" href="/">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
               </li>
               <li class="breadcrumb-item">
                  <a><span itemprop="title">{{ isset($category->title) ? $category->title : '' }}</span></a>
               </li>
            </ul>
         </div>
      </div>
      <!--end: .breadcrumbs-->
      <section class="product-category-content">
         <div class="block-categories block-categories-default " style="margin-bottom:20px;">
            <!--end: .block-heading-->
            <div class="block-content row">

               <div class="list_cat_child col-md-3 col-sm-5 col-xs-12">
                  <aside id="aside">
                     <div class="block-catsmenu block-catsmenu-products">
                        <div class="sidebar-heading-f">
                           Lọc sản phẩm
                           <i class="show_mb"></i>
                        </div>
                        <div class="span3-cotent sidebar-content">
                           <div class="sidebar span3-cotent sidebar-content" >
                              <ul class="submenu-mb color-border cats">
                                 @foreach (\App\Entity\Menu::showWithLocation('side-left-menu') as $Mainmenu)
                                    @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                                 <li class="item menu-1 has-child">
                                    <a href="{{ $menuelement['url'] }}" class="current" title="{{ $menuelement['title_show'] }}">
                                    {{ $menuelement['title_show'] }}
                                    </a>
                                    <i class="fa fa-angle-down show-hidden" aria-hidden="true"></i>
                                     @if (!empty($menuelement['children']))
                                      <ul class="submenu-mb1">
                                       @foreach ($menuelement['children'] as $elemenparent)
                                         
                                             <li><a href="{{ $elemenparent['url']}}" title=" {{ $elemenparent['title_show']}} "><i class="fa fa-caret-right" aria-hidden="true"></i> {{ $elemenparent['title_show']}} </a></li>
                                             
                                      @endforeach
                                     </ul>
                                   @endif
                                    
                                 </li>
                                  @endforeach
                               @endforeach
                                 
                              </ul>
                           </div>
                        </div>
                     </div>
                  </aside>
                  @foreach(\App\Entity\FilterGroup::showFilterGroup() as $id => $filterGroup)
                  <div class="filter">
                     <div class="filter-title">{{ $filterGroup->group_name }}</div>
                     <ul tabindex="0" style="overflow: auto; outline: none; height: 250px;">
                        @foreach(\App\Entity\Filter::showFilter($filterGroup->group_filter_id) as $id => $filter)
                        <li class="check">
                           <a data-value="{{ $filter->name_filter }}" onClick="return checkFilter(this);"> <i class="fa fa-caret-right" aria-hidden="true"></i>
                              {{ $filter->name_filter }}
                           </a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
                  @endforeach
                  <form action="" method="get" id="filterProduct">
                    </form>
                  @if(!empty($category['image']))
                  <div  id="banner-103" class="item">
                     <a rel="nofollow" href="/" title="{{ $category['title'] }}">
                     <img alt="{{ $category['title'] }}" src="{{ $category['image'] }}">
                     </a>
                  </div>
                  @endif
		  <input type="hidden" id="cateId" value="{{ $category['category_id'] }}">
                  <input type="hidden" id="productId" value="0">
               </div>

               <div class="list-item clearfix col-md-9 col-sm-7 col-xs-12">
                  <div class="row">
                  @if(empty($products) || $products->isEmpty())
                  <div class="col-lg-12 col-md-12 col-sm-12 col-12 cateItem noPadding">
                      <p>Không có sản phẩm phù hợp</p>
                  </div>
                  @else

                  @foreach ($products as $id => $product)
                  @include('site.partials.itempr')
                  @endforeach
                  @endif

                  <!--end: .product-item-->  
                  <p>
                  <div class='web-pagination Page'>
                     @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator )
                        {{ $products->links() }}
                      @endif
                  </div>
                
                  </p>
                    </div>

               </div>
                

            </div>
            <!--end: .block-content-->
         </div>
      </section>
   </div>
      <div class="sumary_new">
      {!! $category['description'] !!}
      </div>
   </div>
</section>

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

<div class="banner_left"></div>
<div class="banner_right"></div>
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
@endsection
