@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')
@section('meta_url', 'https://thuocuytin.com.vn/danh-muc/'.$category->slug)
@section('canonical', 'https://thuocuytin.com.vn/danh-muc/'.$category->slug)
@section('content')
<!--     <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/news/assets/css/news-responsive.css" /> -->
   <!--  <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/templates/version3/bootstraps/bootstrap/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" media="screen" href="nhathuoc365/modules/news/assets/css/home.css" /> -->

    <section class="main-ctn">
		<div class="container">
        <div class="wrapper wrapper-news clearfix row">
            <div class="breadcrumbs col-xs-12">
                <div class="wrapper">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="/">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" title="{{ isset($category->title) ?$category->title : '' }}"><span itemprop="title">{{ isset($category->title) ?$category->title : '' }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end: .breadcrumbs-->
          
            
			<div class="row">
            
            <div id="news-content" class="col-md-9 col-sm-12 col-xs-12">
                <p class="title_news">{{ isset($category['title']) ? $category['title'] : ''}}</p>
                <div class="block-news block-news-default" style="margin-bottom: 20px;">
                    <div class="block-news-content clearfix">
                        <div class="col-md-6 col-sm-6 colxs-12">
                            @foreach($posts as $id=>$post)
                            @if($id == 0)
                            <article class="item-featured item-1">
                                <div class="CropImg CropImg60">
                                    <div class="thumbs">
                                        <a class="thumb" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                            <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" onerror="this.src='{{ isset( $post['image']) ? $post['image'] : '' }}'" alt="{{ isset( $post['title']) ? $post['title'] : '' }}" />
                                        </a>
                                    </div>
                                </div>
                                <h2 class="headding"><a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></h2>
                                <div class="date">{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</div>
                                <p class="sumary">{{ isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' }} <a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" style="color:#ff9600">  Xem thêm >></a></p>
                            </article>
                            @endif
                        @endforeach
                        </div>
                        

                    <!--end: .item-featured-->
                        <div class=" col-md-6 col-sm-6 colxs-12">
                            <div class="list">                               
                <!--             @foreach($posts as $id=>$post)
                                @if($id > 0 && $id < 6)
                                    <article class="item item-2 clearfix">

                                        <a class="thumb" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">
                                            <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}" />
                                        </a>
                                        <h2 class="headding"><a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></h2>
                                        <div class="date">{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</div>
                                    </article>
                            @endif
                        @endforeach -->
                        @foreach($posts as $id=>$post)
                                @if($id > 0 && $id < 4)
                                    <article class="item item-2 clearfix row">
                                        <div class="col-md-4">
                                            <div class="CropImg CropImg60">
                                                <a class="thumbs" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">
                                                    <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h3 class="headding"><a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></h3>
                                            <div class="date"><i class="fa fa-calendar mgright5"></i>{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</div>
                                            <div class="summary">{!! isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' !!}</div>
                                        </div>
                                    </article>
                            @endif
                        @endforeach
                             </div>
                        <!--end: .item-->

                            <!--end: .item-->
                        </div>
                        <!--end: .list-->
                    </div>
                    <!--end: .block-news-content-->
                </div>
                @foreach (\App\Entity\Category::getChildrenCategory($category->category_id) as $children)
                    <!-- #block-114-->
                        <div class="block-news block-news-cat mgbottom20 bgwhite">
                            <div class="block-title">
                                <a title="{{ $children->title }}" href="{{ route('site_category_post', ['cate_slug' => $children->slug ]) }}">{{ $children->title }}</a>
                            </div>
                            <!--end: .block-title-->
                            <div class="block-content clearfix">
                                @foreach(\App\Entity\Post::categoryShow($children->slug,1) as $id=>$post)
                                    @if($id == 0 )
                                        <article class="item-top item-1 clearfix col-md-8 col-sm-7 col-xs-12">
                                            <div class="mgbottom10 col-md-6 col-xs-12">
                                                <div class="CropImg CropImg60">
                                                    <div class="thumbs">
                                                        <a class="" href="{{ route('post', ['cate_slug' => $children->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">
                                                            <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}" />
                                                        </a>
                                                    </div>
												</div>
                                            </div>
                                           
                                            <div class="info col-md-6 col-xs-12 clearfix">
                                                <h2 class="headding"><a href="{{ route('post', ['cate_slug' => $children->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></h2>
                                                <p class="date">{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</p>
                                                <p class="summary">{{ isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' }}</p>
                                            </div>
                                        </article>
                                @endif
                            @endforeach
                            <!--end: .item-top-->
                                <div class="list clearfix col-md-4 col-sm-5 col-xs-12 ListItemnew">
                                    <ul>
                                        @foreach(\App\Entity\Post::categoryShow($children->slug,4) as $id=>$post)
                                            @if($id > 0)
                                                <li><a href="{{ route('post', ['cate_slug' => $children->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>

                                <!--end: .list-->
                            </div>
                            <!--end: .block-content-->
                        </div>
                    @endforeach

            </div>

            <div class="col-md-3 col-sm-12 col-xs-12">
              @include('site.partials.side_barnew')
            </div>
			</div>
            <!--end: #content-->
        </div>
		</div>
    </section>
    
@endsection

