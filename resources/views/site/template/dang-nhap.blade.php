@extends('site.layout.site')
@section('robots', 'index, follow')
@section('googlebot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('bingbot', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title', 'Đăng nhập')
@section('meta_description', 'Đăng nhập vào hệ thống')
@section('meta_url', 'https://thuocuytin.com.vn/trang/dang-nhap' )
@section('canonical', 'https://thuocuytin.com.vn/trang/dang-nhap' )
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
                            <a itemprop="url" href="" title="Đăng nhập"><span itemprop="title">Đăng nhập</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="contact-content">
                <div class="">
                    <h1 class="title_contact" style="margin-bottom: 15px;">Đăng nhập</h1>
                    <div class="contact-info col-xs-12 col-xs-offset-0 col-md-offset-2 col-md-8 col-lg-6 col-lg-offset-3">
                        <form  action="/dang-nhap" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Tài khoản</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control f14" name="email" placeholder="Tài khoản đăng nhập" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Mật khẩu</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control f14" name="password" placeholder="Mật khẩu đăng nhập" value="" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="checkbox col-md-8 col-md-offset-4">
                                    <div class="checkbox tiny m-b-2">
                                        <div class="checkbox-overlay">
                                            <input type="checkbox" />
                                            <div class="checkbox-container">
                                                <div class="checkbox-checkmark"></div>
                                            </div>
                                            <label>Ghi nhớ mật khẩu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Thông tin đăng nhập không chính xác. </strong>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8 pdtop30">
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8 offset-4">
                                    <span class="right"><a href="dang-ky" title="">Bạn chưa có tài khoản ? </a></span>
                                </div>
                            </div>
                        </form>
                    </div><!--end: .contact-info-->
                </div>
            </section><!--end: #content-->
        </div>
    </section>

@endsection
