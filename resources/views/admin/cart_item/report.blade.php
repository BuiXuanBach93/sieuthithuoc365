@extends('admin.layout.admin')

@section('title', 'Báo cáo tỷ lệ thành đơn')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Báo cáo tỷ lệ thành đơn từ giỏ hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Báo cáo sản phẩm - giỏ hàng</li>
        </ol>

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tìm kiếm</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="{{ route('cartItemReport') }}" method="get">
                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Ngày tìm kiếm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control pull-right" placeholder="31-01-2020" 
                                           name="search_time"/>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                     <div class="box-body">
                        <div>Tổng lần thêm vào giỏ : {{$totalCartItem}}</div>
                        <div>Tổng đơn thành : {{$totalOrderItem}}</div>
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">Mã SP</th>
                                <th>Tên Sản phẩm</th>
                                <th>Đã thêm</th>
                                <th>Thành đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($cartItems as $id => $item)
                                    <tr>
                                        <td>
                                           <p>{{ $item->product_id }}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->product_name}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->qty}}</p>
                                        </td>
                                        <td>
                                           <p>{{ $item->done}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

