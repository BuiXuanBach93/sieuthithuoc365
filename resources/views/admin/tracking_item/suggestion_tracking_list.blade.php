@extends('admin.layout.admin')

@section('title', 'Danh sách Tracking item')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách tracking
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Danh sách tracking</a></li>
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
                                <th>Sản phẩm/Danh mục/Tags</th>
                                <th>Nguồn</th>
                                <th>Loại Tracking</th>
                                <th>Ip khách</th>
                                <th>Thời gian</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trackingItems as $id => $item )
                                <tr>
                                    <td>{{ ($id+1) }}</td>
                                    <td>{{ $item->target_product_name }}</td>
                                    <td>{{ $item->source_product_name }}</td>
                                    <td>
                                            @php 
                                                if($item->type == 1) {
                                                    echo "Sản phẩm";
                                                }
                                                if($item->type == 2){
                                                    echo "Danh mục";
                                                }
                                                if($item->type == 3){
                                                    echo "Tags";
                                                }
                                                if($item->type == 4){
                                                    echo "Giỏ hàng";
                                                }
                                                if($item->type == 5){
                                                    echo "Đặt đơn";
                                                }
                                                if($item->type == 6){
                                                    echo "Home page";
                                                }
                                                if($item->type == 7){
                                                    echo "Search";
                                                }
                                                if($item->type == 8){
                                                    echo "Tư vấn";
                                                }
                                            @endphp
                                     </td>
                                    <td>{{ $item->ip_customer }}</td>
                                    <td>{{ $item->created_at }}</td>    
                                    <td>
                                        <a  href="{{ route('tracking_item.destroy', ['tracking_id' => $item->tracking_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%">STT</th>
                                <th>Sản phẩm/Danh mục/Tags</th>
                                <th>Nguồn</th>
                                <th>Loại Tracking</th>
                                <th>Ip khách</th>
                                <th>Thời gian</th>
                                <th>Thao tác</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div>
                            {{ $trackingItems->links() }}
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

