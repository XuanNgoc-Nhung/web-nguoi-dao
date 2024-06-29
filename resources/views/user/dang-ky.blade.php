@extends("user.layouts.app")
@section("css-custom")
    <link href="https://bizweb.dktcdn.net/100/257/549/themes/918015/assets/breadcrumb_style.scss.css?1717404002200"
          rel="stylesheet" type="text/css" media="all"/>
    <link href="https://bizweb.dktcdn.net/100/257/549/themes/918015/assets/account_oder_style.scss.css?1717404002200"
          rel="stylesheet" type="text/css" media="all"/>
@endsection
@section("title")
    <title>Quản lý vật phẩm</title>
@endsection
@section("content")
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home">
                    <a href="/" title="Trang chủ"><span>Trang chủ</span></a>
                    <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                   data-icon="chevron-right" role="img"
                                                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                   class="svg-inline--fa fa-chevron-right fa-w-10"><path
                                fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path></svg>&nbsp;</span>
                </li>

                <li><strong><span>Đăng ký tài khoản</span></strong></li>

            </ul>
        </div>
    </section>
    <section class="section">
        <div class="container ">
            <div class="wrap_background_aside  page_login">
                <div class="wrap_background_aside">
                    <div class="row">
                        <div
                            class="col-lg-4 col-md-6 col-sm-12 col-12 col-xl-4 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3">
                            <div class="row">
                                <div class="page-login pagecustome clearfix">
                                    <div class="wpx">
                                        <h1 class="title_heads a-center"><span>Đăng ký</span></h1>
                                        <span class="block a-center dkm margin-top-10">Đã có tài khoản, đăng nhập <a
                                                href="{{route('user.getDangNhap')}}"
                                                class="btn-link-style btn-register">tại đây</a></span>
                                        <div id="login" class="section">
                                            <div class="form-signup clearfix">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                        <div class="form-group text-left">
                                                            <span  for="">Họ & tên</span>
                                                            <input type="text" class="form-control form-control-lg"
                                                                   value="" name="lastName" id="name"
                                                                   placeholder="Nhập..." required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                        <div class="form-group text-left">
                                                            <span  for="">Số điện thoại</span>
                                                            <input placeholder="Số điện thoại" type="text"
                                                                   pattern="\d+"
                                                                   id="phone"
                                                                   class="form-control form-control-comment form-control-lg"
                                                                   name="PhoneNumber" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                        <div class="form-group text-left">
                                                            <span  for="">Mật khẩu</span>
                                                            <input type="password"
                                                                   class="form-control form-control-lg" value=""
                                                                   name="password" id="password"
                                                                   placeholder="Mật khẩu" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section">
                                                    <button type="submit" id="buttonDangKy" value="Đăng ký"
                                                            class="btn  btn-style btn_50">Đăng ký
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#buttonDangKy').click(function () {
                console.log('Nhấn đăng ký')
                let name = $('#name').val();
                let phone = $('#phone').val();
                let password = $('#password').val();
                console.log('Thông tin đăng ký:')
                console.log('Name:' + name)
                console.log('email:' + email)
                console.log('pass:' + password)
                if (!name||!phone||!password) {
                    toastr.error("Vui lòng điền đầy đủ thông tin", "");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: '/post-dang-ky',
                    data: {
                        name: name,
                        email: phone,
                        password: password,
                    },
                    success: function (result) {
                        console.log('success')
                        result = JSON.parse(result)
                        console.log(result)
                        if (result.rc == 0) {
                            toastr.success(result.rd, "");
                            setTimeout(() => {
                                window.location.href = '/'
                            }, 500)
                        } else {
                            toastr.error(result.rd, "");
                        }
                    }
                });
            });
            function disableButton() {
                var button = document.getElementById("ABC");
                button.disabled = true; // Disable the button
                setTimeout(enableButton, 60000); // Enable the button after 60 seconds (60000 milliseconds)
            }

            function enableButton() {
                var button = document.getElementById("ABC");
                button.disabled = false; // Enable the button
            }
            $('#layOTP').click(function () {
                console.log('click button lấy OTP')
                var button = $(this);// Disable the button

                let tenDangNhap = $('#tenDangNhap').val();
                if(!validateEmail(tenDangNhap)){
                    $('#noiDungThongBao').text('Địa chỉ email không hợp lệ. Vui lòng kiểm tra lại');
                    $('#thongBao').modal('show')
                    return;
                }
                $("#layOTP"). attr("disabled", true)
                var count = 60; // Countdown time in seconds
                var interval = setInterval(function() {
                    button.text('Lấy lại sau: ' + count + 's');
                    count--;

                    if (count < 0) {
                        clearInterval(interval);
                        button.text('Lấy OTP');
                        button.prop('disabled', false); // Enable the button
                    }
                }, 1000);
                console.log('Tên đăng nhập:' + tenDangNhap)
                $.ajax({
                    type: "POST",
                    url: '/post-gui-otp',
                    data: {
                        name: tenDangNhap,
                    },
                    success: function (result) {
                        console.log('success')
                        result = JSON.parse(result)
                        console.log(result)
                        if (result.rc == 0) {
                            $('#noiDungThongBao').text(result.rd);
                            $('#thongBao').modal('show')
                        } else {
                            $('#noiDungThongBao').text(result.rd);
                            $('#thongBao').modal('show')
                        }
                    }
                });
            });
        });
        function validateEmail(email) {
            // Biểu thức chính quy để kiểm tra định dạng email
            var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            return regex.test(email);
        }

        // Sử dụng hàm validateEmail() để kiểm tra email
        var email = "example@example.com";
        // if (validateEmail(email)) {
        //     return true;
        // } else {
        //     return false;
        //     console.log("Email không hợp lệ");
        // }
    </script>
@endsection
