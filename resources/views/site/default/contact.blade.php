@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title','Liên hệ')
@section('meta_url', 'https://sieuthithuoc365.com/lien-he')
@section('canonical', 'https://sieuthithuoc365.com/lien-he')
@section('meta_description', 'Liên hệ với nhà thuốc để được hỗ trợ')

@section('content')

    <section class="dd-menu">
        <div class="wrapper">
        </div><!--end: .canvas-->
    </section>
    <section class="main-ctn">
		<div class="container">
        <div class="wrapper">

            <div class="breadcrumbs">
                <div class="wrapper col-xs-12">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="">Trang chủ <i class="fa fa-angle-right mgleft10"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" href="" title="Liên hệ"><span itemprop="title">Liên hệ</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->
            <section id="contact-content" class="row">
                <div class="col-xs-12">
                    <p class="title_contact">Liên hệ với chúng tôi</p>
                    @if(isset($success))
                    <div class="contact-info">
                        <p style="color: red; font-size: 18px; padding: 25px 0 40px 0;">{!! (isset($success)) ? "Cảm ơn bạn đã gửi thông tin liên hệ cho chúng tôi, chúng tôi sẽ phản hồi trong thời gian sớm nhất " : '' !!}</p>
                    </div><!--end: .contact-info-->
                    @endif
                    <div class="clearfix contact-form">
                        <div class="sub-more-news">
                            <form id="frm_contact" method="post" action="{{ route('sub_contact') }}" onSubmit="return contact(this);">
                                {!! csrf_field() !!}
                                <div class="left">
                                    <input value="" name="name" id="name" placeholder="Họ và tên" type="text" required/>
                                    <input value="" name="address" id="address" placeholder="Địa chỉ" type="text" required/>
                                    <input value="" name="phone" id="phone" placeholder="Điện thoại" type="text" required/>
                                    <input value="" name="email" id="email" placeholder="Email" type="email" required />
                                    <input type="hidden" class="form-control"  name="from" value="contact-page" />
                                </div>
                                <div class="right">
                                    <textarea name='message' id='message' placeholder="Nội dung"></textarea>
                                </div>
                                <div class="left">
                                    <button class="btn-submit" type="submit" title="Gửi liên hệ">Gửi liên hệ</button>
                                </div><!--end: .bound-input-->
                            </form>
                        </div><!--end: .sub-more-news-->
                        <div class="sub-more-news">
                        </div><!--end: .sub-more-news-->
                    </div><!--end: .more-news-->
                </div>

                <div class="col-xs-12">
					<div class="map">
                    <div class="info">
                        <p><span style="font-size:14px;"><strong>Địa chỉ:</strong></span></p>

                        <p>{{ isset($information['dia-chi']) ? $information['dia-chi'] :  '' }}&nbsp;</p>

                        <p><strong><span style="font-size:14px;">Thời gian hoạt động:</span></strong></p>
                        <p>
							<span style="font-size:14px;">
								{{ isset($information['thoi-gian-lam-viec']) ? $information['thoi-gian-lam-viec'] :  '' }}&nbsp;
							</span>
                        </p>
                        <p><strong><span style="font-size:14px;">Số điện thoại:</span></strong></p>
                        <p>
                            <span font-size:="" helvetica="" liberation="" style="color: rgb(102, 102, 98); font-family: " text-align:="">
                                <span style="font-size:14px;">{{ isset($information['hotline']) ? $information['hotline'] : '' }} | Mobile: {{ isset($information['so-dien-thoai']) ? $information['so-dien-thoai'] : '' }}</span>
                            </span>
                            <span style="font-size:14px;">
                                <span helvetica="" liberation="" style="border: 0px; margin: 0px; padding: 0px; color: rgb(102, 102, 98); font-family: " text-align:="">
                                    <span style="border: 0px; margin: 0px; padding: 0px; font-family: Arial;">&nbsp;
                                    </span>
                                </span>
                                <span helvetica="" liberation="" style="color: rgb(102, 102, 98); font-family: " text-align:="">&nbsp;
                                </span>
                            </span>
                        </p>

                    </div>
                    <div class="map-view">
                        <p>
                            {!! isset($information['nhung-ban-do']) ? $information['nhung-ban-do'] :  ''  !!}
                        </p>
                    </div>
					</div>
                </div>
				</div>
            </section><!--end: #content-->
        </div>
    </section>
    <div class="banner_left">
    </div>
    <div class="banner_right">
    </div>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQ64KT6" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>
@endsection
