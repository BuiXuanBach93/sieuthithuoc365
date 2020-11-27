@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('type_meta', 'website')
@section('title', !empty($post->meta_title) ? $post->meta_title : $post->title) 
@section('meta_description', !empty($post->meta_description) ? $post->meta_description : $post->description) @section('keywords', $post->meta_keyword) @section('meta_image', asset($post->image) ) 
@section('meta_url', route('page', [ 'post_slug' => $post->slug]) )
@section('canonical', route('page', [ 'post_slug' => $post->slug]) )
@section('meta_image', asset($post->image) ? $post->image : '' )
@section('meta_url', route('page', ['post_slug' => $post->slug]) )

@section('content')

<section class="pdbottom20 bgwhite">
<div class="container">
    <div class="wrapper wrapper-news-detail row">

        <div class="breadcrumbs">
            <div class="wrapper col-xs-12">
                <ul>
                    <li class="breadcrumb-item">
                        <a class="home" href="/">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
                    </li>
        
                    <li class="breadcrumb-item">
                        <a itemprop="url" title="Làm đẹp và sức khỏe"><span itemprop="title">{{ isset($post['title']) ? $post['title'] : '' }}</span></a>
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
			<div class="shared mgbottom20">
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-541a6755479ce315"></script>
			<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_vp3r"></div>
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
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-like" data-href="{{ route('post', ['post_slug' => $post->slug]) }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>
            <!--end: #news-detail-->

            <div class="other-news row">
                <div class="common-heading">
                    <span>Bài viết liên quan</span>
                </div>
                <!--end: .common-heading-->
                <div class="list-thumb clearfix">
                    @foreach(\App\Entity\Post::relativeProduct($post->slug,4) as $post)
                    <div class="item col-md-3 col-sm-6 col-xs-12 ">
                        <a class="thumb" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? $post['title'] : ''}}">
                            <img src="{{ isset($post['image']) ? $post['image'] : ''}}" alt="{{ isset($post['title']) ? $post['title'] : ''}}" />
                        </a>
                        <div class="inf_new">
                            <h2 class="heading"><a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset($post['title']) ? $post['title'] : ''}}">{{ isset($post['title']) ? $post['title'] : ''}}</a></h2>
                            <div class="date"><?php 
							 $date=date_create($post['updated_at']);
							 echo date_format($date,"Y/m/d");
							 ?> </div>
                            <p class="sumary">{{ isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' }} </p>
                        </div>

                    </div>
                    @endforeach
                </div>
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
