@extends('site.layout.site')
@section('robots', 'noindex')
@section('googlebot', 'noindex')
@section('bingbot', 'noindex')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title','Thông tin tài khoản')
@section('meta_description', 'Thông tin tài khoản')
@section('content')

    <section class="main-ctn container">
        <div class="wrapper row">

            <div class="breadcrumbs">
                <div class="wrapper">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" href="" title="Quản lý tài khoản"><span itemprop="title">Quản lý tài khoản</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="contact-content">
                <div class="col-xs-12 col-md-4 col-lg-3">
                    @include('site.partials.side_bar_user', ['active' => 'inforUser'])
                </div>
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <h1 class="title_contact" style="margin-bottom: 15px;">Thông tin tài khoản</h1>
                    <div class="contact-info ">
                        <form  action="/thong-tin-ca-nhan" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-lg-2 col-md-3 col-sm-4 col-form-label"><span class="text-b700">Họ và tên</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" class="form-control f14" name="name" placeholder="Họ và tên" value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-lg-2 col-md-3 col-sm-4 col-form-label"><span class="text-b700">Điện thoại</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="text" class="form-control f14" name="phone" placeholder="Điện thoại" value="{{ $user->phone }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-lg-2 col-md-3 col-sm-4 col-form-label"><span class="text-b700">Email:</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                    <input type="email" class="form-control f14" name="email" placeholder="email" value="{{ $user->email }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="staticEmail" class="col-lg-2 col-md-3 col-sm-4 col-form-label"><span class="text-b700">Ảnh đại diện:</span></label>
                                <div class="col-lg-10 col-md-9 col-sm-8">
                                <div class="userAvatar boxH5">
                                    <img id="blah" src="{{ (!empty($user->image)) ? asset($user->image) : asset('site/images/no_person.png') }}" alt="trang cá nhân" width="150"/>
                                    <input type='file' id="imgInp" accept="image/*" name="image" onchange="readURL(this)" style="display: none"/>
                                    <input type="hidden" value="{{ $user->image }}" name="avatar" />
                                </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class=" col-lg-2 col-md-3 col-sm-4"></div>
                                <div class="col-lg-10 col-md-9 col-sm-8 pdtop30">
                                    <button type="submit" class="btn btn-primary">Thay đổi thông tin</button>

                                </div>
                            </div>
                        </form>
                    </div><!--end: .contact-info-->
                </div>
            </section><!--end: #content-->


        </div>
    </section>
    <script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
@endsection
