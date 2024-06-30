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
                <li>
                    <a href="/account" title="Tài khoản"><span>Tài khoản</span></a>
                    <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                   data-icon="chevron-right" role="img"
                                                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                   class="svg-inline--fa fa-chevron-right fa-w-10"><path
                                fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path></svg>&nbsp;</span>
                </li>
                <li><strong><span>Địa chỉ khách hàng</span></strong></li>

            </ul>
        </div>
    </section>
    <section class="address">
        <div class="container page_address margin-bottom-20">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
                    @include('user.tai-khoan.layouts.menu-left')
                </div>
                <div class="col-12 col-lg-9">
                    <h1 class="title-head">Địa chỉ của bạn</h1>
                    <div class="btn-row row">
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-lg-3">
                                <fieldset class="form-group">
                                    <label for="oldPass">Họ tên <span class="error">*</span></label>
                                    <input type="text" name="OldPassword" placeholder="Nhập..." id="OldPass" required=""
                                           class="form-control form-control-lg">
                                </fieldset>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-lg-3">
                                <fieldset class="form-group">
                                    <label for="oldPass">Số điện thoại <span class="error">*</span></label>
                                    <input type="password" name="OldPassword" placeholder="Nhập..."  id="OldPass" required=""
                                           class="form-control form-control-lg">
                                </fieldset>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-lg-3">
                                <fieldset class="form-group">
                                    <label for="oldPass">Địa chỉ <span class="error">*</span></label>
                                    <input type="password" name="OldPassword" placeholder="Nhập..."  id="OldPass" required=""
                                           class="form-control form-control-lg">
                                </fieldset>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-lg-3">
                                <fieldset class="form-group">
                                    <label for="oldPass">Ghi chú <span class="error">*</span></label>
                                    <input type="password" name="OldPassword" placeholder="Nhập..."  id="OldPass" required=""
                                           class="form-control form-control-lg">
                                </fieldset>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary btn-sm" type="button" >Thêm địa chỉ
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row total_address">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
