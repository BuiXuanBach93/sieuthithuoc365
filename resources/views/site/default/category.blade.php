@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('type_meta', 'website')
@section('title', isset($category['meta_title']) && !empty($category['meta_title']) ? $category['meta_title'] : $category->title)
@section('meta_description',  isset($category['meta_description']) && !empty($category['meta_description']) ? $category['meta_description'] : $category->description)
@section('keywords', isset($category['meta_keyword']) && !empty($category['meta_keyword']) ? $category['meta_keyword'] : '')
@section('meta_image', !empty($category->image) ?  asset($category->image) : $information['logo'] )
@section('meta_url', 'https://thuocuytin.com.vn/danh-muc/'.$category->slug)
@section('canonical', 'https://thuocuytin.com.vn/danh-muc/'.$category->slug)
@section('content')

        <section class="main-ctn">
		<div class="container">
         <div class="wrapper wrapper-news-category row">
         <div class="breadcrumbs colxs-12">
            <div class="wrapper">
                <ul>
                  <li class="breadcrumb-item">
                     <a class="home" href="/">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
                  </li> 
                  <li class="breadcrumb-item">
                     <a itemprop="url" title="{{ $category->title}}"><span itemprop="title">{{ $category->title}}</span></a>
                  </li>
                  
               </ul>
            </div>
         </div>
		<div class="row">
         <div id="news-content" class="col-md-9 col-sm-12 col-xs-12" >
            <div class="news-category">
               <div class="block-news-heading clearfix">
                  <h1 class="head_cat"><span>{{ isset($category['title']) ? $category['title'] : ''}}</span></h1>
               </div>

              <div id="block-114" class="block-news block-news-default row" style="float:none;">
                    <div class="block-news-content clearfix">
                        <div class="col-md-6 col-sm-6 colxs-12">
                            @foreach($posts as $id=>$post)
                            @if($id == 0)
                            <article class="item-featured item-1">
                                <div class="CropImg CropImg60">
									<a class="thumbs" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">
										<img src="{{ isset( $post['image']) ? $post['image'] : '' }}" onerror="this.src='{{ isset( $post['image']) ? $post['image'] : '' }}'" alt="{{ isset( $post['title']) ? $post['title'] : '' }}" />
									</a>
                                </div>
                                <h3 class="headding"><a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" title="{{ isset( $post['title']) ? $post['title'] : '' }}">{{ isset( $post['title']) ? $post['title'] : '' }}</a></h3>
                                <div class="date"><i class="fa fa-calendar mgright5"></i>{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</div>
                                <p class="sumary">{{ isset($post['description']) ? \App\Ultility\Ultility::textLimit($post['description'], 20) : '' }} <a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}" style="color:#ec1b24">  Xem thêm >></a></p>
                            </article>
                            @endif
                        @endforeach
                        </div>
                        

                    <!--end: .item-featured-->
                        <div class=" col-md-6 col-sm-6 col-xs-12 bpdr">
                            <div class="list">                               
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


               
                 <div class="clearfix"></div> 
               <div class="list_2 clearfix row">
                  @foreach($posts as $id=>$post)
                     @if($id >= 4) 
                    
                        <div class="item col-xs-12">
                           <div class="img_sp col-md-4 col-sm-5 col-xs-12" style="float: left;padding-right: 15px;">
                             <div class="CropImg CropImg60 CropImgw100">
								<div class="thumbs">
								   <a href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}"><img src="{{ isset($post['image']) ? asset($post['image']) : ''}}" alt="{{ isset( $post['title']) ? $post['title'] : '' }}"></a>
								 </div>
							   </div>
                           </div>
                           <div class="info col-md-8 col-sm-7 col-xs-12">
                              <h3 class="headding">
                              <a title="{{ isset( $post['title']) ? $post['title'] : '' }}" href="{{ route('post', ['cate_slug' => $category->slug, 'post_slug' => $post->slug]) }}">{{ isset( $post['title']) ? $post['title'] : '' }}
                              </a>
								</h3>
                              <p class="time"><i class="fa fa-calendar mgright5"></i>{{ isset( $post['updated_at']) ? $post['updated_at'] : '' }}</p>
                              <p class="summary">{!! isset($post['content']) ? \App\Ultility\Ultility::textLimit($post['content'], 50) : '' !!}</p>
                           </div>
                        </div>
                     @endif

                  @endforeach
                   
               </div>

               <div class='web-pagination'>
                  <div>
                     {{ $posts->links() }}
                  </div>
               </div>
         </div>

        
		</div>
		 <div class="col-md-3 col-sm-12 col-xs-12 rslb">
              @include('site.partials.side_barnew')
          </div>
         </div>
		 </div>
      </section>
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
@endsection

