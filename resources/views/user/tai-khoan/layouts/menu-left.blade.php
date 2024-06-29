<div class="block-account">
    <h5 class="title-account">Trang tài khoản</h5>
    <p>
        Xin chào, <span style="color:#01567f;">ngọc phùng</span>&nbsp;!
    </p>
    <ul>
        <li>
            <a class="title-info {{ Request::routeIs('admin.getHome')? 'active' : '' }}"
               href="{{route('admin.getHome')}}" title="Thông tin tài khoản">Trang quản lý</a>
        </li>
        <li>
            <a class="title-info {{ Request::routeIs('taiKhoan.trangChinh')? 'active' : '' }}"
               href="{{route('taiKhoan.trangChinh')}}" title="Thông tin tài khoản">Thông tin tài khoản</a>
        </li>
        <li>
            <a class="title-info {{ Request::routeIs('taiKhoan.donHang')? 'active' : '' }}"
               href="{{route('taiKhoan.donHang')}}" title="Đơn hàng của bạn">Đơn hàng của bạn</a>
        </li>
        <li>
            <a class="title-info {{ Request::routeIs('taiKhoan.doiMatKhau')? 'active' : '' }}"
               href="{{route('taiKhoan.doiMatKhau')}}" title="Đổi mật khẩu">Đổi mật khẩu</a>
        </li>
        <li>
            <a class="title-info {{ Request::routeIs('taiKhoan.diaChi')? 'active' : '' }}"
               href="{{route('taiKhoan.diaChi')}}" title="Sổ địa chỉ (0)">Sổ địa chỉ </a>
        </li>
        <li>
            <a class="title-info " onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href=""
               title="Đăng xuất">Đăng xuất </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>
