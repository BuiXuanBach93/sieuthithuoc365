<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ (isset(Auth::user()->image) && !empty(Auth::user()->image)) ? asset(Auth::user()->image) : asset('image/avatar_admin.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        @if(\App\Entity\User::isManager(\Illuminate\Support\Facades\Auth::user()->role))
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Cá nhân</li>

            <li class="{{ Request::is('admin/task', 'admin/task/create', 'admin/my-tasks') ? 'active' : null }} treeview">
                <a href="{{ route('task.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý công việc</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is( 'admin/task' ) ? 'active' : null }}">
                        <a href="{{ route('task.index') }}"><i class="fa fa-circle-o"></i>Danh sách công việc</a>
                    </li>
                    <li class="{{ Request::is('admin/my-tasks') ? 'active' : null }}">
                        <a href="{{ route('my-task') }}"><i class="fa fa-circle-o"></i>Công việc của tôi</a>
                    </li>
                </ul>
            </li>

            <li class="header">Sản phẩm & Bài viết</li>
            <li class="{{ Request::is('admin/products', 'admin/products/create', 'admin/category-products') ? 'active' : null }} treeview">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/products') ? 'active' : null }}">
                        <a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>Tất cả sản phẩm</a>
                    </li>
                    <li class="{{ Request::is('admin/products/create') ? 'active' : null }}">
                        <a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>Thêm mới sản phẩm</a>
                    </li>
                    <li class="{{ Request::is('admin/category-products') ? 'active' : null }}">
                        <a href="{{ route('category-products.index') }}"><i class="fa fa-circle-o"></i>Chuyên mục</a>
                    </li>
                    <li class="{{ Request::is('admin/filter') ? 'active' : null }}">
                        <a href="{{ route('filter.index') }}"><i class="fa fa-circle-o"></i>Bộ lọc</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/posts', 'admin/posts/create', 'admin/categories') ? 'active' : null }} treeview">
                <a href="{{ route('posts.index') }}">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Bài viết</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/posts') ? 'active' : null }}">
                        <a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i>Tất cả bải viết</a>
                    </li>
                    <li class="{{ Request::is('admin/posts/create') ? 'active' : null }}">
                        <a href="{{ route('posts.create') }}"><i class="fa fa-circle-o"></i>Thêm mới bài viết</a>
                    </li>
                    <li class="{{ Request::is('admin/categories') ? 'active' : null }}">
                        <a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>Chuyên mục</a>
                    </li>
                </ul>
            </li>

            <li class="header">Tracking</li>
            <li class="{{ Request::is('admin/tracking-item') ? 'active' : null }} ">
                <a href="{{ route('tracking-item.index') }}">
                    <i class="fa fa-sitemap" aria-hidden="true"></i> <span>Products Tracking</span>
                </a>
            </li>

            <li class="header">Thông tin đơn hàng</li>
            <li class="{{ Request::is('/don-hang') ? 'active' : null }} ">
                <a href="{{ route('orderAdmin') }}">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span>Đơn hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cart-item') ? 'active' : null }} ">
                <a href="{{ route('cart-item.index') }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i> <span>Thêm giỏ hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cart-item-report') ? 'active' : null }} ">
                <a href="{{ route('cartItemReport') }}">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> <span>Báo cáo thành đơn</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/product-report') ? 'active' : null }} ">
                <a href="{{ route('productReport') }}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Biến động sản phẩm</span>
                </a>
            </li>
            <li class="header">Tư vấn & Bình luận</li>
            <li class="{{ Request::is('admin/contact') ? 'active' : null }} ">
                <a href="{{ route('contact.index') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Yêu cầu tư vấn</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact-remarketing') ? 'active' : null }} ">
                <a href="{{ route('contact-remarketing') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Remarketing Open</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact-remarketing-done') ? 'active' : null }} ">
                <a href="{{ route('contact-remarketing-done') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Remarketing Done</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/subcribe-email') ? 'active' : null }} ">
                        <a href="{{ route('subcribe-email.index') }}">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Đăng ký nhận email (SDT)</span>
                        </a>
            </li>
            <li class="{{ Request::is('admin/comments') ? 'active' : null }} ">
                        <a href="{{ route('comments.index') }}">
                            <i class="fa fa-comments" aria-hidden="true"></i> <span>Quản lý bình luận</span>
                        </a>
                    </li>
            <li class="header">Bổ sung</li>
            @foreach($typeSubPostsAdmin as $typeSubPost)
                <li class="{{ Request::is('admin/'.$typeSubPost->slug.'/sub-posts', 'admin/'.$typeSubPost->slug.'/sub-posts/create') ? 'active' : null }} treeview">
                    <a href="{{$typeSubPost->slug.'/sub-posts' }} ">
                        <i class="fa fa-th-list" aria-hidden="true"></i><span>{{ $typeSubPost->title }}</span>
                        <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::is('admin/'.$typeSubPost->slug.'sub-posts') ? 'active' : null }}">
                            <a href="{{ route('sub-posts.index', ['typePost' => $typeSubPost->slug]) }}"><i class="fa fa-circle-o"></i>Tất cả {{ $typeSubPost->title }}</a>
                        </li>
                        <li class="{{ Request::is('admin/'.$typeSubPost->slug.'sub-posts/create') ? 'active' : null }}">
                            <a href="{{ route('sub-posts.create', ['typePost' => $typeSubPost->slug]) }}"><i class="fa fa-circle-o"></i>Thêm mới {{ $typeSubPost->title }}</a>
                        </li>
                    </ul>
                </li>
            @endforeach

            <li class="header">Thông tin trang và menu</li>

            <li class="{{ Request::is('admin/pages', 'admin/pages/create') ? 'active' : null }} treeview">
                <a href="{{ route('pages.index') }}">
                    <i class="fa fa-file-o" aria-hidden="true"></i> <span>Trang</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/pages') ? 'active' : null }}">
                        <a href="{{ route('pages.index') }}"><i class="fa fa-circle-o"></i>Tất cả trang</a>
                    </li>
                    <li class="{{ Request::is('admin/pages/create') ? 'active' : null }}">
                        <a href="{{ route('pages.create') }}"><i class="fa fa-circle-o"></i>Thêm mới trang</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/menus', 'admin/menus/create') ? 'active' : null }} treeview">
                <a href="{{ route('menus.index') }}">
                    <i class="fa fa-bars" aria-hidden="true"></i> <span>Menu</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is( 'admin/menus' ) ? 'active' : null }}">
                        <a href="{{ route('menus.index') }}"><i class="fa fa-circle-o"></i>Tất cả menu</a>
                    </li>
                    <li class="{{ Request::is('admin/menus/create') ? 'active' : null }}">
                        <a href="{{ route('menus.create') }}"><i class="fa fa-circle-o"></i>Thêm mới menu</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/information', 'admin/information/create') ? 'active' : null }} treeview">
                <a href="{{ route('information.index') }}">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Thông tin trang</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is( 'admin/information' ) ? 'active' : null }}">
                        <a href="{{ route('information.index') }}"><i class="fa fa-circle-o"></i>Thông tin trang</a>
                    </li>
                    <li class="{{ Request::is('admin/information/create_general') ? 'active' : null }}">
                        <a href="{{ 'information/general' }}"><i class="fa fa-circle-o"></i>Thông tin trang chung</a>
                    </li>
                </ul>
            </li>
            
            @endif

            @if(\App\Entity\User::isManager(\Illuminate\Support\Facades\Auth::user()->role))
            <li class="header">Thành viên</li>
            <li class="{{ Request::is('admin/users', 'admin/users/create') ? 'active' : null }} treeview">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý người dùng</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is( 'admin/users' ) ? 'active' : null }}">
                        <a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i>Tất cả Thành viên</a>
                    </li>
                    <li class="{{ Request::is('admin/users/create') ? 'active' : null }}">
                        <a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i>Thêm mới thành viên</a>
                    </li>
                </ul>
            </li>
            <li class="header" title="Cài đặt thanh toán, liên hệ, đăng ký nhận mail, bình luận">Thông tin mở rộng website</li>
            <li class="{{ Request::is('admin/hinh-thuc-thanh-toan', 'admin/contact', 'admin/subcribe-email', 'admin/comments') ? 'active' : null }} treeview">
                <a>
                    <i class="fa fa-info" aria-hidden="true"></i> <span>Thông tin mở rộng</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
           
                    <li class="{{ Request::is('admin/hinh-thuc-thanh-toan') ? 'active' : null }} ">
                        <a href="{{ route('method_payment') }}">
                            <i class="fa fa-info-circle" aria-hidden="true"></i> <span>Cài đặt chung</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="header" title="Cài đặt thanh toán, liên hệ, đăng ký nhận mail, bình luận">Hỗ trợ facebook</li>
            <li class="{{ Request::is('admin/get-post-facebook', 'admin/show-get-uid', 'admin/show-convert-uid', 'admin/show-request-friend') ? 'active' : null }} treeview">
                <a>
                    <i class="fa fa-info" aria-hidden="true"></i> <span>Hỗ trợ facebook</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/get-post-facebook') ? 'active' : null }} ">
                        <a href="{{ route('get_post_facebook') }}">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i> <span>fanpage và trang cá nhân</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/show-get-uid') ? 'active' : null }} ">
                        <a href="{{ route('show_get_uid') }}">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i> <span>Lấy uid từ facebook</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/show-convert-uid') ? 'active' : null }} ">
                        <a href="{{ route('show_convert_uid') }}">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i> <span>Convert uid sang email và số điện thoại</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/show-request-friend') ? 'active' : null }} ">
                        <a href="{{ route('show_request_friend') }}">
                            <i class="fa fa-arrow-up" aria-hidden="true"></i> <span>Tự động gửi lời mời kết bạn</span>
                        </a>
                    </li>
                </ul>
            </li>
			{{--<li class="header" title="Dạng bài viết, trường dữ liệu, trường thông tin, template">Cài Đặt Website</li>--}}
            {{--<li class="{{ Request::is('admin/type-sub-post', 'admin/type-input', 'admin/type-information', 'admin/templates') ? 'active' : null }} treeview">--}}
                {{--<a>--}}
                    {{--<i class="fa fa-wrench" aria-hidden="true"></i> <span>Cài đặt</span>--}}
                    {{--<span class="pull-right-container">--}}
                      {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li class="{{ Request::is( 'admin/type-sub-post' ) ? 'active' : null }}">--}}
                        {{--<a href="{{ route('type-sub-post.index') }}"><i class="fa fa-clipboard" aria-hidden="true"></i> Dạng bài viết</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{ Request::is( 'admin/type-input' ) ? 'active' : null }}">--}}
                        {{--<a href="{{ route('type-input.index') }}"><i class="fa fa-keyboard-o" aria-hidden="true"></i> Trường dữ liệu</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{ Request::is( 'admin/type-information' ) ? 'active' : null }}">--}}
                        {{--<a href="{{ route('type-information.index') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> Trường Thông tin</a>--}}
                    {{--</li>--}}
                    {{--<li class="{{ Request::is( 'admin/templates' ) ? 'active' : null }}">--}}
                        {{--<a href="{{ route('templates.index') }}"><i class="fa fa-desktop" aria-hidden="true"></i> Template</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li> --}}
            @endif

            @if(\App\Entity\User::isStocker(\Illuminate\Support\Facades\Auth::user()->role))
            <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is('admin/task', 'admin/my-tasks') ? 'active' : null }} treeview">
                <a href="{{ route('task.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý công việc</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/my-tasks') ? 'active' : null }}">
                        <a href="{{ route('my-task') }}"><i class="fa fa-circle-o"></i>Công việc của tôi</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::is('/order-stocker') ? 'active' : null }} ">
                <a href="{{ route('orderStocker') }}">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i> <span>Đơn hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('/admin/products') ? 'active' : null }} ">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Cập nhật tồn kho</span>
                </a>
            </li>
        </ul>
        @endif

            @if(\App\Entity\User::isEditor(\Illuminate\Support\Facades\Auth::user()->role))
            <ul class="sidebar-menu" data-widget="tree">
            
            <li class="{{ Request::is('admin/task', 'admin/my-tasks') ? 'active' : null }} treeview">
                <a href="{{ route('task.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý công việc</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/my-tasks') ? 'active' : null }}">
                        <a href="{{ route('my-task') }}"><i class="fa fa-circle-o"></i>Công việc của tôi</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/posts', 'admin/posts/create', 'admin/categories') ? 'active' : null }} treeview">
                <a href="{{ route('posts.index') }}">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Bài viết</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/posts') ? 'active' : null }}">
                        <a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i>Tất cả bải viết</a>
                    </li>
                    <li class="{{ Request::is('admin/posts/create') ? 'active' : null }}">
                        <a href="{{ route('posts.create') }}"><i class="fa fa-circle-o"></i>Thêm mới bài viết</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/products', 'admin/products/create', 'admin/category-products') ? 'active' : null }} treeview">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/products') ? 'active' : null }}">
                        <a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>Tất cả sản phẩm</a>
                    </li>
                    <li class="{{ Request::is('admin/products/create') ? 'active' : null }}">
                        <a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>Thêm mới sản phẩm</a>
                    </li>
                </ul>
            </li>
        </ul>
            @endif

            @if(\App\Entity\User::isAdvisor(\Illuminate\Support\Facades\Auth::user()->role))
            <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is('admin/task', 'admin/my-tasks') ? 'active' : null }} treeview">
                <a href="{{ route('task.index') }}">
                    <i class="fa fa-users" aria-hidden="true"></i> <span>Quản lý công việc</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/my-tasks') ? 'active' : null }}">
                        <a href="{{ route('my-task') }}"><i class="fa fa-circle-o"></i>Công việc của tôi</a>
                    </li>
                </ul>
            </li>
            
            <li class="{{ Request::is('admin/contact') ? 'active' : null }} ">
                <a href="{{ route('contact-advisor') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Yêu cầu tư vấn</span>
                </a>
            </li>
             <li class="{{ Request::is('admin/contact-advisor-remarketing') ? 'active' : null }} ">
                <a href="{{ route('contact-advisor-remarketing') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Remarketing Open</span>
                </a>
            </li>
             <li class="{{ Request::is('admin/contact-advisor-remarketing-done') ? 'active' : null }} ">
                <a href="{{ route('contact-advisor-remarketing-done') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Remarketing Done</span>
                </a>
            </li>
            </ul>
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->

</aside>
