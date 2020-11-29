@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0')
@section('type_meta', 'article')
@section('title', isset($product->meta_title) ? $product->meta_title : $product->title )
@section('meta_description',  !empty($product->meta_description) ? $product->meta_description : $product->description)
@section('keywords', $product->meta_keyword)
@section('meta_image', !empty($product->image) ? asset($product->image) : $information['logo'] )
@section('meta_url', route('product', [ 'post_slug' => $product->slug]) )
@section('canonical', route('product', [ 'post_slug' => !empty($product->canonical_link) ? $product->canonical_link : $product->slug]) )
@section('fb_publisher', 'https://www.facebook.com/duocsilekimoanh' )
@section('fb_author', 'https://www.facebook.com/duocsilekimoanh' )
@section('tw_author', '@duocsilekimoanh' )
@section('category_name', $category->title)
@section('content')
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@graph": [
            {
              "@type": "Organization",
              "@id": "https://sieuthithuoc365.com/#organization",
              "name": "Siêu Thị Thuốc 365",
              "url": "https://sieuthithuoc365.com/",
              "sameAs": [
                "https://www.facebook.com/sieuthithuoc365",
                "https://twitter.com/UyThuoc",
                "https://www.linkedin.com/company/sieuthithuoc365",
                "https://sieuthithuoc365.business.site",
                "https://www.pinterest.com/sieuthithuoc365",
                "https://www.instagram.com/sieuthithuoc365",
                "https://sieuthithuoc365.tumblr.com"
              ],
              "logo": {
                "@type": "ImageObject",
                "@id": "https://sieuthithuoc365.com/#logo",
                "inLanguage": "vi-VN",
                "url": "https://sieuthithuoc365.com/public/library/images/sieuthithuoc365-logo.png",
                "width": 280,
                "height": 70,
                "caption": "Siêu Thị Thuốc 365"
              },
              "image": {
                "@id": "https://sieuthithuoc365.com/#logo"
              }
            },
            {
              "@type": "WebSite",
              "@id": "https://sieuthithuoc365.com/#website",
              "url": "https://sieuthithuoc365.com/",
              "name": "SIÊU THỊ THUỐC 365 - AN TÂM MUA THUỐC CHÍNH HÃNG",
              "description": "Mua thuốc, thực phẩm chức năng online chính hãng, giá ưu đãi, giao hàng toàn quốc nhanh chóng, tiện lợi.",
              "publisher": {
                "@id": "https://sieuthithuoc365.com/#organization"
              },
              "potentialAction": [
                {
                  "@type": "SearchAction",
                  "target": "https://sieuthithuoc365.com/tim-kiem?word={search_term_string}",
                  "query-input": "required name=search_term_string"
                }
              ],
              "inLanguage": "vi-VN"
            },
            {
              "@type": "ImageObject",
              "@id": "https://sieuthithuoc365.com/{{$product->slug}}#primaryimage",
              "inLanguage": "vi-VN",
              "url": "https://sieuthithuoc365.com{{$product->image}}",
              "width": 300,
              "height": 300,
              "caption": "{{ isset($product['meta_title']) ? $product['meta_title'] : ''}}"
            },
            {
              "@type": "WebPage",
              "@id": "https://sieuthithuoc365.com/{{$product->slug}}#webpage",
              "url": "https://sieuthithuoc365.com/{{$product->slug}}",
              "name": "{{ isset($product['meta_title']) ? $product['meta_title'] : $product['title']}}",
              "isPartOf": {
                "@id": "https://sieuthithuoc365.com/#website"
              },
              "primaryImageOfPage": {
                "@id": "https://sieuthithuoc365.com/{{$product->slug}}#primaryimage"
              },
              "datePublished": "{{$product->created_at}}",
              "dateModified": "{{$product->updated_at}}",
              "description": "{{ isset($product['meta_description']) ? $product['meta_description'] : $product['description']}}",
              "breadcrumb": {
                "@id": "https://sieuthithuoc365.com/{{$product->slug}}#breadcrumb"
              },
              "inLanguage": "vi-VN",
              "potentialAction": [
                {
                  "@type": "ReadAction",
                  "target": [
                    "https://sieuthithuoc365.com/{{$product->slug}}"
                  ]
                }
              ]
            },
            {
              "@type": "BreadcrumbList",
              "@id": "https://sieuthithuoc365.com/{{$product->slug}}#breadcrumb",
              "itemListElement": [
                {
                  "@type": "ListItem",
                  "position": 1,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://sieuthithuoc365.com/",
                    "url": "https://sieuthithuoc365.com/",
                    "name": "Home"
                  }
                },
                {
                  "@type": "ListItem",
                  "position": 2,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://sieuthithuoc365.com/cua-hang/{{$category->slug}}",
                    "url": "https://sieuthithuoc365.com/cua-hang/{{$category->slug}}",
                    "name": "{{$category->title}}"
                  }
                },
                {
                  "@type": "ListItem",
                  "position": 3,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://sieuthithuoc365.com/{{$product->slug}}",
                    "url": "https://sieuthithuoc365.com/{{$product->slug}}",
                    "name": "{{$product->meta_title}}"
                  }
                }
              ]
            },
            {
              "@type": "Article",
              "@id": "https://sieuthithuoc365.com/{{$product->slug}}#article",
              "isPartOf": {
                "@id": "https://sieuthithuoc365.com/{{$product->slug}}#webpage"
              },
              "author": {
                "@id": "https://sieuthithuoc365.com/author/duocsilekimoanh#person"
              },
              "headline": "{{ isset($product['meta_title']) ? $product['meta_title'] : ''}}",
              "datePublished": "{{$product->created_at}}",
              "dateModified": "{{$product->updated_at}}",
              "mainEntityOfPage": {
                "@id": "https://sieuthithuoc365.com/{{$product->slug}}#webpage"
              },
              "publisher": {
                "@id": "https://sieuthithuoc365.com/#organization"
              },
              "image": {
                "@id": "https://sieuthithuoc365.com/{{$product->slug}}#primaryimage"
              },
              "articleSection": "",
              "inLanguage": "vi-VN",
              "potentialAction": [
                {
                  "@type": "ReadAction",
                  "target": [
                    "https://sieuthithuoc365.com/{{$product->slug}}"
                  ]
                }
              ]
            },
            {
              "@type": [
                "Person"
              ],
              "@id": "https://sieuthithuoc365.com/author/duocsilekimoanh#person",
              "name": "Dược Sĩ Lê Kim Oanh",
              "image": {
                "@type": "ImageObject",
                "@id": "https://sieuthithuoc365.com/#authorlogo",
                "inLanguage": "vi-VN",
                "url": "https://s.gravatar.com/avatar/33401070ddcbb63fcce2edfd59e3ccdf",
                "caption": "Dược Sĩ Lê Kim Oanh"
              },
              "description": "Tôi là Lê Kim Oanh, CEO của Siêu Thị Thuốc 365, tôi luôn nỗ lực cống hiến hết mình để góp phần đẩy lùi bệnh tật mang đến cuộc sống khỏe đẹp cho những người xung quanh, cống hiến cho nền Y Dược nước nhà.",
              "sameAs": [
                "https://www.facebook.com/duocsilekimoanh",
                "https://twitter.com/duocsilekimoanh",
                "https://www.linkedin.com/in/duocsilekimoanh",
                "https://www.instagram.com/duocsilekimoanh",
                "https://www.pinterest.com/duocsilekimoanh"
              ]
            }
          ]
        }
    </script>
<script type="application/ld+json">{
    "@context": "https://schema.org/",
    "@type": "CreativeWorkSeries",
    "name": "{{ isset($product['meta_title']) ? $product['meta_title'] : ''}}",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "bestRating": "5",
        "ratingCount": "45"
    }
}</script>
    @if (isset($product['banner-san-pham']) && !empty($product['banner-san-pham']))
    <section class="bannerChitiet">
        <div class="img_banner_pc">
            <img src="{{ isset($product['banner-san-pham']) ? $product['banner-san-pham'] : ''}}" alt="{{$product->title }}"
                 style="width: 100%">
        </div>
        <div class="img_banner_mb">
            <img src="{{ isset($product['banner-san-pham']) ? $product['banner-san-pham'] : ''}}" alt="{{$product->title }}"
                 style="width: 100%">
        </div>
        <div class="title_chitiet mdds-none">
            <div class="title_chitietcon">
                <span>{{ isset($product['title']) ? $product['title'] : ''}}</span>
                <p>{{ isset($product['mo-ta-banner']) ? $product['mo-ta-banner'] : ''}}</p>
                <a href="{{ isset($product['slug']) ? $product['slug'] : ''}}#bottom"
                   class="btn btn-default dathang_tuvan">Đặt hàng/ Tư vấn</a>
            </div>
        </div>
        <div class="dathang original" style="visibility: visible;">
            <div class="block-callme" style="float:none;margin-bottom:5px;">
                <div class="send_phone clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <p class="text_tit col-xs-6 col-sm-5 col-lg-4 mdds-none"></p>
                                    <form id="frm_block_call_me519759" action="{{ route('sub_contact') }}" onsubmit="return contact(this)"
                                          method="post" class="col-ms-6 col-sm-12 col-lg-8">
                                        {{ csrf_field() }}
                                        <div class="w100">
                                            <input type="text" id="phone" name="phone" class="emailSubmit form-control w80 ds-inline"
                                               placeholder="SĐT của bạn" style="margin: 8px 0;
                                               height: 30px;">
                                               <input type="hidden"  name="name" value="Khách Gọi Ngay">
                                               <input type="hidden"  name="product_id" value="{{$product->post_id}}">
                                                <input type="hidden" class="form-control"  name="from" value="under-banner" />
                                               <input type="hidden"  name="email" value="noname@gmail.com">
                                               <div class="form-group textarea" style="display: none;">
                                                   <textarea name="message" class="form-control">{{$product->title }}</textarea>
                                               </div>
                                             <button class="submit_phone w20 ds-inline" type="submit">Nhận tư vấn</button> 
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: .block-space-->
        </div>
        <div class="dathang  cloned"
             style="position: fixed; margin-top: 0px; z-index: 500; display: none; left: 0px; top: 0px; width: 1903px;">
            <div class="block-callme" style="float:none;margin-bottom:5px;">
                <div class="send_phone clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <div class="row">
                                    <p class="text_tit col-xs-6 col-sm-6">Bạn muốn tư vấn ? Vui lòng nhập số
                                        điện thoại vào đây:</p>
                                    <form id="frm_block_call_me519759" action="{{ route('sub_contact') }}" onsubmit="return contact(this)"
                                          method="post" class="col-xs-6 col-sm-6">
                                        {{ csrf_field() }}
                                        <input type="text" id="phone" name="phone" class="emailSubmit form-control"
                                               placeholder="SĐT của bạn">
                                        <input type="hidden"  name="name" value="Khách Gọi Ngay">
                                               <input type="hidden"  name="email" value="noname@gmail.com">
                                               <input type="hidden"  name="product_id" value="{{$product->post_id}}">
                                               <input type="hidden" class="form-control"  name="from" value="under-banner" />
                                               <div class="form-group textarea" style="display: none;">
                                                   <textarea name="message" class="form-control">{{$product->title }}</textarea>
                                               </div>
                                        <button class="submit_phone" type="submit">Nhận tư vấn</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: .block-space-->
        </div>
    </section>
    @endif
    <div class="wrapper wrapper-product-detail container">
        <section id="content" class="detail">
            <div id="detail-product">
                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="leftImg">
                        <div class="imgLage hidden_MB mbds-none">
                            @if(!empty($product->image_list))
                                @foreach(explode(',', $product->image_list) as $idImage => $imageProduct)
                                    @if($idImage == 0)
                                        <img id="imageProductDesktop" src="{{ isset($imageProduct) ? $imageProduct : ''}}"
                                             data-zoom-image="{{ isset($imageProduct) ? $imageProduct : ''}}" alt="{{ isset($product['title']) ? $product['title'] : ''}}" />
                                    @endif
                                @endforeach
                            @endif
                            @if ($product['popular_tag'] == 1) 
                            <span class="product-detail-prd_bc">Bán chạy</span>
                            @endif
                            @if ($product['is_promotion'] == 1) 
                            <span class="product-detail-prd_promotion_desktop">{{$product['promotion_content']}}</span>
                            @endif 
                        </div>
                        <div class="imgLage show_MB hiddenMD ds-none mbds-block">
                            @if(!empty($product->image_list))
                                @foreach(explode(',', $product->image_list) as $idImage => $imageProduct)
                                    @if($idImage == 0)
                                        <img style="height: 350px;" id="imageProductMobile" src="{{ isset($imageProduct) ? $imageProduct : ''}}" alt="{{ isset($product['title']) ? $product['title'] : ''}}" />
                                    @endif
                                @endforeach
                            @endif
                            @if ($product['popular_tag'] == 1) 
                            <span class="product-detail-prd_bc">Bán chạy</span>
                            @endif
                            @if ($product['is_promotion'] == 1) 
                            <span class="product-detail-prd_promotion">{{$product['promotion_content']}}</span>
                            @endif    
                            <div id="customer-count-desktop" class="ins-preview-wrapper">
                                
                                <div id="image-1478094039604" class="ins-element-content change-image" style="width: 30px;height: 20px;">
                                    <img alt="icon viewer" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" data-src="https://sieuthithuoc365.com/public/library/images/icons/icon_cus_view.png" class="ins-element-image ins-image">
                                </div>
                                <div style="padding-top: 12px;
    margin-left: 5px;" class="ins-adaptive-description ins-selectable-element ins-element-wrap ins-element-text">
                                    <span class="ins-dynamic-element-tag"></span>&nbsp;người đang xem 
                                </div>
                            </div>
                        </div>
                        <div id="gal1" class="imgmedum mbds-none">
                            @if(!empty($product->image_list))
                                @foreach(explode(',', $product->image_list) as $imageProduct)
                                    <a data-image="{{$imageProduct}}" data-zoom-image="{{$imageProduct}}">
                                        <img src="{{$imageProduct}}" alt="{{ isset($product['title']) ? $product['title'] : ''}}" onClick="return changeImageDesktop(this);"/>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div id="gal1-mb" class="imgmedum ds-none mbds-block">
                            @if(!empty($product->image_list))
                                @foreach(explode(',', $product->image_list) as $imageProduct)
                                    <a data-image="{{$imageProduct}}" data-zoom-image="{{$imageProduct}}">
                                        <img src="{{$imageProduct}}" onClick="return changeImage(this);" alt="{{ isset($product['title']) ? $product['title'] : ''}}"/>
                                        </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <style type="text/css">
                        #imageProductDesktop  {
                            max-width: 100%;
                        }

                        .leftImg .imgLage {
                           
                            text-align: center;
                        }

                        .leftImg .imgLage img {
                            height: 100%;
                            max-height: 350px;
                        }

                        #gal1 {
                            text-align: center;
                        }
                        #gal1-mb {
                            text-align: center;
                        }

                        #gal1 a img {
                            width: 80px;
                            max-width: 80px;
                            border: 1px solid #ccc;
                            height: 80px;
                            max-height: 80px;
                            margin: 10px 5px;
                        }
                        
                        #gal1-mb a img {
                            width: 80px;
                            max-width: 80px;
                            border: 1px solid #ccc;
                            height: 80px;
                            max-height: 80px;
                            margin: 10px 5px;
                        }

                        .detail-more img {
                            max-width: 100% !important;
                        }

                        @media screen and (max-width: 768px) {
                            .owl-carousel .owl-item {
                                position: relative;
                                width: 140px !important;
                                float: left;
                                -webkit-backface-visibility: hidden;
                                -webkit-tap-highlight-color: transparent;
                                -webkit-touch-callout: none;
                                -webkit-user-select: none;
                                -moz-user-select: none;
                                -ms-user-select: none;
                                user-select: none;
                            }
                        }

                        .product-detail-prd_promotion {
                            padding: 5px 10px 5px 5px;
                            left: -10px;
                            position: absolute;
                            bottom: 0;
                            z-index: 9;
                            background: red;
                            opacity: 70%;
                            color: #ffffff;
                            text-transform: uppercase;
                            border-bottom-right-radius: 20px;
                            font-size: 18px;
                        }
                        .product-detail-prd_promotion_desktop {
                            padding: 5px 10px 5px 5px;
                            left: -10px;
                            position: absolute;
                            bottom: 100px;
                            z-index: 9;
                            background: red;
                            opacity: 70%;
                            color: #ffffff;
                            text-transform: uppercase;
                            border-bottom-right-radius: 20px;
                            font-size: 18px;
                        }
                    </style>
                </div>
                <!--end: .thumb-->
                <div class=" col-xs-12 col-sm-6 col-md-6 col-lg-8">
                    <div class="summary">
                        <div class="a_right clearfix">
                            <h1>{{ isset($product['title']) ? $product['title'] : ''}}</h1>
                            
                            <p class="thuonghieu">Thương hiệu:
                                <a style="cursor: pointer;" href="{{ route('search_product_brand', ['brandname' => $product->brand_name]) }}">
                                    {{ $product->brand_name ? $product->brand_name : 'Đang cập nhật'}}
                                </a>
                            </p>
                            
                            <p class="masanpham mgbottom20">Mã sản phẩm:
                                <span>{{ isset($product['code']) ? $product['code'] : ''}}</span></p>
                        </div>
                        <!-- <div class="clearfix"></div> -->
                        <div class="qo-product-detail">
                            <div class="col-sm-7 col-xs-7 left_box">
                                <div class="sum_prd clearfix" style="border: 1px solid #0073ad;
                                    padding: 10px;
                                    border-radius: 5px;
                                    margin-bottom: 10px;">
                                    {!! isset($product['properties']) ? $product['properties'] : 'Đang cật nhật thông tin' !!}
                                </div>
                                @if ($product['just_view'] == 0)
                                    <div class="pdleft6">
                                    @if (time() <= strtotime($product->deal_end))
                                        <div class="price">{{ number_format( $product['price_deal'] , 0) }} đ</div>
                                        <div class="">
                                            <?php
                                            $sale = ($product['price_deal'] / ($product['price'] / 100));
                                            $sale_price = $product['price'] - $product['price_deal'];
                                            ?>
                                            <span>Tiết kiệm:<span class="phan_tram"> <?php echo ceil(100 - $sale) ?> % </span><span
                                                        class="price_giam">({{ number_format( $sale_price , 0) }} đ ) </span>
                                            </span>
                                            <span class="price-old">Giá thị trường: {{ number_format( $product['price'] , 0) }} đ</span>
                                        </div>
                                    @elseif($product['discount'] > 0)
                                        <div class="price">{{ number_format( $product['discount'] , 0) }} đ</div>
                                        <div class="">
                                            <?php
                                            $sale = ($product['discount'] / ($product['price'] / 100));
                                            $sale_price = $product['price'] - $product['discount'];
                                            ?>
                                            <span>Tiết kiệm:<span class="phan_tram"> <?php echo ceil(100 - $sale) ?> % </span><span
                                                        class="price_giam">({{ number_format( $sale_price , 0) }} đ ) </span>
                                            </span>
                                            <span class="price-old">Giá thị trường: {{ number_format( $product['price'] , 0) }} đ</span>
                                        </div>
                                    @else
                                        @if($product['price'] > 0)
                                            <div class="price">{{ number_format( $product['price'] , 0) }} đ</div>
                                        @else
                                            <div class="price">Giá : Liên hệ</div>
                                        @endif    
                                    @endif
                                    </div>       
                                @endif

                                @if ($product['just_view'] == 0) 
                                <input type="hidden" name="product_price" id="product_price" value="195000"/>
                                <div class="buy-tools clearfix">
                                    <form onsubmit="return addToOrder(this);" enctype="multipart/form-data"
                                        id="add-to-cart-form" method="post" accept-charset="utf-8">
                                        {{ csrf_field() }}
                                        <div class="quantity-selector detail-info-entry" style="font-weight: bold; color: #0073ad; margin-bottom: 5px;">
                                            <div class="detail-info-entry-title" style="padding-bottom: 5px;">Số lượng</div>
                                            <div style="display: flex;">
                                            <div style="display: inline-block;">
                                            <div class="entry number-minus">&nbsp;</div>
                                            <input type="number" class="input_quantity" id="input_quantity" name="quantity[]" value="1"  style="width: 40px; border: 1px solid #d4caca; height: 30px; text-align: center; font-weight: bold;" />
                                            <input type="hidden" class="product_id" name="product_id[]"
                                                value="{{ $product->product_id }}"/>
                                            <input type="hidden" id="btn-add-cart-type" name="btnType" value="MID"/>
                                            <div class="entry number-plus">&nbsp;</div>
                                        </div>
                                        @if ($showShip == 1)
                                        <div style="display: flex;width: 200px;padding-left: 10px; padding-top: 10px;">
                                            <img alt="free ship icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" style="width:40px;height: 20px; margin-right: 5px" data-src="https://sieuthithuoc365.com/public/library/images/icons/free-ship.png">
                                        <span style="color: #0073ad; font-weight: normal; font-size: 12px">{{$shipText}}</span>
                                    </div>
                                    @endIf
                                    </div>
                                        </div>
                                        <span style="color: #0073ad;">(Còn {{$product['available']}} sản phẩm)</span>
                                        <div class="clearfix"></div>
                                        <p></p>
                                        <button class="dat_hang add-cart-0" style="display: block;  border: none;"
                                                type="submit">ĐẶT HÀNG (Giao hàng toàn quốc)
                                        </button>
                                        
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                @else
                                <div class="sum_prd clearfix" style="margin-left:-10px; color: #0073ad; font-size: 16px">Bài viết chỉ mang tính tham khảo, nhà thuốc không kinh doanh sản phẩm này.</div>
                                @endif
                            </div>
                            <div class="col-sm-5 col-xs-5 right_box text-left">
                                <div class="pd_policy">
                                    <h3>Dịch vụ của chúng tôi</h3>
                                    <p class="serv-1">Ship COD tận nhà trong 1-4 ngày làm việc <br><span>(Hà Nội nhận sau 2 giờ)</span></p>
                                    <p class="serv-2">Cam kết hàng chính hãng 100%. <br><span>Đổi trả trong vòng 7 ngày</span></p>
                                </div>
                            </div>
                        </div>    
                        <!--end: .buy-tools-->
                        <div class="clearfix"></div>
                        <div class="a_right5 clearfix col-sm-7 col-xs-7 left_box">
                            <p class="hotline_dathang" style="margin-bottom: 7px;">Gọi ngay
                                Hotline: {{ isset($information['hotline']) ? $information['hotline'] : '' }}<br> <span>(Tư vấn miễn phí - Thời gian: 24/24h)</span>
                            </p>
                            <div style="border: 1px solid #0073ad;
                                padding: 10px;
                                border-radius: 5px;">
                            <p>
                                <img alt="icon accept" src="https://sieuthithuoc365.com/public/library/images/danhmucsp/icon/icon-accept-16.png"><span style="font-size: 14px;
                                font-weight: bold;"> Tư vấn 1 - 1 cùng dược sỹ 24/7</span><br>
                                <img alt="icon accept" src="https://sieuthithuoc365.com/public/library/images/danhmucsp/icon/icon-accept-16.png"><span style="
                                font-size: 14px;
                                font-weight: bold;"> Đổi trả trong vòng 7 ngày</span><br>
                                <img alt="icon accept" src="https://sieuthithuoc365.com/public/library/images/danhmucsp/icon/icon-accept-16.png"><span style="
                                font-size: 14px;
                                font-weight: bold;"> Miễn phí vận chuyển với đơn hàng 500K</span><br>
                                <img alt="icon accept" src="https://sieuthithuoc365.com/public/library/images/danhmucsp/icon/icon-accept-16.png"><span style="
                                font-size: 14px;
                                font-weight: bold;"> Kiểm tra hàng trước khi thanh toán</span><br>
                            </p>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="a_right5 clearfix">
                            <p class="title_1">Ngại gọi điện? Vui lòng nhập số điện thoại </p>
                            <form  action="{{ route('sub_contact') }}" method="post" onsubmit="return contact(this)" class="mdds-none">
                                {{ csrf_field() }}
                                <div class="input_dathang w100 contactInput">
                                    <input type="text"  id="call-me_phone"  name="phone" class="form-control emailSubmit w80 ds-inline" placeholder="Số ĐT của bạn" >
                                    <input type="hidden" class="form-control"  name="from" value="top-box" />
                                    <input type="hidden"  name="name" value="Khách Gọi Ngay">
                                    <input type="hidden"  name="product_id" value="{{$product->post_id}}">
                                    <input type="hidden"  name="email" value="noname@gmail.com">
                                    <div class="form-group textarea" style="display: none;">
                                    <textarea name="message" class="form-control">{{$product->title }}</textarea>
                                    </div>
                                    <button class="submit_phone2" type="submit" >Gọi lại cho tôi ngay</button>
                                </div>
                            </form>
                            @if(!empty($product['tags']))
                            <div class="tags tagsearch">
                                <p class="timkiem_dathang">Gợi ý tìm kiếm:</p>

                                    @foreach(explode(',', $product['tags']) as $tag)
                                        <a href="{{ route('tags_product', ['tags' => $tag]) }}" title="{{ $tag }}"><span class="tag">{{ $tag }}</span></a>
                                    @endforeach

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form  action="{{ route('sub_contact') }}" method="post" onsubmit="return contact(this)" class="ds-none mdds-block w100 ">
                                {{ csrf_field() }}
                                <div class="input_dathang w100 contactInput">
                                    <input type="text"  id="call-me_phone-mb"  name="phone" class="form-control emailSubmit w80 ds-inline" placeholder="SĐT của bạn" >
                                    <input type="hidden" class="form-control"  name="from" value="top-box" />
                                    <input type="hidden"  name="name" value="Khách Gọi Ngay">
                                    <input type="hidden"  name="product_id" value="{{$product->post_id}}">
                                    <input type="hidden"  name="email" value="noname@gmail.com">
                                    <div class="form-group textarea" style="display: none;">
                                    <textarea name="message" class="form-control">{{$product->title }}</textarea>
                                    </div>
                                    <button  class="submit_phone2 w19 ds-inline contact" type="submit" >Gọi lại cho tôi ngay</button>
                                </div>
                    </form>
                </div>
                <!--end: .summary-->
                <div class="clearfix"></div>
               
               @if($product->just_view == 1 || $product->price <= 0)
                    <div id="same_products" class="col-xs-12">
                         @php $relativeProducts = \App\Entity\Product::relativeProduct($product->slug, $product->product_id, 6); @endphp
                         @if (sizeof($relativeProducts) > 0)
                            <div class="title">
                                Lựa chọn cho bạn - {{$relativeProducts[0]->cate_title}}
                                 <input type="hidden" id="cateId" value="{{$relativeProducts[0]->category_id}}">
                                 <input type="hidden" id="productId" value="{{$product->post_id}}">
                                 <div class="title" style="margin-top:-10px; margin-bottom: -10px">
                                    <a href="cua-hang/{{$relativeProducts[0]->cate_slug}}">Xem thêm >></a>
                                </div>
                            </div>
                            <div class="block-content">
                                @foreach($relativeProducts as $id => $productRelative)
                                    @include('site.partials.itemRel', ['product' => $productRelative])
                                @endforeach
                            </div>
                         @endif   
                    </div>
                @endif

                <div class="detail-more col-xs-12">

                <div class="title-product-detail form-group">
                  <h4><i class="fa fa-book"></i> Chi tiết sản phẩm</h4>
                </div> 
                    {!! isset($product['content']) ? $product['content'] : 'Đang cập nhật thông tin' !!}
                    <div class="single-post-meta row align-items-center">
                  <div class="col-md-6 mr-auto align-items-center">
                      <div class="avartar">
                      <img alt="duoc sy kim oanh" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" data-src="https://sieuthithuoc365.com/public/library/images/baiviet/duocsy/duoc-si-kim-oanh.jpg" height="35" width="35">
                      </div>
                      <div>
                        <span class="author">Tác giả</span>
                      <a href="/author/duocsilekimoanh" class="author-link" rel="author"> Dược sĩ Lê Kim Oanh</a>
                      </div>
                    </div>
                    <div class="ml-auto col-md-6">
                      <p class="share-title">Chia sẻ bài viết</p>
                      <ul class="socical-share">
                        <li class="">
                          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('product', ['post_slug' => $product->slug]) }}" class="facebook">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="">
                          <a target="_blank" href="https://twitter.com/intent/tweet?status='{{ route('product', ['post_slug' => $product->slug]) }}" class="twitter">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                          </a>
                        </li>
                        <li class="">
                          <a target="_blank" href="https://pinterest.com/pin/create/button?url={{ route('product', ['post_slug' => $product->slug]) }}&amp;description={{$product->title}}" class="pinterest">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div> 
                </div>


                 <div class="col-12" style="margin: 15px">
                    <div class="fb-like" data-href="{{ route('product', ['post_slug' => $product->slug]) }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>

                
            </div>

            <div class="clearfix" style="border-bottom: 1px solid #f3f3f3">
            </div>
            <!--end: #detail-product-->

            @if($product->price > 0 && $product->just_view == 0)
                <div id="same_products" class="col-xs-12">
                 @php $relativeProducts = \App\Entity\Product::relativeProduct($product->slug, $product->product_id, 6); @endphp
                 @if (sizeof($relativeProducts) > 0)
                    <div class="title">
                        Lựa chọn cho bạn - {{$relativeProducts[0]->cate_title}}
                         <input type="hidden" id="cateId" value="{{$relativeProducts[0]->category_id}}">
                         <input type="hidden" id="productId" value="{{$product->post_id}}">
                         <div class="title" style="margin-top:-10px; margin-bottom: -10px">
                            <a href="cua-hang/{{$relativeProducts[0]->cate_slug}}">Xem thêm >></a>
                        </div>
                    </div>
                    <div class="block-content">
                        @foreach($relativeProducts as $id => $productRelative)
                            @include('site.partials.itemRel', ['product' => $productRelative])
                        @endforeach
                    </div>
                 @endif   
            </div>
                @endif
        </section>
        <!--end: #content-->
    </div>
    <div class="">
        <div class="row">
            <div class="col-12">
        <div class="Notification" id="popupVitural">
        <div class="Closed">X</div>
        <div class="Content">
            <h3>YÊU CẦU NHÀ THUỐC TƯ VẤN</h3>
            <br>
            <form action="{{ route('sub_contact') }}" method="post" onSubmit="return contact(this);">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" required placeholder="Họ và tên"/>
                    <input type="hidden" class="form-control"  name="from" value="popup" />
                </div>

                <div class="form-group">
                  
                    <input type="number" class="form-control"  name="phone" required placeholder="Số điện thoại"/>
                </div>

                <div class="form-group">
                  
                    <input type="email" class="form-control" name="email" placeholder="Email - Không bắt buộc"/>
                    <input type="hidden" class="form-control" name="product_id" value="{{ $product->post_id }}" />
                </div>

                <div class="form-group textarea">
                    <textarea name="message" class="form-control" required>{{ $product->title }}</textarea>
                </div>
                <br>
                <div class="form-group col-md-12" style="text-align: center;">
                    <Button onclick="closePopupContact()" type="button" class="btn col-md-6" style="background: darkgray;">ĐÓNG LẠI</Button>
                    <Button type="submit" class="btn btnsubmit col-md-6">GỬI YÊU CẦU</Button>
                </div>
            </form>
        </div>

    </div>
    <!-- mini cart start -->
    @if ($product['just_view'] == 0)
    <div class="sticky-add-to-cart ">
        <div class="sticky-add-to-cart__product">
        @if(!empty($product->image_list))
            @php $imageProduct = explode(',', $product->image_list)[0]; @endphp
            <a href="#">
                <img alt="{{ isset($product['title']) ? $product['title'] : ''}}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" data-src="{{$imageProduct}}" class="sticky-add-to-cart-img litespeed-loaded">
            </a>
        @endif
            <div class="product-title-small hide-for-small">
            <strong>{{ isset($product['title']) ? $product['title'] : ''}}</strong>
            </div>
        </div>
        <div class="quantity buttons_added">
            <div class="entry minus number-minus">&nbsp;</div>
            <input type="number" id="quantity_popup" class="input-text qty text" step="1" min="1" max="9999" name="quantity" value="1" title="SL" size="4" inputmode="numeric">            
            <div class="entry plus number-plus">&nbsp;</div>
            <button type="submit" class="single_add_to_cart_button  button alt disabled wc-variation-selection-needed"
           >ĐẶT HÀNG</button>
    </div>
    @endif
    <!-- mini cart end -->
            </div>
        </div>
    </div>

    <div class="call_shop" onclick="showPopupContact();">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" alt="shop call icon" data-src="nhathuoc365/templates/version3/scss/images/icon_shopcall.png" style="animation: 5s ease-in-out 0s normal none infinite running suntory-alo-circle-img-anim;">
     Tư vấn cho tôi</div>




<!-- push list -->
@if ($product['just_view'] == 1) 
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
@endif

<!-- end push list -->


    <!-- start push notify customer -->
<div class="notneva" id="notineva">

</div>


<div id="customer-count" class="ins-preview-wrapper ins-preview-wrapper-8831 ins-pos-bottom-left">
    <div class="ins-content-wrapper ins-content-wrapper-8831">
        <div class="ins-notification-content ins-notification-content-8831 boostKeyframe" data-camp-id="8831" style="background-color: rgb(255, 255, 255) !important; background-image: none !important; border-width: 0px !important; border-style: none !important; border-color: rgb(51, 51, 51) !important; border-radius: 8px !important; animation: 0s ease 0s 1 normal none running none;">
            <div class="ins-social-proof-on-page-2">
                <div id="wrap-image-1478094039604" class="ins-selectable-element ins-element-wrap ins-element-image ins-image-wrap">
                    <div id="image-1478094039604" class="ins-element-content change-image">
                        <a>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAMSURBVBhXY/j//z8ABf4C/qc1gYQAAAAASUVORK5CYII=" class="lazyload" alt="icon viewer" data-src="https://sieuthithuoc365.com/public/library/images/icons/icon_cus_view.png" class="ins-element-image ins-image">
                        </a>
                    </div>
                </div>
                <div class="ins-adaptive-description ins-selectable-element ins-element-wrap ins-element-text">
                    <div id="text-1454703513202" class="ins-element-content ins-editable-text ins-text-color">
                        <div class="ins-editable ins-element-editable ins-dynamic-text-area" id="editable-text-1454703513202" data-bind-menu="notification|text_editing">Có&nbsp;<span class="ins-dynamic-element-tag ins-selected-dynamic-element" data-product-type="social-proof"></span>&nbsp;người đang xem cùng bạn
                            <div>
                                <div><span class="ins-dynamic-span"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        .notifi{top: 70px!important;}
    }

</style>
@endsection
