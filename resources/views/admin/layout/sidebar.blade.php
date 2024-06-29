<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"><span>Hệ thống</span></li>

                <li class=" {{ Request::routeIs('admin.getHome')? 'active' : '' }}">
                    <a href="{{route('admin.getHome')}}"><i class="feather-grid"></i> <span>Tổng quan</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.taiKhoan')? 'active' : '' }}">
                    <a href="{{route('admin.taiKhoan')}}"><i class="feather-grid"></i> <span>Tài khoản</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.danhMuc')? 'active' : '' }}">
                    <a href="{{route('admin.danhMuc')}}"><i class="feather-grid"></i> <span>Danh mục</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.vatPham')? 'active' : '' }}">
                    <a href="{{route('admin.vatPham')}}"><i class="feather-grid"></i> <span>Vật phẩm</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.donHang')? 'active' : '' }}">
                    <a href="{{route('admin.donHang')}}"><i class="feather-grid"></i> <span>Đơn hàng</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.cuaHang')? 'active' : '' }}">
                    <a href="{{route('admin.cuaHang')}}"><i class="feather-grid"></i> <span>Cửa hàng</span></a>
                </li>
                <li class=" {{ Request::routeIs('admin.tinTuc')? 'active' : '' }}">
                    <a href="{{route('admin.tinTuc')}}"><i class="feather-grid"></i> <span>Tin tức</span></a>
                </li>
                <li>
                    <a href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="feather-log-out me-1"></i> <span>Đăng xuất</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
