@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', 'Đăng ký')
@section('meta_description', 'Đăng ký tài khoản')
@section('meta_url', 'https://thuocuytin.com.vn/trang/dang-ky' )
@section('canonical', 'https://thuocuytin.com.vn/trang/dang-ky' )
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
                            <a itemprop="url" href="" title="Liên hệ"><span itemprop="title">Đăng ký</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="contact-content">
                <div class="">
                    <h1 class="title_contact" style="margin-bottom: 15px;">Đăng ký</h1>
                    <div class="contact-info col-xs-12 col-xs-offset-0 col-md-offset-2 col-md-8 col-lg-6 col-lg-offset-3">
                        <form  action="/dang-ky" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Họ và tên</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control f14" name="name" placeholder="Họ và tên" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Điện thoại</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control f14" name="phone" placeholder="Điện thoại" value="{{ old('phone') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Email:</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control f14" name="email" placeholder="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Mật khẩu:</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control f14" name="password" placeholder="Mật khẩu" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Nhập lại Mật khẩu:</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control f14" name="password_confirmation" placeholder="Mật khẩu đăng nhập" value="" required>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger" role="alert">
                                    Email đã tồn tại, hoặc bạn nhập sai địa chỉ email
                                </div>
                            @endif
                            @if ($errors->has('password'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Xác nhận mật khẩu không đúng. </strong>
                                </div>
                            @endif
                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8 pdtop30">
                                    <button type="submit" class="btn btn-primary">Đăng ký</button>

                                </div>
                            </div>
                        </form>
                    </div><!--end: .contact-info-->
                </div>
            </section><!--end: #content-->
        </div>
    </section>

@endsection
