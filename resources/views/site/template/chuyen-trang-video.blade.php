@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')
@section('meta_url', 'https://sieuthithuoc365.com/danh-muc/'.$category->slug)
@section('canonical', 'https://sieuthithuoc365.com/danh-muc/'.$category->slug)
@section('content')
 <section class="main-ctn">
    <div class="wrapper wrapper-news-detail container">
        <div class="breadcrumbs">
            <div class="wrapper">
                <ul>
                    <li class="breadcrumb-item">
                        <a class="home" href="">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a itemprop="url" href="" title="{{ $category->title }}"><span itemprop="title">{{ $category->title }}</span></a>
                    </li>
                </ul>
            </div>
        </div><!--end: .breadcrumbs-->
        <div class="row">
        <div class="cont_video col-md-9 col-sm-12 col-xs-12">
            <div class="video_hot">
                <p class="tit_video_hot">{{ $category->title }}<span class="show"></span></p>
                <div class="list_vd clearfix">
                    <div class="row">
                        @foreach($posts as $id=>$post)
                        <div class="item_video col-lg-4 col-md-4 col-sm-4 col-xs-12 itemvidepheight mgbottom20">
                            <div class="video ">
                                <div class="">

                                    <a title="{{ isset( $post['title']) ? $post['title'] : '' }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                        <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}"
                                             class="thumb-image">

                                    </a>
                                    <a title="{{ isset( $post['title']) ? $post['title'] : '' }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                        <img class="btn-play-vd" src="{{ asset('assets/images/mayquay.png') }}" alt="play" style="display: block;">
                                    </a>
                                </div>
                                 
                            </div>
                            <a class="title-img" title="{{ isset( $post['title']) ? $post['title'] : '' }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                 {{ isset($post['title']) ? \App\Ultility\Ultility::textLimit($post['title'], 14) : '' }}  

                               
                            </a>
                            @php $date = date_create($post->created_at); @endphp
                            <span class="creat-date">{{ date_format($date,"d/m/Y") }}</span>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
            <div class="list_cat clearfix">
                @foreach (\App\Entity\Category::getChildrenCategory($category->category_id) as $children)
                <div class="cat_item">
                    <a class="name_cat" href="{{ route('site_category_post', ['cate_slug' => $children->slug]) }}">{{ $children->title }}</a>
                    <div class="list_vd clearfix">
                        <div class="row">
                            @foreach(\App\Entity\Post::categoryShow($children->slug,4) as $id=>$post)
                            <div class="item_video col-lg-4 col-md-4 col-sm-4 col-xs-12 itemvidepheight">
                                <div class="video">

                                    <a title="{{ $post->title }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                        <img src="{{ isset( $post['image']) ? $post['image'] : '' }}" alt="{{ $post->title }}"
                                             class="thumb-image">
                                    </a>
                                    <a title="{{ $post->title }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
                                         <img class="btn-play-vd" src="{{ asset('assets/images/mayquay.png') }}" alt="play" style="display: block;">
                                      
                                    </a>
                                </div>
                                <a class="title-img" title="{{ $post->title }}"
                                   href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">{{ $post->title }}</a>
                                @php $date = date_create($post->created_at); @endphp
                                <span class="creat-date">{{ date_format($date,"d/m/Y") }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
              @include('site.partials.side_barnew')
            </div>
		</div>
    </div>
</section>
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
@endsection

