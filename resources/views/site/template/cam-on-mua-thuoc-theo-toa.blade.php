@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', 'Cảm ơn bạn đã mua thuốc theo toa (đơn)')
@section('meta_description', 'Cảm ơn bạn đã mua thuốc theo toa (đơn)')
@section('content')

    <section class="main-ctn">
        <div class="wrapper container">

            <div class="breadcrumbs">
                <div class="wrapper">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" href="" title="Đăng nhập"><span itemprop="title">{{ $post->title }}</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="">
                <div class="">
                    <h1 class="title_contact" style="margin-bottom: 15px;">{{ $post->title }}</h1>
                    <div class="contact-info col-xs-12 col-xs-offset-0 col-md-offset-2 col-md-10 col-lg-8 col-lg-offset-2">
						{!! $post->content !!}
                    </div><!--end: .contact-info-->
                </div>
            </section><!--end: #content-->
        </div>
    </section>

@endsection
