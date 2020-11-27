@extends('admin.layout.admin')

@section('title', 'Chỉnh sửa liên hệ')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh sửa liên hệ{{ $contact->name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li class="active">Chỉnh sửa</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- form start -->
            <form action="{{ route('updateContactAdvisor') }}" method="post">
                {!! csrf_field() !!}
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
                                <input readonly="readonly" type="text" class="form-control" name="name" placeholder="Họ và tên"
                                       value="{{ $contact->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại</label>
                                <input type="text" readonly="readonly" class="form-control" name="phone" placeholder="Điện thoại" value="{{ $contact->phone }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" readonly="readonly" class="form-control" name="email" placeholder="Email" value="{{ $contact->email }}" required />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input readonly="readonly" type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ $contact->address }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời gian</label>
                                <input type="text" readonly="readonly" class="form-control" name="created_at" value="{{ $contact->created_at }}">
                            </div>

							<div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
								@foreach (explode('-', $contact->images) as $image) 
									<img src="{{ $image }}" />
								@endforeach
                            </div>
							
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sản phẩm</label>
                                <textarea readonly="readonly" rows="1" class="form-control" name="message"
                                          placeholder="">{{ $contact->message }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung, kết quả tư vấn</label>
                                <textarea rows="4" class="form-control" name="content"
                                          placeholder="">{{ $contact->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú Admin</label>
                                <textarea readonly="readonly" rows="4" class="form-control" name="admin_note"
                                          placeholder="">{{ $contact->admin_note }}</textarea>
                            </div>

                            <div class="form-group">
                                    <label for="exampleInputEmail1">Phụ trách tư vấn</label>
                                    <select name="pass_to" class="form-control" disabled>
                                        <option value="3"
                                                @if($contact->pass_to == 3) selected @endif>
                                                    Admin</option>
                                            @foreach(\App\Entity\User::getAdvisors() as $advisor)
                                                <option value="{{ $advisor->id }}"
                                                @if($contact->pass_to == $advisor->id) selected @endif>
                                                    {{ $advisor->name }}</option>
                                            @endforeach
                                        </select>
                             </div>

                             <div class="form-group">
                                <label for="noteAdmin">Thành đơn?</label>
                                <input type="checkbox" name="is_ordered"
                                       {{ !empty($contact->is_ordered) ? 'checked' : '' }} class="flat-red">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{ $contact->status==1 ? 'selected' : '' }}>Đã tư vấn</option>
                                    <option value="0" {{ $contact->status==0 ? 'selected' : '' }}>Chưa tư vấn</option>
                                </select>
                            </div>

                            <div class="form-group" style="color: red;">
                                @if ($errors->has('name'))
                                    <label for="exampleInputEmail1">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            <input type="hidden" name="type" value="{{$contact->type}}">
                             <input type="hidden" value="{{ $contact->contact_id }}" name="contact_id"/>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
                    <!-- /.box -->

                </div>
                
            </form>
        </div>
    </section>
@endsection

