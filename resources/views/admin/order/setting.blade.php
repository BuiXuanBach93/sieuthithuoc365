@extends('admin.layout.admin')

@section('title', 'Cài đặt thanh toán')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cài thanh toán
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cài đặt thanh toán</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#payment" aria-controls="home" role="tab" data-toggle="tab">Cài đặt thanh toán</a></li>
                    <li role="presentation"><a href="#getfly" aria-controls="profile" role="tab" data-toggle="tab">Cài đặt getfly</a></li>
                    <li role="presentation"><a href="#email" aria-controls="profile" role="tab" data-toggle="tab">Cấu hình email</a></li>
                    <li role="presentation"><a href="#facebook" aria-controls="profile" role="tab" data-toggle="tab">Cấu hình facebook</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="payment">
                        <div class="row">
                            <!-- form start -->
                            <div class="col-xs-12 col-md-6">

                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Quản lý phí ship</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Hình thức ship</th>
                                                <th>Chi phí</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderShips as $id => $orderShip )
                                                <tr>
                                                    <td>{{ ($id+1) }}</td>
                                                    <td>{{ $orderShip->method_ship }}</td>
                                                    <td>{{ $orderShip->cost }}</td>
                                                    <td>
                                                        <a  href="{{ route('orderShips.destroy', ['order_ship_id' => $orderShip->order_ship_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Hình thức ship</th>
                                                <th>Chi phí</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-body">
                                        <h4 class="box-title">Thêm mới phí ship</h4>
                                        <form action="{{ route('cost_ship') }}" method="post">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label>Hình thức ship</label>
                                                <input type="text" class="form-control" name="method_ship" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá ship</label>
                                                <input type="number" class="form-control" name="cost" required/>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>

                            <div class="col-xs-12 col-md-6">

                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Quản lý ngân hàng</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Tên tài khoản</th>
                                                <th>Số tài khoản</th>
                                                <th>Chủ tài khoản</th>
                                                <th>Chi nhánh</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderBanks as $id => $orderBank )
                                                <tr>
                                                    <td>{{ ($id+1) }}</td>
                                                    <td>{{ $orderBank->name_bank }}</td>
                                                    <td>{{ $orderBank->number_bank }}</td>
                                                    <td>{{ $orderBank->manager_account }}</td>
                                                    <td>{{ $orderBank->branch }}</td>
                                                    <td>
                                                        <a  href="{{ route('orderBanks.destroy',['order_bank_id ' => $orderBank->order_bank_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th width="5%">STT</th>
                                                <th>Tên tài khoản</th>
                                                <th>Số tài khoản</th>
                                                <th>Chủ tài khoản</th>
                                                <th>Chi nhánh</th>
                                                <th>Thao tác</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="box-body">
                                        <h4 class="box-title">Thêm mới ngân hàng</h4>
                                        <form action="{{ route('bank') }}" method="post">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label>Tên ngân hàng</label>
                                                <input type="text" class="form-control" name="name_bank" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Số tài khoản</label>
                                                <input type="text" class="form-control" name="number_bank" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Chủ tài khoản</label>
                                                <input type="text" class="form-control" name="manager_account" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Chi nhánh</label>
                                                <input type="text" class="form-control" name="branch" required/>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <!-- /.box -->
                            </div>

                            {{--<div class="col-xs-12 col-md-6">--}}

                                {{--<!-- Nội dung thêm mới -->--}}
                                {{--<div class="box box-primary">--}}
                                    {{--<div class="box-header with-border">--}}
                                        {{--<h3 class="box-title">Quản lý điểm quy đổi</h3>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.box-header -->--}}

                                    {{--<div class="box-body">--}}
                                        {{--<form action="{{ route('updateSetting') }}" method="post">--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Một điểm tương ứng bao nhiêu tiền</label>--}}
                                                {{--<input type="number" class="form-control" name="point_to_currency"--}}
                                                       {{--value="{{ (isset($settingOrder->point_to_currency)) ? $settingOrder->point_to_currency : '' }}" required/>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Số tiền mua hàng tương ứng 1 điểm</label>--}}
                                                {{--<input type="number" class="form-control" name="currency_give_point" value="{{ (isset($settingOrder->currency_give_point)) ? $settingOrder->currency_give_point : '' }}" required/>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<button type="submit" class="btn btn-primary">Thêm mới</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<!-- /.box -->--}}
                            {{--</div>--}}

                            {{--<div class="col-xs-12 col-md-6">--}}

                                {{--<!-- Nội dung thêm mới -->--}}
                                {{--<div class="box box-primary">--}}
                                    {{--<div class="box-header with-border">--}}
                                        {{--<h3 class="box-title">Quản lý mã giảm giá</h3>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.box-header -->--}}

                                    {{--<div class="box-body">--}}
                                        {{--<table id="example1" class="table table-bordered table-striped">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th width="5%">STT</th>--}}
                                                {{--<th>Mã giảm giá</th>--}}
                                                {{--<th>Phương thức sale</th>--}}
                                                {{--<th>Mức sale</th>--}}
                                                {{--<th>Số lần sale</th>--}}
                                                {{--<th>Thời gian bắt đầu</th>--}}
                                                {{--<th>Thời gian kết thúc</th>--}}
                                                {{--<th>Thao tác</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--@foreach($orderCodeSales as $id => $orderCodeSale )--}}
                                                {{--<tr>--}}
                                                    {{--<td>{{ ($id+1) }}</td>--}}
                                                    {{--<td>{{ $orderCodeSale->code }}</td>--}}
                                                    {{--<td>{{ ($orderCodeSale->method_sale == 0) ? 'tiền' : '%' }}</td>--}}
                                                    {{--<td>{{ $orderCodeSale->sale }}</td>--}}
                                                    {{--<td>{{ $orderCodeSale->many_use }}</td>--}}
                                                    {{--<td>{{ $orderCodeSale->start }}</td>--}}
                                                    {{--<td>{{ $orderCodeSale->end }}</td>--}}
                                                    {{--<td>--}}
                                                        {{--<a  href="{{ route('orderCodeSales.destroy',['order_code_sale_id ' => $orderCodeSale->order_code_sale_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete"--}}
                                                            {{--onclick="return submitDelete(this);">--}}
                                                            {{--<i class="fa fa-trash-o" aria-hidden="true"></i>--}}
                                                        {{--</a>--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
                                            {{--</tbody>--}}
                                            {{--<tfoot>--}}
                                            {{--<tr>--}}
                                                {{--<th width="5%">STT</th>--}}
                                                {{--<th>Mã giảm giá</th>--}}
                                                {{--<th>Phương thức sale</th>--}}
                                                {{--<th>Mức sale</th>--}}
                                                {{--<th>Số lần sale</th>--}}
                                                {{--<th>Thời gian bắt đầu</th>--}}
                                                {{--<th>Thời gian kết thúc</th>--}}
                                                {{--<th>Thao tác</th>--}}
                                            {{--</tr>--}}
                                            {{--</tfoot>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}

                                    {{--<div class="box-body">--}}
                                        {{--<h4 class="box-title">Thêm mới mã giảm giá</h4>--}}
                                        {{--<form action="{{ route('code_sale') }}" method="post">--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Mã giảm giá</label>--}}
                                                {{--<input type="text" class="form-control" name="code" required/>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Phương thức sale</label>--}}
                                                {{--<input type="radio" name="method_sale" value="0" checked/> Theo tiền--}}
                                                {{--<input type="radio" name="method_sale" value="1" /> Theo %--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Mức sale</label>--}}
                                                {{--<input type="number" class="form-control" name="sale" required/>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Số lần sử dụng</label>--}}
                                                {{--<input type="number" class="form-control" name="many_use" required/>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label>Thời gian khuyến mãi:</label>--}}
                                                {{--<div class="input-group">--}}
                                                    {{--<div class="input-group-addon">--}}
                                                        {{--<i class="fa fa-clock-o"></i>--}}
                                                    {{--</div>--}}
                                                    {{--<input type="text" class="form-control pull-right" id="reservationtime" name="code_sale_start_end" />--}}
                                                {{--</div>--}}
                                                {{--<!-- /.input group -->--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<button type="submit" class="btn btn-primary">Thêm mới</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}

                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<!-- /.box -->--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="getfly">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Cài đặt getfly</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <form action="{{ route('updateSettingGetFly') }}" method="post">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label>api key</label>
                                                <input type="text" class="form-control" name="api_key" value="{{ \App\Entity\SettingGetfly::getApiKey() }}"
                                                       placeholder="Mã api_key getfly cung cấp..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Đường dẫn website</label>
                                                <input type="text" class="form-control" name="base_url" value="{{ \App\Entity\SettingGetfly::getBaseUrl() }}"
                                                       placeholder="https://vn3c.getflycrm.com/..." />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane" id="email">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Cấu hình email</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Phương thức gửi email</label>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio"  name="method" class="method_email" onclick="return changeMethod(this);" value="0" {{ ($settingEmail->method == 0) ? 'checked' : '' }}/> SMTP
                                            </label>
                                            <label>
                                                <input type="radio"  name="method" class="method_email" onclick="return changeMethod(this);" value="1" {{ ($settingEmail->method == 1) ? 'checked' : '' }}/> API
                                            </label>
                                        </div>
                                    </div>
                                    <div class="box-body {{ ($settingEmail->method == 1) ? 'hide' : ''  }}" id="smtp"   >
                                        <form action="{{ route('updateSettingEmail') }}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" value="0" name="method"/>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email nhận thông tin từ khách hàng</label>
                                                        <input type="text" class="form-control" name="email_receive" placeholder="no-reply@gmail.com"  value="{{ $settingEmail->email_receive }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email hiển thị khi gửi</label>
                                                        <input type="email" class="form-control" name="email_send" value="{{ $settingEmail->email_send }}" placeholder="no-reply@gmail.com" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tài khoản dùng để gửi mail</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $settingEmail->email }}" placeholder="no-reply@gmail.com" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ máy chủ SMTP</label>
                                                        <input type="text" class="form-control" name="address_server" value="{{ $settingEmail->address_server }}" placeholder="smtp.gmail.com" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phương thức truyền tin</label>
                                                        <input type="text" class="form-control" name="driver" value="{{ $settingEmail->driver }}" placeholder="smtp" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Tên hiển thị khi gửi</label>
                                                        <input type="text" class="form-control" name="name_send" placeholder="VN3C" value="{{ $settingEmail->name_send }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mật khẩu</label>
                                                        <input type="password" class="form-control" name="password" placeholder="..." value="{{ $settingEmail->password }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Port</label>
                                                        <input type="number" class="form-control" name="port" placeholder="465" value="{{ $settingEmail->port }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phương thức mã hóa</label>
                                                        <input type="text" class="form-control" name="encryption" value="{{ $settingEmail->encryption }}" placeholder="ssl" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-xs-12">
                                                    <label>Chữ ký</label>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nội dung</label>
                                                        <textarea class="editor" id="content" name="sign" rows="10" cols="80"/>{{ $settingEmail->sign }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="box-body" id="smtp">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12">
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="box-body {{ ($settingEmail->method == 0) ? 'hide' : ''  }}" id="api" >
                                        <form action="{{ route('updateSettingEmail') }}" method="post">
                                            {!! csrf_field() !!}
                                            <input type="hidden" value="1" name="method"/>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Email nhận thông tin từ khách hàng</label>
                                                        <input type="text" class="form-control" name="email_receive" placeholder="no-reply@gmail.com"  value="{{ $settingEmail->email_receive }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nhà cung cấp</label>
                                                        <input type="text" class="form-control" name="supplier" placeholder="MailGun"  value="{{ $settingEmail->supplier }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email hiển thị khi gửi</label>
                                                        <input type="email" class="form-control" name="email_send" placeholder="no-reply@gmail.com" value="{{ $settingEmail->email_send }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>API KEY</label>
                                                        <input type="text" class="form-control" name="api_key" placeholder="..." value="{{ $settingEmail->api_key }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Tên hiển thị khi gửi</label>
                                                        <input type="text" class="form-control" name="name_send" placeholder="VN3C" value="{{ $settingEmail->name_send }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Địa chỉ kết nối</label>
                                                        <input type="text" class="form-control" name="address_server" placeholder="..." value="{{ $settingEmail->address_server }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phương thức truyền tin</label>
                                                        <input type="text" class="form-control" name="driver" value="{{ $settingEmail->driver }}" placeholder="smtp" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Host</label>
                                                        <input type="text" class="form-control" name="host" value="{{ $settingEmail->host }}" placeholder="smtp.mailgun.org" />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-xs-12">
                                                    <label>Chữ ký</label>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nội dung</label>
                                                        <textarea class="editor" id="content1" name="sign" rows="10" cols="80"/>{{ $settingEmail->sign }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-body" id="smtp">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="box-body">
                                <div class="col-xs-12 col-md-6">
                                    <form action="{{ route('testEmail') }}" method="post">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Kiểm tra cấu hình email</label>
                                            <input type="email" class="form-control" name="email_test" placeholder="Nhập email kiểm tra cấu hình" value="" />
                                        </div>
                                        @if (isset($_GET['error']) && $_GET['error'] == 1)
                                            <div class="form-group" style="color: red;">
                                                <label for="exampleInputEmail1">Lỗi xảy ra trong quá trình cấu hình email</label>
                                            </div>
                                        @elseif (isset($_GET['error']) && $_GET['error'] == 0)
                                            <div class="form-group" style="color: forestgreen;">
                                                <label for="exampleInputEmail1">Email gửi thành công!. Chúc mừng bạn. ^^</label>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Kiểm tra cấu hình</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="facebook">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <!-- Nội dung thêm mới -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Kế nối với tài khoản facebook của bạn</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        @if (empty(\Illuminate\Support\Facades\Auth::user()->accesstoken))
                                        <div class="form-group" >
                                            <a href="{{ $loginUrl }}" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                                Đăng nhập facebook </a>
                                        </div>
                                        <div class="form-group">
                                            Chúng tôi cần kết nối với tài khoản Facebook của bạn để đồng bộ dữ liệu quản lý của hàng trên Facebook
                                        </div>
                                            @else
                                            Bạn đã đăng nhập vào hệ thống, vui lòng trải nghiệm tính năng của chúng tôi. ^^. <br>
											 <a href="{{ $loginUrl }}" class="btn btn-primary"><i class="fa fa-facebook-official" aria-hidden="true"></i>
                                                Đăng nhập lại facebook </a>
                                        @endif
                                        <a href="{!! route('comment_facebook') !!}">Kiểm tra comment</a>
										
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function changeMethod(e) {
                var val = $(e).val();
                if (val == 0) {
                    $('#smtp').removeClass('hide');
                    $('#api').addClass('hide');
                } else {
                    $('#smtp').addClass('hide');
                    $('#api').removeClass('hide');
                }
            }
        </script>
    </section>
    @include('admin.partials.popup_delete')
@endsection

