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
                    <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-chevron-right fa-w-10"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" class=""></path></svg>&nbsp;</span>
                </li>

                <li><strong><span>Thay đổi mật khẩu</span></strong></li>

            </ul>
        </div>
    </section>
    <section class="signup page_customer_account">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    @include('user.tai-khoan.layouts.menu-left')
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
                    <h1 class="title-head margin-top-0">Đổi mật khẩu</h1>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="page-login">
                                <form method="post" action="/account/changepassword" id="change_customer_password" accept-charset="UTF-8"><input name="FormType" type="hidden" value="change_customer_password"><input name="utf8" type="hidden" value="true">


                                    <p>Để đảm bảo tính bảo mật bạn vui lòng đặt lại mật khẩu với ít nhất 8 kí tự</p>


                                    <div class="form-signup clearfix">
                                        <fieldset class="form-group">
                                            <label for="oldPass">Mật khẩu cũ <span class="error">*</span></label>
                                            <input type="password" name="OldPassword" id="OldPass" required="" class="form-control form-control-lg">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="changePass">Mật khẩu mới <span class="error">*</span></label>
                                            <input type="password" name="Password" id="changePass" required="" class="form-control form-control-lg">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="confirmPass">Xác nhận lại mật khẩu <span class="error">*</span></label>
                                            <input type="password" name="ConfirmPassword" id="confirmPass" required="" class="form-control form-control-lg">
                                        </fieldset>
                                        <button class="button btn-edit-addr btn btn-primary btn-more" type="submit" onclick="window.location.reload()"><i class="hoverButton"></i>Đặt lại mật khẩu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
