@extends('site.layout.site')
@section('robots', 'noindex')
@section('googlebot', 'noindex')
@section('bingbot', 'noindex')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title','Thay đổi mật khẩu')
@section('meta_description', 'Thay đổi mật khẩu')

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
                            <a itemprop="url" href="" title="Quản lý tài khoản"><span itemprop="title">Thay đổi mật khẩu</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="contact-content">
                <div class="col-xs-12 col-md-4 col-lg-3">
                    @include('site.partials.side_bar_user', ['active' => 'resetPassword'])
                </div>
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <h1 class="title_contact" style="margin-bottom: 15px;">Thay đổi mật khẩu</h1>
                    <div class="contact-info ">
                        @if (session('success'))
                            <span class="help-block">
                                <strong> {{ session('success') }}</strong>
                            </span>
                        @endif
                        <form  action="/doi-mat-khau" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Mật khẩu cũ</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input id="password_old" type="password" class="form-control" name="password_old" required>
                                </div>
                                @if (session('faidOldPassword'))
                                    <span class="help-block">
                                                <strong> {{ session('faidOldPassword') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Mật khẩu mới</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label"><span class="text-b700">Nhập lại mật khẩu mới</span><span class="clred pd-05">(*)</span></label>
                                <div class="col-sm-8">
                                    <input id="password-confirm"  type="password" class="form-control" name="password_confirmation" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>Mật khẩu xác nhận lại không đúng.</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8 pdtop30">
                                    <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>

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
