@extends('admin.layout.admin')

@section('title', 'Quản trị website')

@section('content')
    <!-- Content Header (Page header) -->
  
    <section class="content">
        <!-- Small boxes (Stat box) -->
        @if(\App\Entity\User::isManager(\Illuminate\Support\Facades\Auth::user()->role))
        <div class="row">
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $countPost }}</h3>

                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('posts.index') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countProduct }}</h3>

                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countTaskNotDone }}/{{ $countTask }}</h3>

                        <p>Công việc</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-checkbox"></i>
                    </div>
                    <a href="my-tasks" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
           <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $countContactNotDone }}/{{ $countContact }}</h3>
                    <p>Yêu cầu tư vấn</p>
                </div>
                <div class="icon">
                    <i class="ion ion-paper-airplane"></i>
                </div>
                <a href="contact" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>{{ $countCartItem }}/{{ $countOrderToday }}</h3>

                    <p>Sp thêm vào giỏ</p>
                    
                </div>
                <div class="icon">
                    <i class="ion ion-android-cart"></i>
                </div>
                <a href="{{ route('cart-item.index') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $countOrderNotDone }}/{{ $countOrder }}</h3>

                    <p>Đơn hàng</p>
                    
                </div>
                <div class="icon">
                    <i class="ion ion-social-usd"></i>
                </div>
                <a href="don-hang" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
          
          <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $countRemarketingNotDone }}/{{ $countRemarketing }}</h3>
                    <p>Hẹn tư vấn</p>
                </div>
                <div class="icon">
                    <i class="icon ion-ios-calendar"></i>
                </div>
                <a href="contact-remarketing" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        </div>
        @endif
        <!-- /.row -->

        @if(\App\Entity\User::isStocker(\Illuminate\Support\Facades\Auth::user()->role))
        <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countTaskNotDone }}/{{ $countTask }}</h3>

                        <p>Công việc</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-checkbox"></i>
                    </div>
                    <a href="my-tasks" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $countOrderNotDelivery }}</h3>

                        <p>Đơn hàng chưa gửi</p>
                        
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-usd"></i>
                    </div>
                    <a href="order-stocker" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endif

        @if(\App\Entity\User::isEditor(\Illuminate\Support\Facades\Auth::user()->role))
        <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $countTaskNotDone }}/{{ $countTask }}</h3>

                        <p>Công việc</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-checkbox"></i>
                    </div>
                    <a href="my-tasks" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $countPost }}</h3>

                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('posts.index') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countProduct }}</h3>

                        <p>Sản phẩm</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        @endif

        @if(\App\Entity\User::isAdvisor(\Illuminate\Support\Facades\Auth::user()->role))
        <div class="col-lg-2 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $countTaskNotDone }}/{{ $countTask }}</h3>

                        <p>Công việc</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-checkbox"></i>
                    </div>
                    <a href="my-tasks" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <div class="col-lg-2 col-xs-6">
                <!-- small box -->
               <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $countAdvisorContactNotDone }}/{{ $countAdvisorContact }}</h3>

                    <p>Yêu cầu tư vấn</p>
                    
                </div>
                <div class="icon">
                    <i class="ion ion-paper-airplane"></i>
                </div>
                <a href="contact-advisor" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $countAdvisorRemarketingNotDone }}/{{ $countAdvisorRemarketing }}</h3>
                    <p>Hẹn tư vấn</p>
                </div>
                <div class="icon">
                    <i class="icon ion-ios-calendar"></i>
                </div>
                <a href="contact-advisor-remarketing" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif

        @if(\App\Entity\User::isManager(\Illuminate\Support\Facades\Auth::user()->role))
        <div class="row">
            <div class='graph-wrapper'>
                <h3>Lợi nhuận theo ngày</h3>
                <div class='graph' id='daily-revenue-chart'></div>
            </div>
        </div>

        <div class="row">
            <div class='graph-wrapper'>
                <h3>Lợi nhuận theo tháng</h3>
                <div class='graph' id='monthly-revenue-chart'></div>
            </div>
        </div>

        <!-- Main row -->
        <div class="row">

            <div class='graph-wrapper'>
                      <h3>Doanh thu theo quý</h3>
                        <div class='graph' id='quarterly-revenue-chart'></div>
            </div>
            
        </div>
        @endif
        <!-- /.row (main row) -->
    </section>
    <style>
        .graph-wrapper {
  width: 100%;
  margin: 10px;
}

.graph {
  height: 300px;
  width: 100%;
  padding: 25px;
  background-color: #FFF;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.morris-hover{position:absolute;z-index:1000}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255,255,255,0.8);border:solid 2px rgba(230,230,230,0.8);font-family:sans-serif;font-size:12px;text-align:center}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0}
.morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0}

    </style>
    <script>
        var line = new Morris.Line({
            element          : 'quarterly-revenue-chart',
            data             : [
                @foreach($orders as $order)
                    @if ( !empty($order->year))
                        { y:  '{!! $order->year.' Q'.$order->quarter !!}', totalPrice: {!! $order->total_sum !!} },
                    @endif
                @endforeach
            ],
            xkey             : 'y',
            ykeys            : ['totalPrice'],
            labels           : ['Doanh thu']
        });

        
        var daily = new Morris.Line({
              element: 'daily-revenue-chart',
              data             : [
                @foreach($revenueDaily as $item)
                    @if (!empty($item->day_line))
                        { day:  '{!!$item->day_line!!}', realPrice: {!! $item->real_price !!}, totalPrice: {!! $item->total_price !!}},
                    @endif
                @endforeach
            ],
              xkey: 'day',
              parseTime: false,
              ykeys: ['totalPrice','realPrice'],
              labels: ['Doanh thu','Lợi nhuận'],
              lineColors: ['#373651','#E65A26']
        });


        var monthly = new Morris.Line({
              element: 'monthly-revenue-chart',
              data             : [
                @foreach($revenueMonthly as $item)
                    @if (!empty($item->day_line))
                        { day:  '{!!$item->day_line!!}-{!!$item->day_line_year!!}', realPrice: {!! $item->real_price !!}, totalPrice: {!! $item->total_price !!}},
                    @endif
                @endforeach
            ],
              xkey: 'day',
              parseTime: false,
              ykeys: ['totalPrice','realPrice'],
              labels: ['Doanh thu','Lợi nhuận'],
              lineColors: ['#373651','#E65A26']
        });
        

    </script>
@endsection

