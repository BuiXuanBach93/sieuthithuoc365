@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('type_meta', 'website')
@section('title', !empty($post->meta_title) ? $post->meta_title : $post->title) 
@section('meta_description', !empty($post->meta_description) ? $post->meta_description : $post->description) @section('keywords', $post->meta_keyword ) @section('meta_image', asset($post->image) ) 
@section('meta_url', route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) )
@section('meta_image', asset($post->image) ? $post->image : '' )
@section('canonical', route('post', ['cate_slug' =>  $category->slug, 'post_slug' => $post->slug]) )
@section('category_name', $category->title)
@section('fb_publisher', 'https://www.facebook.com/duocsilekimoanh' )
@section('fb_author', 'https://www.facebook.com/duocsilekimoanh' )
@section('tw_author', '@duocsilekimoanh' )
@section('content')

<script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@graph": [
            {
              "@type": "Organization",
              "@id": "https://thuocuytin.com.vn/#organization",
              "name": "Nhà thuốc uy tín 24h",
              "url": "https://thuocuytin.com.vn/",
              "sameAs": [
                "https://www.facebook.com/thuocuytin.com.vn",
                "https://twitter.com/UyThuoc",
                "https://www.linkedin.com/in/thuocuytin.com.vn",
                "https://nhathuocuytin24h.tumblr.com"
              ],
              "logo": {
                "@type": "ImageObject",
                "@id": "https://thuocuytin.com.vn/#logo",
                "inLanguage": "vi-VN",
                "url": "https://thuocuytin.com.vn/public/library/images/nhathuocuytin24h_logo.png",
                "width": 280,
                "height": 63,
                "caption": "Nhà thuốc uy tín 24h"
              },
              "image": {
                "@id": "https://thuocuytin.com.vn/#logo"
              }
            },
            {
              "@type": "WebSite",
              "@id": "https://thuocuytin.com.vn/#website",
              "url": "https://thuocuytin.com.vn/",
              "name": "NHÀ THUỐC TRỰC TUYẾN 24H CHÍNH HÃNG UY TÍN CHẤT LƯỢNG",
              "description": "Nhà thuốc phân phối tất cả các loại thuốc, thực phẩm chức năng chính hãng từ nhà sản xuất, cam kết chất lượng - giá tốt - uy tín",
              "publisher": {
                "@id": "https://thuocuytin.com.vn/#organization"
              },
              "potentialAction": [
                {
                  "@type": "SearchAction",
                  "target": "https://thuocuytin.com.vn/tim-kiem?word={search_term_string}",
                  "query-input": "required name=search_term_string"
                }
              ],
              "inLanguage": "vi-VN"
            },
            {
              "@type": "ImageObject",
              "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#primaryimage",
              "inLanguage": "vi-VN",
              "url": "https://thuocuytin.com.vn{{$post->image}}",
              "width": 300,
              "height": 300,
              "caption": "{{ isset($post['title']) ? $post['title'] : ''}}"
            },
            {
              "@type": "WebPage",
              "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#webpage",
              "url": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}",
              "name": "{{ isset($post['title']) ? $post['title'] : ''}}",
              "isPartOf": {
                "@id": "https://thuocuytin.com.vn/#website"
              },
              "primaryImageOfPage": {
                "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#primaryimage"
              },
              "datePublished": "{{$post->created_at}}",
              "dateModified": "{{$post->updated_at}}",
              "description": "{{$post->meta_description}}",
              "breadcrumb": {
                "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#breadcrumb"
              },
              "inLanguage": "vi-VN",
              "potentialAction": [
                {
                  "@type": "ReadAction",
                  "target": [
                    "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}"
                  ]
                }
              ]
            },
            {
              "@type": "BreadcrumbList",
              "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#breadcrumb",
              "itemListElement": [
                {
                  "@type": "ListItem",
                  "position": 1,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://thuocuytin.com.vn/",
                    "url": "https://thuocuytin.com.vn/",
                    "name": "Home"
                  }
                },
                {
                  "@type": "ListItem",
                  "position": 2,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://thuocuytin.com.vn/{{$category->slug}}",
                    "url": "https://thuocuytin.com.vn/{{$category->slug}}",
                    "name": "{{$category->title}}"
                  }
                },
                {
                  "@type": "ListItem",
                  "position": 3,
                  "item": {
                    "@type": "WebPage",
                    "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}",
                    "url": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}",
                    "name": "{{$post->title}}"
                  }
                }
              ]
            },
            {
              "@type": "Article",
              "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#article",
              "isPartOf": {
                "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#webpage"
              },
              "author": {
                "@id": "https://thuocuytin.com.vn/author/duocsilekimoanh"
              },
              "headline": "{{$post->title}}",
              "datePublished": "{{$post->created_at}}",
              "dateModified": "{{$post->updated_at}}",
              "commentCount": 0,
              "mainEntityOfPage": {
                "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#webpage"
              },
              "publisher": {
                "@id": "https://thuocuytin.com.vn/#organization"
              },
              "image": {
                "@id": "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#primaryimage"
              },
              "articleSection": "",
              "inLanguage": "vi-VN",
              "potentialAction": [
                {
                  "@type": "CommentAction",
                  "name": "Comment",
                  "target": [
                    "https://thuocuytin.com.vn/{{$category->slug}}/{{$post->slug}}#respond"
                  ]
                }
              ]
            },
            {
              "@type": [
                "Person"
              ],
              "@id": "https://thuocuytin.com.vn/author/duocsilekimoanh",
              "name": "Dược Sĩ Lê Kim Oanh",
              "image": {
                "@type": "ImageObject",
                "@id": "https://thuocuytin.com.vn/#authorlogo",
                "inLanguage": "vi-VN",
                "url": "https://s.gravatar.com/avatar/33401070ddcbb63fcce2edfd59e3ccdf",
                "caption": "Dược Sĩ Lê Kim Oanh"
              },
              "description": "Tôi luôn nỗ lực cống hiến hết mình để góp phần đẩy lùi bệnh tật mang đến cuộc sống khỏe đẹp cho những người xung quanh, cống hiến cho nền Y Dược nước nhà.",
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

<section class="pdbottom20 bgwhite">
<div class="container">
    <div class="wrapper wrapper-news-detail row">

        <div class="breadcrumbs">
            <div class="wrapper col-xs-12">
                <ul>
                    <li class="breadcrumb-item">
                        <a class="home" href="/">Trang chủ</a>
                    </li>
        
                    <li class="breadcrumb-item">
                        <a itemprop="url"><span itemprop="title">{{ isset($post['title']) ? $post['title'] : '' }}</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--end: .breadcrumbs-->

        <div id="news-detail" class="col-xs-12">
            <h1 class="news-title">{{ isset($post['title']) ? $post['title'] : '' }}</h1>
            <div class="news-date">
                <span class="date">{{ isset($post['updated_at']) ? $post['updated_at'] : '' }}</span>
               
            </div>
            <div class="sumary_new">
                {!! isset($post['content']) ? $post['content'] : 'Đang cật nhập thông tin' !!}

            </div>
            @if(!empty($post['tags']))
                <div class="tags">
                    <p class="timkiem_dathang">Gợi ý tìm kiếm:</p>

                    @foreach(explode(',', $post['tags']) as $tag)
                        <a href="/tags?tags={{ $tag }}" title="{{ $tag }}"><span class="tag">{{ $tag }},</span></a>
                    @endforeach

                </div>
            @endif
            <br>
            <div class="col-12" style="margin: 15px">
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
   </script>
   <div class="fb-like" data-href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
</div>

            <div>
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
                    @foreach(\App\Entity\Post::categoryShow($urls[2],15) as $post)
                        @php $category = \App\Entity\Category::getDetailCategory($urls[2]); @endphp
                         @include('site.partials.itemnew')
                    @endforeach
                  </div>
               </div>
               <!--end: .list-->
            </div>
             @endforeach
            @endforeach
            <!--end: .block-news-content-->
                <!--end: .list-thumb-->
            </div>

            <div class="other-news">
            </div>

            <input id="category_id" type="hidden" value="1468" />

            <div class="clearfix"></div>

        </div>
</div>
</section>
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
@endsection
