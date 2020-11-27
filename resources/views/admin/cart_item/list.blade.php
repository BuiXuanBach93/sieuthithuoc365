@extends('admin.layout.admin')

@section('title', 'Danh sách cart item')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách sản phẩm thêm vào giỏ hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Danh sách sản phẩm thêm vào giỏ</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Mã SP</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Vị trí Button</th>
                                <th>Ip Khách</th>
                                <th>Ngày thêm</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $id => $item )
                                <tr>
                                    <td>{{ ($id+1) }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->cost }}</td>
                                    <td>{{ $item->btn_type }}</td> 
                                    <td>{{ $item->ip_customer }}</td>   
                                    <td>{{ $item->created_at }}</td>    
                                    <td>
                                        <a  href="{{ route('cart_item.destroy', ['cart_item_id' => $item->cart_item_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Mã SP</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Vị trí Button</th>
                                <th>Ip Khách</th>
                                <th>Ngày thêm</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div>
                            {{ $cartItems->links() }}
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    @include('admin.partials.popup_delete')
@endsection

