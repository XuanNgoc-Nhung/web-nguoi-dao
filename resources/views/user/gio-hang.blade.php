@extends("user.layouts.app")
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

            <li><strong><span>Giỏ hàng</span></strong></li>

        </ul>
    </div>
</section>
    <section class="main-cart-page main-container col1-layout">
        <div class="main container cartpcstyle">
            <div class="wrap_background_aside margin-bottom-40">
                <div class="header-cart">
                    <div class="title-block-page">
                        <h1 class="title_cart">
                            <span>Giỏ hàng của bạn</span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-12 col-cart-left col-xs-12 col-12">
                        <div class="clearfix"></div>

                        <div class="cart-page">
                            <div class="drawer__inner">
                                <div class="CartPageContainer">

                                    <form action="/cart" method="post" novalidate="" class="cart ajaxcart cartpage">
                                        <div class="cart-header-info">
                                            <div>Thông tin sản phẩm</div><div>Đơn giá</div><div>Số lượng</div><div>Thành tiền</div>
                                        </div>
                                        <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                            <div class="ajaxcart__row">
                                                <div class="ajaxcart__product cart_product" data-line="1">
                                                    <a href="/nuoc-tay-trang-senka-cap-am-duong-sang-da-230ml-all-clear-water-micellar-formula-white" class="ajaxcart__product-image cart_image" title="Nước Tẩy Trang Senka Cấp Ẩm, Dưỡng Sáng Da 230ml All Clear Water Micellar Formula White"><img src="https://bizweb.dktcdn.net/thumb/compact/100/257/549/products/senkanuoc-tay-trang-senka-micellar-duong-trang-all-clear-water-micellar-fo.jpg" alt="Nước Tẩy Trang Senka Cấp Ẩm, Dưỡng Sáng Da 230ml All Clear Water Micellar Formula White"></a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="/nuoc-tay-trang-senka-cap-am-duong-sang-da-230ml-all-clear-water-micellar-formula-white" class="ajaxcart__product-name h4" title="Nước Tẩy Trang Senka Cấp Ẩm, Dưỡng Sáng Da 230ml All Clear Water Micellar Formula White">Nước Tẩy Trang Senka Cấp Ẩm, Dưỡng Sáng Da 230ml All Clear Water Micellar Formula White</a>
                                                            <a title="Xóa" class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" data-line="1">Xóa</a>

                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">99.000₫</span>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half cart_select">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" data-id="" data-qty="5" data-line="1" aria-label="-">
                                                                        -
                                                                    </button>
                                                                    <input type="text" name="updates[]" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="6" min="0" data-id="" data-line="1" aria-label="quantity" pattern="[0-9]*">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" data-id="" data-line="1" data-qty="7" aria-label="+">
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">594.000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ajaxcart__row">
                                                <div class="ajaxcart__product cart_product" data-line="2">
                                                    <a href="/gel-rua-mat-diu-nhe-cho-da-nhay-cam-senka-perfect-gel-gentle-wash-100g" class="ajaxcart__product-image cart_image" title="Gel Rửa Mặt Dịu Nhẹ Cho Da Nhạy Cảm Senka Perfect Gel Gentle Wash 100g - Hàng Nhật nội địa"><img src="https://bizweb.dktcdn.net/thumb/compact/100/257/549/products/4901872446636-sakura-jpeg.jpg" alt="Gel Rửa Mặt Dịu Nhẹ Cho Da Nhạy Cảm Senka Perfect Gel Gentle Wash 100g - Hàng Nhật nội địa"></a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="/gel-rua-mat-diu-nhe-cho-da-nhay-cam-senka-perfect-gel-gentle-wash-100g" class="ajaxcart__product-name h4" title="Gel Rửa Mặt Dịu Nhẹ Cho Da Nhạy Cảm Senka Perfect Gel Gentle Wash 100g - Hàng Nhật nội địa">Gel Rửa Mặt Dịu Nhẹ Cho Da Nhạy Cảm Senka Perfect Gel Gentle Wash 100g - Hàng Nhật nội địa</a>
                                                            <a title="Xóa" class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" data-line="2">Xóa</a>

                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">99.000₫</span>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half cart_select">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" data-id="" data-qty="0" data-line="2" aria-label="-">
                                                                        -
                                                                    </button>
                                                                    <input type="text" name="updates[]" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="1" min="0" data-id="" data-line="2" aria-label="quantity" pattern="[0-9]*">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" data-id="" data-line="2" data-qty="2" aria-label="+">
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">99.000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ajaxcart__row">
                                                <div class="ajaxcart__product cart_product" data-line="3">
                                                    <a href="/mi-chinh-ajinomot-noi-dia-nhat-1kg" class="ajaxcart__product-image cart_image" title="Mì chính Ajinomoto nội địa Nhật 1kg - Hàng Nhật nội địa"><img src="https://bizweb.dktcdn.net/thumb/compact/100/257/549/products/1285867.jpg" alt="Mì chính Ajinomoto nội địa Nhật 1kg - Hàng Nhật nội địa"></a>
                                                    <div class="grid__item cart_info">
                                                        <div class="ajaxcart__product-name-wrapper cart_name">
                                                            <a href="/mi-chinh-ajinomot-noi-dia-nhat-1kg" class="ajaxcart__product-name h4" title="Mì chính Ajinomoto nội địa Nhật 1kg - Hàng Nhật nội địa">Mì chính Ajinomoto nội địa Nhật 1kg - Hàng Nhật nội địa</a>
                                                            <a title="Xóa" class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" data-line="3">Xóa</a>

                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">169.000₫</span>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half cart_select">
                                                                <div class="ajaxcart__qty input-group-btn">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" data-id="" data-qty="1" data-line="3" aria-label="-">
                                                                        -
                                                                    </button>
                                                                    <input type="text" name="updates[]" class="ajaxcart__qty-num number-sidebar" maxlength="3" value="2" min="0" data-id="" data-line="3" aria-label="quantity" pattern="[0-9]*">
                                                                    <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" data-id="" data-line="3" data-qty="3" aria-label="+">
                                                                        +
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <div class="grid__item one-half text-right cart_prices">
                                                                <span class="cart-price">338.000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                            <div class="row">
                                                <div class="col-lg-8 col-12">
                                                    <a class="btn-proceed-checkout btn-checkouts" title="Tiếp tục mua hàng" href="collections/all">Tiếp tục mua hàng</a>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="ajaxcart__subtotal">
                                                        <div class="cart__subtotal">
                                                            <div class="cart__col-6">Tổng tiền:</div>
                                                            <div class="text-right cart__totle"><span class="total-price">1.031.000₫</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="cart__btn-proceed-checkout-dt">
                                                        <button onclick="window.location.href=&quot;/checkout&quot;" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Thanh toán">Thanh toán</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <div class="cart-mobile-page d-block d-xl-none">
                            <div class="CartMobileContainer"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-12 col-sm-12 col-xs-12 col-12 col-cart-right">
                        <form method="post" novalidate="" class="formVAT">
                            <h4>
                                Thời gian giao hàng
                            </h4>
                            <div class="timedeli-modal">
                                <fieldset class="input_group date_pick">
                                    <input type="text" placeholder="Chọn ngày" readonly="" id="date" name="attributes[shipdate]" class="date_picker" required="">
                                </fieldset>
                                <fieldset class="input_group date_time">
                                    <select name="time" class="timeer timedeli-cta">
                                        <option selected="">Chọn thời gian</option>


                                        <option value="08h00 - 12h00">08h00 - 12h00</option>

                                        <option value="14h00 - 18h00">14h00 - 18h00</option>

                                        <option value="19h00 - 21h00">19h00 - 21h00</option>

                                    </select>
                                </fieldset>
                            </div>

                        </form>

                        <div class="clearfix"></div>
                        <div class="product-coupon__wrapper my-3">
                            <strong class="d-block mb-2">Các mã giảm giá có thể áp dụng: </strong>
                            <div class="product-coupons coupon-toggle-btn">
















                                <div class="coupon_item lite">
                                    <div class="coupon_content">
                                        FREESHIP
                                    </div>
                                </div>


                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-chevron-right fa-w-10"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" class=""></path></svg>
                            </div>
                        </div>
                        <div id="modal-coupon-product" class="modalcoupon-product" style="display:none;">
                            <div class="modalcoupon-overlay fancybox-overlay fancybox-overlay-fixed"></div>
                            <div class="modal-coupon-product">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="chosee_size">
                                            <p class="title-size">MÃ KHUYẾN MÃI</p>
                                        </div>




























                                        <div class="box-cpou-dk last-cpou">
                                            <div class="item_list_coupon">
                                                <div class="money_coupon">
                                                    0K
                                                </div>
                                                <div class="content_coupon">
                                                    <div class="boz-left">
                                                        <div class="zip_coupon">
                                                            Mã giảm giá <b>FREESHIP</b>
                                                        </div>
                                                        <div class="noidung_coupon">
                                                            Nhập mã FREESHIP miễn phí vận chuyển.
                                                        </div>
                                                    </div>
                                                    <div class="boz-right">
                                                        <button class="btn dis_copy" data-copy="FREESHIP">
                                                            <span>Sao chép</span>
                                                        </button>
                                                        <div class="dk_btn dk_btn_4">
                                                            <span>Điều kiện</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contet_dk contet_dk_4">
                                                Đơn hàng từ 500.000đ cho các đơn hàng tại Hà Nội
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <a title="Close" class="modalcoupon-close close-window" href="javascript:;">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10"><path fill="currentColor" d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z" class=""></path></svg>
                                </a>
                            </div>
                        </div>
                        <script>
                            $(document).on('click', '.modalcoupon-close, #modal-coupon-product .modalcoupon-overlay, .fancybox-overlay', function(e){
                                $("#modal-coupon-product").fadeOut(0);
                                awe_hidePopup();
                            });
                            $(document).ready(function ($){
                                var modal = $('.modalcoupon-product');
                                var btn = $('.coupon-toggle-btn');
                                var span = $('.modalcoupon-close');
                                btn.click(function () {
                                    modal.show();
                                });
                                span.click(function () {
                                    modal.hide();
                                });
                                $(window).on('click', function (e) {
                                    if ($(e.target).is('.modal')) {
                                        modal.hide();
                                    }
                                });
                            });
                            $('.dk_btn_1').click(function () {
                                $('.contet_dk_1').slideToggle();
                                return false;
                            });
                            $('.dk_btn_2').click(function () {
                                $('.contet_dk_2').slideToggle();
                                return false;
                            });
                            $('.dk_btn_3').click(function () {
                                $('.contet_dk_3').slideToggle();
                                return false;
                            });
                            $('.dk_btn_4').click(function () {
                                $('.contet_dk_4').slideToggle();
                                return false;
                            });
                            $(document).on('click', '.dis_copy',function(e){
                                e.preventDefault();
                                var copyText = $(this).attr('data-copy');
                                var copyTextarea = document.createElement("textarea");
                                copyTextarea.textContent = copyText;
                                document.body.appendChild(copyTextarea);
                                copyTextarea.select();
                                document.execCommand("copy");
                                document.body.removeChild(copyTextarea);
                                var cur_text = $(this).text();
                                var $cur_btn = $(this);
                                $(this).addClass("disabled");
                                $(this).text("Đã lưu");
                                $(this).parent().addClass('active');
                                setTimeout(function(){
                                    $cur_btn.removeClass("disabled");
                                    $cur_btn.parent().removeClass('active');
                                    $cur_btn.text(cur_text);
                                },2500)
                            })
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="preload" as="script" href="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/bootstrap-datepicker.js?1717404002200" />
    <script src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/bootstrap-datepicker.js?1717404002200" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            var date = new Date();
            date.setDate(date.getDate());

            $('.input_group #date').datepicker ({
                format: "dd/mm/yyyy",
                orientation: "top right",
                todayHightinght: true,
                startDate: date
            });
            setTimeout(function(){$('.colrightvat').removeClass('d-none')},300)
        })
    </script>
@endsection
