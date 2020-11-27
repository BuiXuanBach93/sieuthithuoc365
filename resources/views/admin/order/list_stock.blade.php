@extends('admin.layout.admin')

@section('title', 'Cài đặt thanh toán')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cài đặt thanh toán</li>
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
                        <form method="get">
                            <div class="form-group col-xs-12 col-md-6">
                                <input class="form-control"
                                       value="{{ !empty($_GET['order_id']) ? $_GET['order_id'] : '' }}" name="order_id"
                                       placeholder="id đơn hàng"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <input class="form-control" value="{{ !empty($_GET['phone']) ? $_GET['phone'] : '' }}"
                                       name="phone" placeholder="Số điện thoại khách hàng"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <input class="form-control" value="{{ !empty($_GET['email']) ? $_GET['email'] : '' }}"
                                       name="email" placeholder="Mail khách hàng"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <input class="form-control" value="{{ !empty($_GET['name']) ? $_GET['name'] : '' }}"
                                       name="name" placeholder="Tên khách hàng"/>
                            </div>

                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Đơn nội thành</label>
                                <input type="checkbox" name="current_city" value="1"
                                       class="flat-red" {{ (!empty($_GET['current_city']) && $_GET['current_city'] == 1) ? 'checked' : '' }}/>
                            </div>

                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Trạng thái đơn hàng</label>
                                <select name="status">
                                    <option value="-1">
                                        Chọn
                                    </option>
                                    <option value="3">
                                        Đã nhận đơn hàng
                                    </option>
                                    <option value="4">
                                        Đang vận chuyển
                                    </option>
                                </select>
                            </div>
			    
			    <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Trạng thái kho</label>
                                <select name="is_delivery">
                                    <option value="-1">
                                        Chọn
                                    </option>
                                    <option value="1">
                                        Chưa gửi hàng
                                    </option>
                                    <option value="2">
                                        Đã gửi hàng
                                    </option>
                                </select>
                            </div>
			    
                            <input type="hidden" value="{{ !empty($_GET['user_id']) ? $_GET['user_id'] : '' }}"
                                   name="user_id"/>
                            <div class="form-group col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                <!-- <a href="{{ route('exportToExcel') }}" class="btn btn-success">Xuất ra Excel</a> -->
                            </div>
                        </form>
                    </div>

                    <div class="box-body">
    
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">Mã đơn hàng</th>
                                <th>Tên và SĐT</th>
                                <th>Tổng tiền</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đặt hàng</th>
				<th>Trạng thái đơn</th>
                                <th>Trạng thái kho</th>
                                <th width="20%">Sản phẩm</th>
                                <th width="10%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $id => $order)
                                    <?php $productCode = '';?>
                                    @foreach($order->orderItems as $idx => $orderItem)
                                        <?php $productCode .= (!empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title) . '; '?>
                                    @endforeach

                                    <tr>
                                        <td>#{{ $order->order_id }}</td>
                                        <td>
                                            <p>{{ $order->shipping_name }}</p>
                                            <p>{{ $order->shipping_phone }}</p>
                                        </td>
                                        <td>
                                            {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
                                        </td>
                                        <td @php if($order->current_city == 1): @endphp style="background-color:#99ff33;" @php endif; @endphp>
                                            <p>{{ $order->shipping_address }}</p>
                                        </td>
                                        <td>
                                            <?php $dateOrder = new \DateTime($order->created_at); echo $dateOrder->format('d/m/Y H:i'); ?>
                                        </td>
					<td @php if($order->status == 1): @endphp style="background-color:#ec1c24;" @php endif; @endphp
                                            @php if($order->status == 0): @endphp style="background-color:#808080;" @php endif; @endphp    
                                         >
                                            @php 
												switch ($order->status) {
													case 0:
														echo "Hủy đơn hàng";
														break;
													case 1:
														echo "Đã đặt đơn hàng";
														break;
													case 2:
														echo "Đã nhận đơn hàng";
														break;
													case 3:
														echo "Đang vận chuyển";
														break;
													case 4:
														echo "Đã giao hàng";
														break;	
                                                    case 5:
                                                        echo "Đơn chuyển hoàn";
                                                        break;      
												}
											@endphp
                                        </td>
										<td @php if($order->is_delivery == 0 && $order->status != 0): @endphp style="background-color:#ec1c24;" @php endif; @endphp   
                                         >
                                            @php 
												if($order->is_delivery == 0 && $order->status != 0) {
													echo "Chưa gửi hàng";
												}
												if($order->is_delivery == 1){
													echo "Đã gửi hàng";
												}
											@endphp
                                        </td>
                                        <td>
                                            <p>{{ $productCode }}</p>
                                        </td>
                                        <td>
                                            <a href="{{ route('showOrderStocker', ['order_id' => $order->order_id]) }}">
                                                <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{ $orders->links() }}
        </div>
    </section>
    @include('admin.partials.popup_delete')
@endsection

