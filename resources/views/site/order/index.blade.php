@extends('site.layout.site')
@section('robots', 'noindex')
@section('googlebot', 'noindex')
@section('bingbot', 'noindex')
@section('view_port', 'width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0')
@section('title','Đặt hàng')
@section('meta_description','')
@section('keywords','')

@section('content')
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
            font-size: 15px;
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
            <div id="idpromotion container" class="d-none-mobile">
                <div class="promotion">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 item_policy p-0">
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
            <div class="row">
                <div class="col-12 title d-none-mobile">
                    <h3>THÔNG TIN GIỎ HÀNG</h3>
                </div>
                <form action="{{ route('send') }}" class="formCheckOut validate" method="post" id="orderForm">
                    {{ csrf_field() }}
                    <div class="col-12 order table-product">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng số tiền</th>
                                <th scope="col">Xóa</th>
                            </tr>
                            </thead>
                            <?php $sumPrice = 0;?>
                            <tbody>
                            @if (empty($orderItems))
                                <p>không có sản phẩm trong giỏ hàng</p>
                            @else
                                @foreach($orderItems as $id => $orderItem)
                                    @if($orderItem->is_free_gift == 0)
                                    <tr>
                                        <td >
                                            <a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">
                                                <img src="{{ !empty($orderItem->image) ?  asset($orderItem->image) : asset('/site/img/no-image.png') }}" alt="{{ $orderItem->title }}" width="50"> </a>
                                        </td>
                                        <td>
                                            <div class="content">
                                                <h3><a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">{{ !empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title }}</a></h3>

                                                <p class="price">
                                                    @if (time() <strtotime($orderItem->deal_end))
                                                        <span class="discont">Giá : <del>{{ number_format($orderItem->price , 0) }} đ</del>
                                                            <span style="color:red;">{{ number_format($orderItem->price_deal , 0) }} đ </span>

                                                        </span>
                                                    @elseif (!empty($orderItem->discount))
                                                        <span class="discont">Giá : <del>{{ number_format($orderItem->price , 0) }} đ</del>
                                                            <span style="color:red;">{{ number_format($orderItem->discount , 0) }} đ </span>

                                                        </span>
                                                    @else
                                                        <span class="discont" >Giá : <span style="color:red;">{{ number_format($orderItem->price , 0) }} đ </span></span>
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            @if (time() <= strtotime($orderItem->deal_end))
                                                <input type="hidden" class="unitPrice" value="{{ $orderItem->price_deal }}">
                                            @elseif (!empty($orderItem->discount))
                                                <input type="hidden" class="unitPrice" value="{{ $orderItem->discount }}">
                                            @else
                                                <input type="hidden" class="unitPrice" value="{{ $orderItem->price }}">
                                            @endif
                                            <input type="hidden" name="product_id[]" value="{{ $orderItem->product_id }}"/>
                                            <input type="hidden" class="promotionThreshold" value="{{ $orderItem->promotion_threshold }}">
                                            <input type="hidden" class="isPromotion" value="{{ $orderItem->is_promotion }}">
                                            <div class="groupQty">
                                                <button type="button" class="qtyControl minus">-</button>
                                                <input type="number" name="quantity[]" style="width:50px;height: 31px;padding-right: 0;border: 1px solid #d4caca; text-align: center; font-weight: bold; margin-top:2px;"
                                                   value="{{ $orderItem->quantity }}"
                                                   onchange="return changeQuantity(this);" min="0" />
                                                <button type="button" class="qtyControl plus">+</button>
                                            </div>
                                        </td>
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
                                        <td class="imgpr">
                                            <a  href="/xoa-don-hang?product_id={{ $orderItem->product_id }}" class="delete" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 18px"></i></a>
                                        </td>
                                    </tr>
                                    @else
                                     <tr id="free-gift-line" @php if($showPromotion == 1): @endphp style="display :content;" @php endif; @endphp
                                            @php if($showPromotion == 0): @endphp style="display: none;" @php endif; @endphp    
                                         >
                                        <td >
                                            <a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">
                                                <img src="{{ !empty($orderItem->image) ?  asset($orderItem->image) : asset('/site/img/no-image.png') }}" alt="{{ $orderItem->title }}" width="50"> </a>
                                        </td>
                                        <td>
                                            <div class="content">
                                                <h3><a href="{{ route('product', ['post_slug' => $orderItem->slug]) }}">{{ !empty($orderItem->short_name) ? $orderItem->short_name : $orderItem->title }}</a></h3>
                                                <p class="price">
                                                  <span style="color:red;">Quà tặng</span>
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            
                                            <div class="groupQty">
                                                
                                                <input readonly="readonly" type="number" style="width:50px;height: 31px;padding-right: 0;border: 1px solid #d4caca; text-align: center; font-weight: bold; margin-top:2px;"
                                                   value="1"/>
                                                
                                            </div>
                                        </td>
                                        <td>
                                            <span style="color:red;">Miễn phí</span>
                                        </td>
                                        <td class="imgpr">
                                            
                                        </td>
                                    </tr>
                                    
                                    @endif
                                @endforeach
                                <input type="hidden" name="firstProductId" id="firstProductId" value="{{$orderItems[0]->product_id}}">
                                <input type="hidden" name="firstProductName" id="firstProductName" value="{{$orderItems[0]->short_name}}">
                            @endif
                            <tr>
                                <td colspan="3" class="text-left">Phí vận chuyển: <br>(Miễn phí với đơn hàng từ 500,000đ)</td>
                                <td colspan="2" style="text-align: center;">
                                    @php $costShip = 0; @endphp
                                    @foreach($orderShips as $id => $orderShip)
                                        @if ($orderShip->method_ship > $sumPrice )
                                            @php $costShip = $orderShip->cost; @endphp
                                        @endif
                                        <input type="hidden" value="{{ $orderShip->method_ship }}" id="costLimit"/>
                                        <input type="hidden" value="{{ $orderShip->cost }}" id="costShip"/>
                                        <span id="showCostShip">{{ ($costShip != 0) ? number_format($costShip , 0) : 'Miễn phí' }}</span>
                                    @endforeach
                                    <input type="hidden" value="{{ $costShip }}" name="customer_ship" id="updateCostShip"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="continue" colspan="3" rowspan="" headers="" style="text-align: left;">
                                    <a href="" title="Nhà Thuốc Trực Tuyến 24h" class="nextpr"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Thêm sản phẩm khác</a>
                                </td>
                                <td  class="totals" colspan="2" rowspan="" headers="">
                                    <a href="#" onclick="return false;" title="" class="total">Thành tiền:<br> <span class="sumPrice">{{ number_format($sumPrice + $costShip , 0) }}</span> VND </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pay">
                        <h3 class="titleV bgorange">THÔNG TIN THANH TOÁN</h3>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: red; margin-bottom: 5px;">Họ và tên <span>(*) </span>: </label>
                            <input type="text" id="fullname" class="form-control" name="ship_name" placeholder=""
                                   value="{{ !empty(old('ship_name')) ? old('ship_name') : '' }}"  required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: red; margin-bottom: 5px;">Điện thoại <span>(*) </span> : </label>
                            <input type="text" id="mobile" class="form-control" name="ship_phone" placeholder="" onfocusout="trackPhoneNumber()"
                                   value="{{ !empty(old('ship_phone')) ? old('ship_phone') : '' }}"  required/>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="margin-bottom: 5px;">Email : </label>
                            <input type="text" id="email" class="form-control" name="ship_email" placeholder="Không bắt buộc"
                                   value="{{ !empty(old('ship_email')) ? old('ship_email') : '' }}" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="color: red; margin-bottom: 5px;">Địa chỉ nhận hàng <span>(*) </span>: </label>
                            <textarea id="address" class="form-control" name="ship_address" required rows="7"
                            style="height: 80px;">{{ !empty(old('ship_address')) ? old('ship_address') : '' }}</textarea>
                        </div>
                        <input id="hasPromotion" type="hidden" name="hasPromotion" value="{{ $hasPromotion }}">
                        <input id="showPromotion" type="hidden" name="showPromotion" value="{{ $showPromotion }}">
                    </div>


                    <div class="payments">
                        <!--<h3 class="title order-way d-none-mobile">HÌNH THỨC THANH TOÁN</h3>-->
                        <label>Hình thức thanh toán:</label>
                        <div class="direct">
                            <div class="row">
                                
                                <div class="col-md-3 col-sm-6 col-xs-6 d-none-mobile"></div>
                                <div class="col-md-3 col-sm-6 col-xs-6 iconpayimg">
                                    <label>
                                        <p>Thanh toán nhận hàng</p>
                                        <p><img src="{{ asset('assets/images/cart2.png')}}"></p>
                                        
                                        <input type="radio" name="method_payment" value="Thanh toán khi nhận hàng" checked="">  
                                </label>
                                </div>
                                
                                 <div class="col-md-3 col-sm-6 col-xs-6 iconpayimg">
                                    <label>
                                        <p>Thanh toán chuyển khoản</p>
                                        <p><img src="{{ asset('assets/images/cart1.png')}}"></p>
                                        
                                            <input type="radio" name="method_payment" value="Thanh toán qua thẻ ngân hàng" >  
                                    </label>
                                 </div>
                            </div>
                        </div>
                        <div class="indirect">
                            
                        </div>
                    </div>
                    <div class="pay">
                        <div class="form-group btn-mobile-order" style="margin-top:10px;margin-bottom: 0;text-align: center;">
                            <button class="btn-order-cart" style="width: 350px;
    height: 45px;
    background-color: red;
    background-image: url(../images/giohang.png);
    background-position: 10px 12px;
    background-repeat: no-repeat;
    float: none;
    font-size: 18px;
    color: #fff;
    position: relative;
    border-radius: 4px;" type="submit" id="orderButton">ĐẶT HÀNG NGAY</button>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </section>
    <div class="gif-loader display-none"><div class="loading-img"></div></div>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/numeral.min.js" defer></script>
    <script>

        $(".table-striped").on('click','.minus,.plus',function(){
            var me = $(this);
            var parentEle = me[0].parentElement;
            var valueInput = parseInt($('input',parentEle).val(),10);
            if(me.is('.minus',parentEle)){
                valueInput = valueInput - 1;
                if(valueInput <= 0){
                    valueInput = 0;
                }
            }else{
                valueInput = valueInput + 1;
            }
            $('input',parentEle).val(valueInput);
            changeQuantity($('input',parentEle));
        });                       

        function changeQuantity(e) {
            var unitPrice = $(e).parent().parent().parent().find('.unitPrice').val();
            var threshold = $(e).parent().parent().parent().find('.promotionThreshold').val();
            var isPromotion = $(e).parent().parent().parent().find('.isPromotion').val();
            var quantity = $(e).val();

            if(isPromotion == 2){
                var freeGiftLine = document.getElementById('free-gift-line');
                if(threshold <= quantity){
                    freeGiftLine.style.display = "contents";
                }else{
                    freeGiftLine.style.display = "none";
                }
            }

            var totalPrice = unitPrice*quantity;
            var sum = 0;
            var costLimit = $('#costLimit').val();
            var costShip = $('#costShip').val();
            $(e).parent().parent().parent().find('.totalPrice').empty();
            $(e).parent().parent().parent().find('.totalPrice').html(numeral(totalPrice).format('0,0'));

            $('.totalPrice').each(function () {
                var totalPrice = $(this).html();
                sum += parseInt(numeral(totalPrice).value());
            });
            if (parseInt(sum) >= parseInt(costLimit)) {
               costShip = 0;
            }
            if (costShip === 0) {
                $('#showCostShip').html('Miễn Phí');
                $('#updateCostShip').val(0);
            } else {
                $('#showCostShip').html(numeral(costShip).format('0,0'));
                $('#updateCostShip').val(costShip);
            }

            sum = sum + +costShip;

            $('.sumPrice').empty();
            $('.sumPrice').html(numeral( sum).format('0,0'));
        };

        function validateForm(){
            var fullname = $('#fullname').val().trim();
            var mobile = $('#mobile').val().trim();
            var address = $('#address').val().trim();
            if(fullname != '' && mobile != '' && address != ''){
                return true;
            }else{
                return false;
            }
        };

        $('#orderButton').off('click').on('click',function(){
            if(validateForm()){
                $('.gif-loader').removeClass('display-none');
            }

        });

        function trackPhoneNumber(){
            var phoneNumber = $('#mobile').val().trim();
            var name = $('#fullname').val().trim();
            var productId = $('#firstProductId').val().trim();
            var productName = $('#firstProductName').val().trim();
            if(phoneNumber.length == 10){
                $.ajax({
                    type: "get",
                    url: '{!! route('trackingCart') !!}',
                    data: { 
                        productId: productId,
                        productName: productName,
                        phone: phoneNumber,
                        name:name
                      },
                    success: function(result){
                        
                    }
                });
            }
        };        

    </script>
@endsection
