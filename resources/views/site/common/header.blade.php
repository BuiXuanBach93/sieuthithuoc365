<header>
   <section class="header_top">
	<div class="container">
		  <div class="wrapper row">
        <div class="fix-pad hotline_ col-md-4 col-sm-12 col-xs-12">
        <p class="hotline" style="color: #0073ad">Siêu Thị Thuốc 365 - An tâm mua thuốc chính hãng</p>
       </div>
			 <div class="fix-pad hotline_ col-md-3 col-sm-12 col-xs-12">
				<p class="hotline">Hotline: <span>{{ isset($information['hotline']) ? $information['hotline'] : '' }}</span> hoặc <span>{{ isset($information['so-dien-thoai']) ? $information['so-dien-thoai'] : '' }}</span></p>
			 </div>
			 <div class="fix-pad time_work col-md-5 col-sm-12 col-xs-12" style="text-align: right;">
				<p class="clock">
				   Giờ làm: <span>{{ isset($information['thoi-gian-lam-viec']) ? $information['thoi-gian-lam-viec'] : '' }}</span> (T2 - CN)
				   @if(\Illuminate\Support\Facades\Auth::check())
               <span class="information">
                  <a class="reginfo btn btn-primary" href="/thong-tin-ca-nhan"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a>
                  <a class="reginfo btn btn-warning"  href="{{ route('logoutHome') }}">Thoát</a>
               </span>
               {{--<form id="logout-form" action="{{ route('logoutHome') }}" method="POST" style="display: none;">--}}
                 {{--{{ csrf_field() }}--}}
                 {{--</form>--}}
               @else
               <span class="btn-login">
                 <a class="reginfo btn btn-warning" href="/dang-ky"><i class="fa fa-key" aria-hidden="true"></i> Đăng ký</a>
                 <a href="/trang/dang-nhap" class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i> Đăng Nhập</a>
               </span>
				   @endif
				</p>

			 </div>
		  </div>
	  </div>
   </section>
   <div class="wrapper container">
   <div class="logo_menu row">
      <div class="div_logo col-md-3 col-sm-12 col-xs-12">
         <div class="logo">
            <a href="/"><img src="{{ isset($information['logo']) ? $information['logo'] : '' }}" alt="Nhà thuốc trực tuyến 24h"></a>
            <p class="clock_mb">Giờ làm: <span> {{ isset($information['thoi-gian-lam-viec']) ? $information['thoi-gian-lam-viec'] : '' }}</span> (T2 - CN)</p>
         </div>
         <div class="cartMB ds-none mbds-block">
            <div class="cart_mb">
               <?php $countOrder = \App\Entity\Order::countOrder();?>
                  @if($countOrder <= 0)
                      <a  title=""> <img alt="Giỏ hàng" src="assets/images/shop-cart.png" style="width: 24px;">
                                  <span>({{ $countOrder }})</span></a>
                  @else
                     <a href="/gio-hang">
                      <img alt="Giỏ hàng" src="assets/images/shop-cart.png" style="width: 24px;">
                                  <span>({{ $countOrder }})</span>
                     </a>
               @endif
            </div>

         </div>

         <div class="login ds-none mbds-block" style="margin-top: 90px;">
             @if(\Illuminate\Support\Facades\Auth::check())
                  <a class="reginfo btn btn-primary" href="/thong-tin-ca-nhan"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản</a>
                  <a class="reginfo btn btn-warning"  href="{{ route('logoutHome') }}">Thoát</a>
                  {{--<form id="logout-form" action="{{ route('logoutHome') }}" method="POST" style="display: none;">--}}
                  {{--{{ csrf_field() }}--}}
                  {{--</form>--}}
               @else
                   <a class="reginfo btn btn-warning" href="/dang-ky"><i class="fa fa-key" aria-hidden="true"></i> Đăng ký</a>
                  <a href="/trang/dang-nhap" class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i> Đăng Nhập</a>
               @endif
         </div>
      </div>
      <div class="menu_main col-md-9 col-sm-12 col-xs-12 mbds-none">
         <div class="block-menu block-menu-navigation">
            <ul>
               
               @foreach (\App\Entity\Menu::showWithLocation('menu-chinh') as $Mainmenu)
                  @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)

                     <li class="menu-11 ">
                        <a href="{{ $menuelement['url'] }}" title="{{ $menuelement['title_show'] }}">{{ $menuelement['title_show'] }}</a>
                        @if (!empty($menuelement['children']))
                        <ul class="submenu submenu-11 ">
                           @foreach ($menuelement['children'] as $elementparent)
                           <li class="menu-390 "><a href="{{ $elementparent['url'] }}" title="{{ $elementparent['title_show'] }}">{{ $elementparent['title_show'] }}</a></li>
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
   <div class="clearfix"></div>
   <div class="header-mobile">
      <span class="onclick-memnu" id="toggleMenu" onclick="openNav()">
         <p class="navicon-line"></p>
         <p class="navicon-line"></p>
         <p class="navicon-line"></p>
      </span>
      <a class="menu-search-mobile" id="search-mobile"></a>
   </div>
   <!-- END: .header-mobile -->
   <div id="mySidenav" class="sidenav">
      <div class="row-item sidenav-wapper">
         <a href="javascript:void(0)" class="close-offcanvas" onclick="closeNav()"></a>
         <div class="block-menu block-menu-mobile">
            <ul>
               @foreach (\App\Entity\Menu::showWithLocation('menu-chinh') as $Mainmenu)
                  @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                     <li class="menu-11 ">
                        <a href="{{ $menuelement['url'] }}" title="{{ $menuelement['title_show'] }}">{{ $menuelement['title_show'] }}</a>
                        @if (!empty($menuelement['children']))
                        <ul class="submenu submenu-11 ">
                           @foreach ($menuelement['children'] as $elementparent)
                           <li class="menu-390 "><a href="{{ $elementparent['url'] }}" title="{{ $elementparent['title_show'] }}">{{ $elementparent['title_show'] }}</a></li>
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
</header>
<div class="header_bottom ">
   <div class="container">
   <div class="wrapper row ">
      <div class="menu_cat_prd cat_mn clearfix col-md-3 col-sm-6 col-xs-12">
         <p class="danhmuc">Danh mục sản phẩm</p>
         <div class="block-menu-banner block-menu-banner-default clearfix" style="" style="position:relative;">
            <div class="bmb-menu">
               <ul>
                   @foreach (\App\Entity\Menu::showWithLocation('side-left-menu') as $Mainmenu)
               @foreach (\App\Entity\MenuElement::showMenuPageArray($Mainmenu->slug) as $id=>$menuelement)
                  <?php $urlscate = explode('/', $menuelement['url']); ?> 
                 
                  <?php $cateTour = \App\Entity\Category::getDetailCategory($urlscate[2]); ?>
                   @if (!empty($cateTour))
                  <li style="background-image: url('{{  isset( $cateTour['icon-toi-mau']) ? $cateTour['icon-toi-mau'] : '#71bf44' }}')" >
                     <a class="a_parent" href="{{ $menuelement['url'] }}" title="{{ $menuelement['title_show'] }}">
                     {{ $menuelement['title_show'] }} 
                       </a>
                     @if (!empty($menuelement['children']))
                     <div class="box-sub">
                        <ul>
                           @foreach ($menuelement['children'] as $elementparent)
                           <li>
                              <a href="{{ $elementparent['url'] }}" title="{{ $elementparent['title_show'] }}">{{ $elementparent['title_show'] }}</a>
                           </li>
                            @endforeach
                        </ul>
                     </div>
                     @endif
                  </li>
                  @endif
               @endforeach
            @endforeach 
               </ul>
            </div>
            <!--end: .bbm-menu-->
         </div>
         <!--end: .block-products-->        
      </div>
      <div class="menu_cat_prd box_search clearfix col-md-7 col-sm-6 col-xs-12">
         <div class="search-top cf row">
            <form style="display: block; padding: 0; border: 0;" action="{{ route('search_product') }}" name="search_form" id="search_form" action="index_submit" method="get" onsubmit="javascript: submit_form_search();
               return false;" accept-charset="utf-8" class="col-xs-12 mbds-none">
               <input type="text" class="fl keyword" name="word" id="txt-search" value="{{ (!empty($_GET['word'])) ? $_GET['word'] : '' }}" placeholder="Tên sản phẩm cần tìm ..." />
               <input type="submit" class="fa fa-search" id="bt-search" value=" " >              
            </form>
         </div>
      </div>
      <div class="div_cart clearfix col-md-2">
         <div class="cart">
            <img alt="cart" src="assets/images/gio-hang.png">
            <?php $countOrder = \App\Entity\Order::countOrder();?>
                     @if($countOrder <= 0)
                     @else
                        <a href="/gio-hang">
                        ({{ $countOrder }})
                        </a>
                     @endif
            <a href="javascript:void(0)" title="" class="icon-mb"><img src="assets/images/shop-cart.png" alt="cart"><span>0</span></a>
         </div>
      </div>
   </div>
   </div>


</div>

 





