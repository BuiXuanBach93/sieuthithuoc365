@extends('site.layout.site')
@section('robots', 'noindex')
@section('googlebot', 'noindex')
@section('bingbot', 'noindex')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title','Đơn hàng trang cá nhân')
@section('meta_description', 'Thông tin đơn hàng cá nhân')

@section('content')
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
    <section class="main-ctn container">
        <div class="wrapper row">

            <div class="breadcrumbs">
                <div class="wrapper">
                    <ul>
                        <li class="breadcrumb-item">
                            <a class="home" href="">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a itemprop="url" href="" title="Quản lý tài khoản"><span itemprop="title">Thông tin đơn hàng</span></a>
                        </li>
                    </ul>
                </div>
            </div><!--end: .breadcrumbs-->

            <section id="contact-content">
                <div class="col-xs-12 col-md-4 col-lg-3">
                    @include('site.partials.side_bar_user', ['active' => 'inforUser'])
                </div>
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <h1 class="title_order">Tra cứu đơn hàng</h1>
                    <div class="order clearfix">


                        @foreach($orders as $id => $order)
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="orderItem clearfix">
                                        @php $sumPrice = 0;@endphp
                                        @foreach($order->orderItems as $id => $orderItem)
                                            <div class="col-xs-6">
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <img src="{{ $orderItem->image }}" alt="{{ $orderItem->title }}"/>
                                                        </div>
                                                        <div class="col-xs-9">
                                                            <h5>{{ $orderItem->title }}</h5>
                                                            <div class="price">
                                                                Giá:
                                                                    <input type="hidden" class="unitPrice" value="{{ $orderItem->cost }}">
                                                                    <span class="priceDiscount clred">{{ number_format($orderItem->cost, 0, ',', '.') }} VND</span>
                                                            </div>
                                                            <p>Số lượng: {{ $orderItem->quantity }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $sumPrice += $orderItem->cost*$orderItem->quantity ?>
                                        @endforeach
                                            <div class="orderItemFooter clearfix col-xs-12">
                                                <span style="color:red">Thời gian đặt hàng:</span> <?php $date=date_create($order->created_at);
                                                echo date_format($date,"d/m/Y"); ?>
                                                <span style="color:red">vào lúc:</span>
                                                <?php $date=date_create($order->created_at);
                                                echo date_format($date,"H:i:s"); ?>
                                                <br>
                                                <span style="color:red">Tổng tiền:</span><span class="priceDiscount">{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                                                <br>
                                                <?php switch ($order->status) {
                                                    case 1: echo '<label class="label label-info">Đã đặt đơn hàng</label>';break;
                                                    case 2: echo '<label class="label label-warning">Đã nhận đơn hàng</label>';break;
                                                    case 3: echo '<label class="label label-danger">Đang vận chuyển</label>
                                                         <a class="btn btn-success" target="_blank" href="https://buucuc.com/tracking?vid='. $order->shipping_code . '">Tra cứu vận đơn</a>'  ;break;
                                                    case 4: echo '<label class="btn btn-success">Đã giao hàng</label>';break;
                                                    case 5: echo '<label class="btn btn-danger">Đơn chuyển hoàn</label>';break;
                                                }?>
                                            
                                            </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $orders->links() }}
                    </div>

                </div>
            </section><!--end: #content-->
        </div>
    </section>
@endsection
