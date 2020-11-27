<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin_home')  }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">QUẢN LÝ WEBSITE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
		
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{--notification--}}
                <li class="">
                   <a target="_blank" href="{{  \Illuminate\Support\Facades\URL::to('/') }}"> <i class="fa fa-globe" aria-hidden="true"></i> Xem Trang chủ</a>
                </li>
            @if(\App\Entity\User::isManager(\Illuminate\Support\Facades\Auth::user()->role))
                <li class="dropdown" id="reports">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="return seenNotification(this)">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </button>
                    <script>
                        function seenNotification(e) {
                            $('#ajax_countRp').empty();
                            $.ajax({
                                url: '{!! route('seenNotification') !!}',
                                method: 'get',
                                success: function(data){
                                },
                                error: function(){},
                            });

                            return true;
                        }
                    </script>
                    @if (!empty($countRp))
                    <span id="ajax_countRp" class="badge"> {!! $countRp !!} </span>
					<audio controls autoplay hidden loop>
						<source src="https://sieuthithuoc365.com/public/library/images/notify_babyshark.mp3" type="audio/mpeg">
					</audio>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <b>THÔNG BÁO</b>
                        </li>
                        @foreach($notifications as $ntf)
                            <li class="@if($ntf->status == 0 || $ntf->status == 1) blue @else white @endif ">
                                <a id="{{ $ntf->notify_id }}" href="{{$ntf->URL}}" onclick="return readNotification(this)" >{!! '<b>'. $ntf->title.'</b>'. " : " . $ntf->content . "<br/>" !!}</a>
                            </li>
                        @endforeach
                        {{--Bắt sự kiện click vào thông báo--}}
                        <script>
                            function readNotification(e) {
                                var id = $(e).attr('id');
                                $.ajax({
                                    url: '{!! route('readNotification') !!}',
                                    method: 'get',
                                    data: {
                                        id: id
                                    },
                                    success: function(data){
                                    },
                                    error: function(){},
                                });

                                return true;
                            }
                        </script>
                        <li>
                            <a href="{{ route('report') }}"><b><center>Xem tất cả</center></b></a>
                        </li>
                    </ul>
                    
                </li>

                {{--endreport--}}
            @endif    
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ (isset(Auth::user()->image) && !empty(Auth::user()->image)) ? asset(Auth::user()->image) : asset('image/avatar_admin.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ (isset(Auth::user()->image) && !empty(Auth::user()->image)) ? asset(Auth::user()->image) : asset('image/avatar_admin.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{Auth::user()->name}}
                                <small>{{Auth::user()->email}}</small>
                                <small>{{Auth::user()->phone}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Thông tin</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Thoát</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
