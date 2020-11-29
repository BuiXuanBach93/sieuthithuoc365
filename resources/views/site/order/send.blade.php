@extends('site.layout.site')
@section('robots', 'noindex')
@section('googlebot', 'noindex')
@section('bingbot', 'noindex')
@section('view_port', 'width=device-width, initial-scale=1')
@section('title','Gửi đơn hàng thành công')
@section('meta_description','Cảm ơn quý khách đã đặt hàng thành công trên hệ thống nhà thuốc trực tuyến 24h')
@section('content')
<script type="text/javascript" src="assets/js/jquery.min.js" defer></script>
    <style>
        section.orderPay
        {
        }
        section.orderPay h1
        {
            font-size: 24px;
            padding: 25px 0px;
            display: block;
        }
        section.orderPay  .pay h3.titleV
        {
            text-align: center;
        }
        section.orderPay  .pay h3.titleV i
        {
            padding-right: 5px;
        }
        section.orderPay .pay button
        {
            background: none;
            box-shadow: none;
            border: 1px solid #ccc;
            font-size: 16px;
            border-radius: 6px;
            padding: 7px 24px;
        }
        section.orderPay a
        {
            color: #000;
            text-decoration: none;
        }
        section.orderPay form
        {
            width: 100%;
        }
        section.orderPay form .nextpr
        {
            border: 1px dotted #ccc;
            padding: 2px 5px;
            font-size: 14px;
            display: inline-block;
        }
        .table-striped tbody tr:nth-of-type(odd)
        {
            background: none;
        }
        section.orderPay form .total
        {
            color: red;
        }
        section.orderPay form .content h3 a
        {

            font-size: 20px;
        }
        section.orderPay form .price
        {
            font-size: 14px;
        }
        section.orderPay form .price del
        {
            padding-right: 15px;
        }
    </style>
    <section class="orderPay">
        <div class="container bgpay">

        <div id="idpromotion container">
                <div class="promotion">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 item_policy">
                            <div class="info_policy clearfix">
                                <span class="name-icon pull-left fa fa-truck"></span>
                                <div class="description pull-left">
                                    <h4>SHIP COD TOÀN QUỐC</h4>
                                    <p>Nhận Hàng Mới Thanh Toán</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 item_policy">
                            <div class="info_policy clearfix">
                                <span class="name-icon pull-left fa fa-money"></span>
                                <div class="description pull-left">
                                    <h4>CAM KẾT CHÍNH HÃNG</h4>
                                    <p>Đảm Bảo Chất Lượng 100%</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 item_policy">
                            <div class="info_policy clearfix">
                                <span class="name-icon pull-left fa fa-smile-o"></span>
                                <div class="description pull-left">
                                    <h4>Giá Luôn Tốt Nhất</h4>
                                    <p>Phục Vụ Chu Đáo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 item_policy">
                            <div class="info_policy clearfix">
                                <span class="name-icon pull-left fa fa-phone"></span>
                                <div class="description pull-left">
                                    <h4>Hotline: <span>{{ isset($information['hotline']) ? $information['hotline'] : '' }}</span></h4>
                                    <p>Tư Vấn Tận Tình 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row position-relative mgtop20 bgwhite">
                <div class="icon-pay-success">
                    <img style="width: 50%" src="https://sieuthithuoc365.com/public/library/images/success-icon.png" alt="icon">
                </div>
                <div class="order-success text-center font-weight-bold text-uppercase mgtop40">MUA HÀNG THÀNH CÔNG</div>
                    <div class="pay">
                        <div class="row pdright20 pdleft20 content-success">
                            <div class="col-12 message-thanks pdright10">
                                <p class="lastText">Cảm ơn quý khách đã cho Siêu Thị Thuốc 365 cơ hội được phục vụ. Trong vòng 5 phút, nhân viên Nhà Thuốc sẽ gọi điện xác nhận đơn hàng của quý khách.</p>
                            </div>
                            <h3 class="titleV titleP bgorange">
                                THÔNG TIN NHẬN HÀNG
                            </h3>
                            <div class="col-12 col-md-12 pdleft10 customer-info">
                                <div class="row">
                                    <div class="col-2 col-xs-4 col-sm-2 col-md-2 col-lg-2 info-item-lable">
                                        <p>Mã đơn hàng:</p>
                                    </div>
                                    <div class="col-10 col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                         <p class="font-weight-bold text-uppercase">TUT-DH-{{ $orderId }}-
                                            <?php echo date("Ymd")?>
                                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 pdleft10 customer-info">
                                <div class="row">
                                    <div class="col-2 col-xs-4 col-sm-2 col-md-2 col-lg-2 info-item-lable">
                                        <p>Họ và tên:</p>
                                    </div>
                                    <div class="col-10 col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                         <p>{{ $customer['ship_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 pdleft10 customer-info">
                                <div class="row">
                                    <div class="col-2 col-xs-4 col-sm-2 col-md-2 col-lg-2 info-item-lable">
                                        <p>Điện thoại:</p>
                                    </div>
                                    <div class="col-10 col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                         <p>{{ $customer['ship_phone'] }}</p>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-12 col-md-12 pdleft10 customer-info">
                                <div class="row">
                                    <div class="col-2 col-xs-4 col-sm-2 col-md-2 col-lg-2 info-item-lable">
                                        <p>Email:</p>
                                    </div>
                                    <div class="col-10 col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                         <p>{{ $customer['ship_email'] }}</p>
                                    </div>
                                </div>    
                            </div>                        
                            <div class="col-12 col-md-12 pdleft10 customer-info">
                                <div class="row">
                                    <div class="col-2 col-xs-4 col-sm-2 col-md-2 col-lg-2 info-item-lable">
                                        <p>Địa chỉ:</p>
                                    </div>
                                    <div class="col-10 col-xs-8 col-sm-10 col-md-10 col-lg-10">
                                         <p>{{ $customer['ship_address'] }}</p>
                                    </div>
                                </div>
                             </div>                      
                        </div>
                    </div>


                <div class="col-12 title">
                    <h3>SẢN PHẨM ĐÃ MUA</h3>
                </div>
                <form action="{{ route('send') }}" class="formCheckOut validate" method="post">
                    {{ csrf_field() }}
                    <div class="col-12 order">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng số tiền</th>
                            </tr>
                            </thead>
                            <?php $sumPrice = 0;?>
                            <tbody>
                            @if (!empty($orderItems))
                                @foreach($orderItems as $id => $orderItem)
                                @if($orderItem->is_free_gift == 0)
                                <tr>
                                        <td >
                                            <a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">
                                                <img src="{{ !empty($orderItem->image) ?  asset($orderItem->image) : asset('/site/img/no-image.png') }}" alt="{{ $orderItem->title }}" width="50"> </a>
                                        </td>
                                        <td>
                                            <div class="content">
                                                <p><a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">{{ !empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title }}</a></p>
                                                <p class="price">
                                                    @if (time() <= strtotime($orderItem->deal_end))
                                                        <span class="discont">Giá : <del>{{ number_format($orderItem->price , 0) }} đ</del>
                                                            <span style="color:red;">{{ number_format($orderItem->price_deal , 0) }} đ </span>
                                                        </span>
                                                    @elseif (!empty($orderItem->discount))
                                                        <span class="discont">Giá : <del>{{ number_format($orderItem->price , 0) }} VNĐ</del>{{ number_format($orderItem->discount , 0) }} VNĐ</span>
                                                    @else
                                                        <span class="discont">Giá : {{ number_format($orderItem->price , 0) }} VNĐ</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>
                                        <span class="total totalPrice">
                                            @php
                                                if (time() <= strtotime($orderItem->deal_end)) {
                                                    $sumPrice += $orderItem->price_deal*$orderItem->quantity;
                                                    echo number_format(($orderItem->price_deal*$orderItem->quantity) , 0);
                                                } else if ($orderItem->discount) {
                                                    $sumPrice += $orderItem->discount*$orderItem->quantity;
                                                    echo number_format(($orderItem->discount*$orderItem->quantity) , 0);
                                                } else {
                                                    $sumPrice += $orderItem->price*$orderItem->quantity;
                                                    echo number_format(($orderItem->price*$orderItem->quantity) , 0);
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                @else
                                <tr>
                                        <td >
                                            <a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">
                                                <img src="{{ !empty($orderItem->image) ?  asset($orderItem->image) : asset('/site/img/no-image.png') }}" alt="{{ $orderItem->title }}" width="50"> </a>
                                        </td>
                                        <td>
                                            <div class="content">
                                                <p><a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">{{ !empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title }}</a></p>
                                                <p class="price">
                                                    <span class="discont">Quà tặng</span>
                                                </p>
                                            </div>
                                        </td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>
                                        <span class="total totalPrice">
                                            Miễn phí
                                        </td>
                                    </tr>
                                @endif
                                    
                                @endforeach
                            @endif
                            <tr>
                                <td colspan="3" class="text-left">Phí vận chuyển:</td>
                                <td colspan="2" style="text-align: center;">
                                    @php $costShip = 0; @endphp
                                    @foreach($orderShips as $id => $orderShip)
                                        @if ($orderShip->method_ship > $sumPrice )
                                            <span class="sumPrice">{{ number_format($orderShip->cost , 0) }}</span> VND
                                            @php $costShip = $orderShip->cost; @endphp
                                        @endif
                                        @if ($orderShip->method_ship < $sumPrice )
                                            Miễn phí
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="continue" colspan="3" rowspan="" headers="">
                                    <a href="" title="Nhà Thuốc Trực Tuyến 24h" class="nextpr">Tiếp tục mua hàng</a>
                                </td>
                                <td class="totals" colspan="2" rowspan="" headers="">
                                    <a href="" title="" class="total">Thành tiền : <span class="sumPrice">{{ number_format($sumPrice + $costShip , 0) }}</span> VNĐ </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @if ($methodPayment == 'Thanh toán qua thẻ ngân hàng')
                    <div class="pay">
                        <h3 class="titleV bgorange">
                            THÔNG TIN CHUYỂN KHOẢN
                        </h3>
                        <div class="col-12 col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Ngân hàng</th>
                                    <th>Chủ tài khoản</th>
                                    <th>Số tài khoản</th>
                                    <th>Chi nhánh</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderBanks as $id => $orderBank)
                                    <tr>
                                        <td>
                                            {{ $orderBank->name_bank }}
                                        </td>
                                        <td>
                                            {{ $orderBank->manager_account }}
                                        </td>
                                        <td>
                                            {{ $orderBank->number_bank }}
                                        </td>
                                        <td class="totalPrice">
                                            {{ $orderBank->branch }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-12">
                            <p class="lastText">Quý khách vui lòng điền mã nội dung sau: <span class="red">#{{ $orderId }} - sieuthithuoc365.com</span> trong
                                phần nội dung chuyển khoản để chúng tôi xác nhận đơn hàng.</p>
                        </div>
                    </div>
                    @endif

                </form>

            </div>
        </div>
@endsection
