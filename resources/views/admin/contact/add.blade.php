@extends('admin.layout.admin')

@section('title', 'Thêm mới liên hệ')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới liên hệ
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- form start -->
            <form role="form" action="{{ route('contact.store') }}" method="POST">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
                <div class="col-xs-12 col-md-6">
    
                    <!-- Nội dung thêm mới -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nội dung</h3>
                        </div>
                        <!-- /.box-header -->

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="text" class="form-control" name="name" value="non-name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Điện thoại</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Điện thoại" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" value="non-email@gmail.com">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="non-address">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sản phẩm</label>
                                    <textarea rows="4" class="form-control" name="message"
                                              placeholder=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung, kết quả tư vấn</label>
                                    <textarea rows="4" class="form-control" name="content"
                                              placeholder=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ghi chú Admin</label>
                                    <textarea rows="4" class="form-control" name="admin_note"
                                              placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chuyển tư vấn cho</label>
                                    <select name="pass_to" class="form-control">
                                     <option value="3">Admin</option>
                                    @foreach(\App\Entity\User::getAdvisors() as $advisor)
                                        <option value="{{ $advisor->id }}">{{ $advisor->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Đã tư vấn</option>
                                        <option value="0">Chưa tư vấn</option>
                                    </select>
                                </div>

                                <div class="form-group" style="color: red;">
                                    @if ($errors->has('name'))
                                        <label for="exampleInputEmail1">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </div>
                    </div>
                    <!-- /.box -->

                </div>
            </form>
        </div>
    </section>
@endsection

