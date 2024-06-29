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
        <div class="container">
            <div class="wrap_background_aside page_login">
                <div class="row">
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 col-xl-4 offset-0 offset-xl-4 offset-lg-4 offset-md-3 offset-xl-3 col-12">
                        <div class="row">
                            <div class="page-login pagecustome clearfix">
                                <div class="wpx">
                                    <h1 class="title_heads a-center"><span>Đăng nhập</span></h1>
                                    <div id="login" class="section">
                                        <div class="form-signup clearfix">
                                            <fieldset class="form-group">
                                                <input type="text"
                                                       class="form-control form-control-lg" value="" name="email"
                                                       id="customer_email" placeholder="Email" required="">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <input type="password" class="form-control form-control-lg" value=""
                                                       name="password" id="customer_password" placeholder="Mật khẩu"
                                                       required="">
                                            </fieldset>
                                            <div class="pull-xs-left">
                                                <input id="buttonDangNhap" class="btn btn-style btn_50"
                                                       type="submit" value="Đăng nhập">
                                            </div>
                                            <div class="btn_boz_khac">
                                                <div class="btn_khac">
                                                    <span class="quenmk">Quên mật khẩu?</span>
                                                    <a href="{{route('user.getDangKy')}}"
                                                       class="btn-link-style btn-register"
                                                       title="Đăng ký tại đây">Đăng ký tại đây</a>
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
            $('#buttonDangNhap').click(function () {
                console.log('Nhấn đăng ký')
                let email = $('input[name="email"]').val();
                let password = $('input[name="password"]').val();
                console.log('Thông tin đăng nhập:')
                console.log('email:' + email)
                console.log('password:' + password)
                if (!email || !password) {
                    toastr.error("Vui lòng bổ sung thông tin", "");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: '/post-dang-nhap',
                    data: {
                        email: email,
                        password: password,
                    },
                    success: function (result) {
                        console.log('success')
                        result = JSON.parse(result)
                        console.log(result)
                        if (result.rc == 0) {
                            console.log('Đăng ký thành công')
                            toastr.success("Đăng nhập thành công", "");
                            setTimeout(() => {
                                window.location.href = '/'
                            }, 500)
                        } else {
                            toastr.error(result.rd, "");
                        }
                    }
                });
            });


        });


    </script>
@endsection
