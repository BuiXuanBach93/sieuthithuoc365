@extends('admin.layout.admin')

@section('title', 'Cài đặt thanh toán')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CHI TIẾT ĐƠN HÀNG
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
                        <h3 class="box-title">Thông Tin Đơn Hàng</h3>
                    </div>
                    <!-- /.box-header -->

                <div class="box-body">
                    <form action="{{ route('orderUpdatePrice') }}" method="post">
                          {!! csrf_field() !!}
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <td colspan="2">
                                    <h4>Thông tin đơn hàng</h4>
                                    <p>Mã đơn hàng: #{{ $order->order_id }}</p>
                                    <p>IP khách hàng: {{ $order->ip_customer }}</p>
                                    <p>Ngày
                                        đặt: <?php $dateOrder = new \DateTime($order->created_at); echo $dateOrder->format('d/m/Y H:i'); ?></p>
                                    {{--<p>Hình thức vận chuyển: </p>--}}
                                    <p>Hình thức thanh toán: {{ $order->method_payment }}</p>
                                </td>
                                <td colspan="2">
                                    <h4>Thông tin người nhận hàng</h4>
                                    @if($order->status != 4)
                                        Người nhận: <input readonly="readonly" type="text" class="form-control" name="shipping_name" value="{{ $order->shipping_name }}">
                                    @else
                                    <p>{{ $order->shipping_name }}</p>
                                    @endif
                                    
                                    @if($order->status != 4)
                                        Địa chỉ: <input readonly="readonly" type="text" class="form-control" name="shipping_address" value="{{ $order->shipping_address }}">
                                    @else
                                    <p>Địa chỉ: {{ $order->shipping_address }}</p>
                                    @endif
                                    @if($order->status != 4)
                                        Số điện thoại: <input readonly="readonly" type="text" class="form-control" name="shipping_phone" value="{{ $order->shipping_phone }}">
                                    @else
                                    <p>Số điện thoại: {{ $order->shipping_phone }}</p>
                                    @endif
                                    
                                    <p>Email: {{ $order->shipping_email }}</p>
                                    
                                    @if($order->have_refund_order == 1)
                                        <p style="color: red;">Khách có đơn chuyển hoàn</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <table id="" class="table table-bordered table-striped">
                            <tr>
                                <td>Ảnh Sản phẩm</td>
                                <td>Tên SP</td>
                                <td>Mã SP</td>
                                <td>Số lượng</td>
                                <td>Đơn giá khi mua</td>
                            </tr>
                            <?php $sumPrice = 0;?>
                            @foreach($orderItems as $idx => $orderItem)
                                <tr>

                                    <td><img src="{{ asset($orderItem->image) }}" alt="{{ $orderItem->title }}" width="70"/></td>
                                    <td><p>{{ !empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title }}</p></td>
                                    <td><p>{{ $orderItem->code }}</p></td>
                                    <td>
                                        @if($order->status != 4)
                                        <input readonly="readonly" type="hidden" value="{{ $orderItem->item_id }}" name="item_id[]"/>
                                        <input readonly="readonly" type="number" class="form-control" name="quantity[]" value="{{ $orderItem->quantity }}" step="any">
                                        @else
                                        <p>{{ $orderItem->quantity }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->status != 4)
                                        <input readonly="readonly" type="text" class="form-control formatPrice" name="cost[]" value="{{ $orderItem->cost }}" step="any">
                                        @else
                                        <div class="price">
                                            {{ number_format($orderItem->cost, 0, ',', '.') }}
                                        </div>
                                        @endif
                                        
                                    </td>

                                </tr>
                                <?php $sumPrice += $orderItem->cost*$orderItem->quantity ?>
                            @endforeach
                            <tr>
                                <td colspan="4">Phí vận chuyển</td>
                                <td>
                                    @if($order->status != 4)
                                        <input readonly="readonly" type="text" class="form-control formatPrice" name="customer_ship" value="{{ $order->customer_ship }}" step="any">
                                    @else
                                    {{ !empty($order->customer_ship) ? $order->customer_ship : 'Miễn Phí'  }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">Thành tiền</td>
                                <td><p>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</p></td>
                            </tr>
                        </table>
                        <input type="hidden" value="{{ $order->order_id }}" name="order_id"/>
                       </form>     
                    </div>


<!-- end -->

                </div>
                
                 @if($order->status != 0)
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cập nhật thông tin kho</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('orderUpdateStock') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="noteAdmin">Ghi chú Admin</label>
                                <textarea readonly="readonly" class="form-control" rows="3" name="noteAdmin" id="noteAdmin">{{ $order->note_admin }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="noteAdmin">Đã gửi hàng</label>
                                <input type="checkbox" name="is_delivery"
                                       {{ !empty($order->is_delivery) ? 'checked' : '' }} class="flat-red">
                            </div>
                            <div class="form-group">
                                <label for="noteAdmin">Mã vận đơn</label>
                                <input type="text" class="form-control" name="shipping_code" value="{{ $order->shipping_code }}" placeholder="Mã vận đơn">
                                <a class="btn btn-success" target="_blank" href="https://buucuc.com/tracking?vid={{ $order->shipping_code }}">Tra cứu vận đơn</a>
                            </div>

                            <div class="form-group">
                                <label for="noteAdmin">Ngày gửi</label>
                                <p><?php $dateOrder = new \DateTime($order->delivery_at); echo $dateOrder->format('d/m/Y'); ?></p>
                            </div>

                            <div class="form-group">
                                <label for="noteAdmin">Ghi chú kho</label>
                                <textarea class="form-control" rows="3" name="note_stock" >{{ $order->note_stock }}</textarea>
                            </div>

                            <input type="hidden" value="{{ $order->order_id }}" name="order_id"/>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
                @endif
                
            </div>
        </div>
        <script>
            $('.formatPrice').priceFormat({
                prefix: '',
                centsLimit: 0,
                thousandsSeparator: '.'
            });
        </script>
    </section>
    @include('admin.partials.popup_delete')
@endsection

