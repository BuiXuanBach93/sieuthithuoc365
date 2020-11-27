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
            <form role="form" action="{{ route('contact.update', ['contact_id' => $contact->contact_id]) }}" method="POST">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
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
                                <input type="text" class="form-control" name="name" placeholder="Họ và tên"
                                       value="{{ $contact->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Điện thoại" value="{{ $contact->phone }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $contact->email }}" />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ $contact->address }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Thời gian</label>
                                <input type="text" class="form-control" name="created_at" value="{{ $contact->created_at }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ip Khách</label>
                                {{ $contact->ip_customer }}
                            </div>
			    <div class="form-group">
                                       <a class="btn btn-success" target="_blank" href="https://www.ip2location.com/demo/{{ $contact->ip_customer }}">Tra cứu IP</a>
                             </div>

							<div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
								@foreach (explode('-', $contact->images) as $image) 
									<img src="{{ $image }}" />
								@endforeach
                            </div>
							
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sản phẩm</label>
                                <textarea rows="4" class="form-control" name="message"
                                          placeholder="">{{ $contact->message }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id sản phẩm</label>
                                <input type="text" readonly="readonly" class="form-control" name="product_id" placeholder="Id sản phẩm" value="{{ $contact->product_id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung, kết quả tư vấn</label>
                                <textarea rows="4" class="form-control" name="content"
                                          placeholder="">{{ $contact->content }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ghi chú Admin</label>
                                <textarea rows="4" class="form-control" name="admin_note"
                                          placeholder="">{{ $contact->admin_note }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="noteAdmin">Thành đơn?</label>
                                <input type="checkbox" name="is_ordered"
                                       {{ !empty($contact->is_ordered) ? 'checked' : '' }} class="flat-red">
                            </div>
                            @if($contact->type == 1)
                            <div class="form-group">
                                <label for="exampleInputEmail1">Loại tư vấn</label>
                                <select class="form-control" name="type">
                                    <option value="0" {{ $contact->type==0 ? 'selected' : '' }}>Tư vấn thường</option>
                                    <option value="1" {{ $contact->type==1 ? 'selected' : '' }}>Remarketing</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="noteAdmin">Mã đơn hàng cũ : </label>
                            <a target="_blank" href="/admin/show-don-hang/{{$contact->order_id}}">
                                            {{$contact->order_id}}
                                            </a>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ngày hẹn</label>
                                <input readonly="readonly" type="text" class="form-control" name="appointment_date" value="{{ $contact->appointment_date }}">
                            </div>
                            <label class="control-label">Cập nhật lại ngày hẹn</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datePickerId"
                                       name="appointment_date_str"/>
                            </div>    
                                
                            @endif  

                            <div class="form-group">
                                    <label for="exampleInputEmail1">Phụ trách tư vấn</label>
                                    <select name="pass_to" class="form-control">
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

