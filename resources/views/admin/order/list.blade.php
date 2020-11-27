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
                            <div class="form-group col-xs-12 col-md-6">
                                <input class="form-control" value="{{ !empty($_GET['product_names']) ? $_GET['product_names'] : '' }}"
                                       name="product_names" placeholder="Tên sản phẩm"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Ngày giờ</label>
                                <input type="checkbox" name="is_search_time" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_search_time']) && $_GET['is_search_time'] == 1) ? 'checked' : '' }}/>
                                Tích chọn để search theo thời gian
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservationtime"
                                           name="search_start_end"/>
                                </div>
                            </div>

                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Trạng thái đơn hàng</label>
                                <select name="status">
                                    <option value="-1">
                                        Chọn
                                    </option>
                                    <option  value="1">
                                        Hủy đơn hàng
                                    </option>
                                    <option value="2">
                                        Đã đặt đơn hàng
                                    </option>
                                    <option value="3">
                                        Đã nhận đơn hàng
                                    </option>
                                    <option value="4">
                                        Đang vận chuyển
                                    </option>
                                    <option value="5">
                                        Đã giao hàng
                                    </option>
                                    <option value="6">
                                        Đơn chuyển hoàn
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
			    
                            <div class="form-group col-xs-12 col-md-6">
                                <label class="control-label">Nguồn đơn hàng</label>
                                <select name="order_source">
                                    <option value="-1">
                                        Chọn
                                    </option>
                                    <option value="1">
                                        Đơn Web
                                    </option>
                                    <option value="4">
                                        Đơn Hotline
                                    </option>
                                    <option value="5">
                                        Đơn Fanpage
                                    </option>
                                    <option value="6">
                                        Đơn Zalo
                                    </option>
                                    <option value="7">
                                        Đơn Remarketing
                                    </option>
                                    <option value="8">
                                        Đơn Sumo
                                    </option>
                                    <option value="2">
                                        Đơn Shopee
                                    </option>
                                    <option value="3">
                                        Nguồn khác
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Đã hoàn gốc</label>
                                <input type="checkbox" name="is_redeem_origin" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_redeem_origin']) && $_GET['is_redeem_origin'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Đã chia lợi nhuận</label>
                                <input type="checkbox" name="is_shared_profit" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_shared_profit']) && $_GET['is_shared_profit'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Chưa hoàn gốc</label>
                                <input type="checkbox" name="is_not_redeem_origin" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_not_redeem_origin']) && $_GET['is_not_redeem_origin'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Chưa chia lợi nhuận</label>
                                <input type="checkbox" name="is_not_shared_profit" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_not_shared_profit']) && $_GET['is_not_shared_profit'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Đơn nội thành</label>
                                <input type="checkbox" name="current_city" value="1"
                                       class="flat-red" {{ (!empty($_GET['current_city']) && $_GET['current_city'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <div class="form-group col-xs-6 col-md-3">
                                <label class="control-label">Tìm và Tính doanh thu</label>
                                <input type="checkbox" name="is_cal_revenue" value="1"
                                       class="flat-red" {{ (!empty($_GET['is_cal_revenue']) && $_GET['is_cal_revenue'] == 1) ? 'checked' : '' }}/>
                            </div>
                            <input type="hidden" value="{{ !empty($_GET['user_id']) ? $_GET['user_id'] : '' }}"
                                   name="user_id"/>
                            <div class="form-group col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                <!-- <a href="{{ route('exportToExcel') }}" class="btn btn-success">Xuất ra Excel</a> -->
                            </div>
                        </form>
                    </div>

                    <!-- <div class="box-body">
                        <form action="{{ route('exportToExcel') }}" method="get">
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="noteAdmin">Từ đơn</label>
                                 <input class="form-control"
                                       name="from_order_id"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-6">
                                <label for="noteAdmin">Đến đơn</label>
                                <input class="form-control"
                                       name="to_order_id"/>
                            </div>
                            <div class="form-group col-xs-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Xuất Excel</button>
                            </div>
                        </form>
                    </div> -->

                    <div class="box-body">
                            <div class="form-group col-xs-12 col-md-12">
                                <div class="col-md-3">Doanh số : {{ number_format($totalPrice, 0, ',', '.') }} VNĐ</div>
                                <div class="col-md-3">Tổng gốc : {{ number_format($totalOrigin, 0, ',', '.') }} VNĐ</div>
                                <div class="col-md-3">Tổng ship : {{ number_format($totalShip, 0, ',', '.') }} VNĐ</div>
                                <div class="col-md-3">Doanh thu: {{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</div>
                            </div>
                            <div class="form-group col-xs-12 col-md-12">
                                <div class="col-md-2">Tổng đơn : {{$totalOrders}}</div>
                                <div class="col-md-2">Đã giao : {{$closeOrders}}</div>
                                <div class="col-md-2">Đang vc : {{$deliveryOrders}}</div>
                                <div class="col-md-2">Đã nhận : {{$confirmOrders}}</div>
                                <div class="col-md-2">Đã đặt : {{$notConfirmOrders}} </div>
                                <div class="col-md-2">Chuyển hoàn : {{$returnOrders}} ; Đã hủy : {{$cancelOrders}}</div>
                                <div class="col-md-2">Đơn nội thành : {{$currentCity}}</div>
                            </div>
                        
                        <table  class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th width="5%">Mã đơn hàng</th>
                                <th>Tên và SĐT</th>
                                <th>Tổng tiền</th>
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
                                            <p>{{ $order->shipping_address }}</p>
                                        </td>
                                        <td>
                                            {{ number_format($order->total_price, 0, ',', '.') }} VNĐ
                                        </td>
                                        <td>
                                            <?php $dateOrder = new \DateTime($order->created_at); echo $dateOrder->format('d/m/Y H:i'); ?>
                                        </td>
										<td @php if($order->status == 1): @endphp style="background-color:#ec1c24;" @php endif; @endphp
                                            @php if($order->status == 0): @endphp style="background-color:#808080;" @php endif; @endphp
											@php if($order->status == 5): @endphp style="background-color:#bfbc7a;" @php endif; @endphp  		
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
                                        </td>
										<td @php if($order->is_delivery == 0 && $order->status != 0): @endphp style="background-color:#FFD700;" @php endif; @endphp   
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
                                            <a href="{{ route('orderAdmin.show', ['order_id' => $order->order_id]) }}">
                                                <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a>
                                            <a  href="{{ route('orderAdmin.destroy', ['order_id' => $order->order_id]) }}" class="btn btn-danger btnDelete" data-toggle="modal" data-target="#myModalDelete" onclick="return submitDelete(this);">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
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

