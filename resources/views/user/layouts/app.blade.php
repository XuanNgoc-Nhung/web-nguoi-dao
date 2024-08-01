<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Siêu thị SAKURA | Hàng Nhật nội địa & Sakura Beauty | SAKURA Store </title>
    @include('user.layouts.css')
    @yield('css-custom')
</head>
<body>
<div class="opacity_menu"></div>
@include('user.layouts.top-header')
@include('user.layouts.header')
<div class="bodywrap">
    @yield('content')
    @include('user.layouts.footer')
    @include('user.layouts.js')
</div>
</body>

</html>
