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
                    <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                   data-icon="chevron-right" role="img"
                                                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                   class="svg-inline--fa fa-chevron-right fa-w-10"><path
                                fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path></svg>&nbsp;</span>
                </li>
                <li>
                    <a class="changeurl" href="/tay-da-chet" title="Tẩy da chết"><span>Tẩy da chết</span></a>
                    <span class="mr_lr">&nbsp;<svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                   data-icon="chevron-right" role="img"
                                                   xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                   class="svg-inline--fa fa-chevron-right fa-w-10"><path
                                fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path></svg>&nbsp;</span>
                </li>
                <li>
                    <strong><span>{{$san_pham['ten']}}</span></strong>
                </li>
                <li>
                </li>
            </ul>
        </div>
    </section>
    <section class="product layout-product" itemscope="" itemtype="https://schema.org/Product">
        <div class="container">
            <div class="details-product">
                <div class="row">
                    <div class="col-lg-9 col-col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="product-detail-left product-images col-12 col-md-6 col-lg-6">
                                <div class="product-image-block relative">
                                    <div
                                        class="swiper-container gallery-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                                        <div class="swiper-wrapper" id="lightgallery">
                                            @if(count(json_decode($san_pham['hinh_anh'])))
                                                @foreach(json_decode($san_pham['hinh_anh']) as $img)
                                                    <a class="swiper-slide" data-hash="3"
                                                       href="{{$img}}"
                                                       target="_blank"
                                                       title="Click để xem" style="width: 429px;">
                                                        <img height="480" width="480"
                                                             src="{{$img}}"
                                                             alt="{{$san_pham['ten']}}"
                                                             data-image="{{$img}}"
                                                             class="img-responsive mx-auto d-block swiper-lazy">
                                                    </a>
                                                @endforeach

                                            @endif
                                        </div>
                                    </div>
                                    <div
                                        class="swiper-container gallery-thumbs swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-free-mode swiper-container-thumbs">
                                        <div class="swiper-wrapper">

                                            @if(count(json_decode($san_pham['hinh_anh'])))
                                                @foreach(json_decode($san_pham['hinh_anh']) as $img)
                                                    <div class="swiper-slide swiper-slide-visible" data-hash="3"
                                                         style="width: 98.75px; margin-right: 10px;">
                                                        <div class="p-100">
                                                            <img height="80" width="80"
                                                                 src="{{$img}}"
                                                                 alt="{{$san_pham['ten']}}"
                                                                 data-image="{{$img}}"
                                                                 class="swiper-lazy swiper-lazy-loaded">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="swiper-button-next swiper-button-disabled"></div>
                                        <div class="swiper-button-prev swiper-button-disabled"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="details-pro col-12 col-md-6 col-lg-6">
                                <h1 class="title-product">{{$san_pham['ten']}}</h1>
                                <div class="inventory_quantity">
								<span class="mb-break">
									<span class="stock-brand-title">Người bán:</span>
									<span class="a-vendor">{{$san_pham['cua_hang']}}</span>
								</span>
                                    <span class="line">&nbsp;|&nbsp;</span>
                                    <span class="mb-break">
									<span class="stock-brand-title">Tình trạng:</span>
									<span class="a-stock">{{$san_pham['trang_thai']==1?'Còn hàng':'Tạm hết'}}</span>
								</span>
                                    <br>
                                    <span class="mb-break">
									<span class="stock-brand-title">Barcode:</span>
									<span class="a-vendor barcode">4550084713397</span>
								</span>
                                </div>
                                <form enctype="multipart/form-data" data-cart-form="" id="add-to-cart-form"
                                      action="/cart/add" method="post" class="form-inline">
                                    <div class="price-box clearfix">
                                        <div class="price-box clearfix">
									<span class="special-price">
										Giá: <span class="price product-price">{{$san_pham['gia']}} vnđ</span>
									</span>
                                            @if($san_pham['khuyen_mai'])
                                                <span class="old-price">
										Giá thị thường ngày: <del class="price product-price-old">
											{{$san_pham['gia']}}₫
										</del>
									</span> <!-- Giás gốc -->
                                                <span class="save-price">Tiết kiệm:
										<span class="price product-price-save">{{$san_pham['khuyen_mai']}}₫</span> so với giá thường ngày
									</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-product  ">
                                        <div class="box-variant clearfix  d-none ">
                                            <input type="hidden" id="one_variant" name="variantId" value="113894276">
                                        </div>
                                        <div class="clearfix form-group ">
                                            <div class="flex-quantity">
                                                <div class="custom custom-btn-number show">
                                                    <label>Số lượng:</label>
                                                    <div class="input_number_product">
                                                        <button class="btn_num num_1 button button_qty"
                                                                onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro > 1 ) result.value--;return false;"
                                                                type="button">−
                                                        </button>
                                                        <input type="text" id="qtym" name="quantity" value="1"
                                                               maxlength="3" class="form-control prd_quantity"
                                                               onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                               onchange="if(this.value == 0)this.value=1;">
                                                        <button class="btn_num num_2 button button_qty"
                                                                onclick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                                type="button"><span>+</span></button>
                                                    </div>
                                                </div>
                                                <div class="btn-mua button_actions clearfix">
                                                    <a href="javascript:void(0)" class="buynow" title="">
                                                        <span>MUA NGAY</span><span>Giao hàng tận nơi hoặc nhận tại cửa hàng</span>
                                                    </a>
                                                    <div style="display: flex; flex-wrap: wrap; width: 100%">
                                                        <button type="submit"
                                                                class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart">
                                                            <span class="txt-main text_1">Thêm vào giỏ hàng</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="details-pro-3 col-12 col-md-12 col-lg-3">
                        <div class="product-policises-wrapper">
                            <ul class="product-policises">
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload loaded"
                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_1.png?1718684608158"
                                             data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_1.png?1718684608158"
                                             alt="Miễn phí vận chuyển cho đơn hàng nội thành Hà Nội từ 500k tại"
                                             data-was-processed="true">
                                    </div>
                                    <div class="content_poli">
                                        Miễn phí vận chuyển cho đơn hàng nội thành Hà Nội từ 500k tại
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload loaded"
                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_2.png?1718684608158"
                                             data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_2.png?1718684608158"
                                             alt="Đổi trả miễn phí trong 30 ngày (*)" data-was-processed="true">
                                    </div>
                                    <div class="content_poli">
                                        Đổi trả miễn phí trong 30 ngày (*)
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload loaded"
                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_3.png?1718684608158"
                                             data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/policy_image_3.png?1718684608158"
                                             alt="Cam kết chính hãng 100%" data-was-processed="true">
                                    </div>
                                    <div class="content_poli">
                                        Cam kết chính hãng 100%
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-col-md-8 col-sm-12 col-xs-12">
                        <div class="product-tab e-tabs not-dqtab">
                            <ul class="tabs tabs-title clearfix">
                                <li class="tab-link active" data-tab="#tab-1">
                                    <h3>Mô tả sản phẩm</h3>
                                </li>
                            </ul>
                            <div class="tab-float">
                                <div id="tab-1" class="tab-content active content_extab">
                                    <div class="rte product_getcontent">
                                        <div id="content">
                                            {!! $san_pham['mo_ta'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-col-md-4 col-sm-12 col-xs-12 product_info">
                        <div class="product-spec">
                            <div class="heading-title">Thông tin chi tiết</div>
                            <div class="product_getcontent">
                                {!! $san_pham['chi_tiet'] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-col-md-12 col-sm-12 col-xs-12">
                        <div class="productRelate">
                            <div class="title_index">
                                <h2 class="h2_title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                                         class="bi bi-star" viewBox="0 0 16 16">
                                        <path
                                            d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                    </svg>
                                    <a class="main-title" href="/tay-da-chet" title="Sản phẩm liên quan">Sản phẩm cùng
                                        danh mục</a>
                                    <span class="hd-line"></span>
                                </h2>
                            </div>
                            <div
                                class="product-relate-swiper swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                                <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                    <div class="swiper-slide swiper-slide-active"
                                         style="width: 280.25px; margin-right: 15px;">
                                        <div class=" item_product_main">
                                            <form action="/cart/add" method="post" class="variants product-action"
                                                  data-id="product-actions-35036786" enctype="multipart/form-data">
                                                <a class="image_thumb scale_hover"
                                                   href="/ay-te-bao-chet-toan-than-white-conc-aloha"
                                                   title="Tẩy tế bào chết toàn thân WHITE CONC ALOHA- Hàng Nhật nội địa">
                                                    <img width="480" height="480" class="lazyload image1"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                         data-src="//bizweb.dktcdn.net/thumb/large/100/257/549/products/4990110005865.jpg?v=1710755838083"
                                                         alt="Tẩy tế bào chết toàn thân WHITE CONC ALOHA- Hàng Nhật nội địa">
                                                </a>
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="112437730">
                                                    <button
                                                        class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                        title="Mua ngay">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1718684608158"
                                                             alt="Mua ngay">
                                                    </button>
                                                    <a title="Xem nhanh"
                                                       href="/ay-te-bao-chet-toan-than-white-conc-aloha"
                                                       data-handle="ay-te-bao-chet-toan-than-white-conc-aloha"
                                                       class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                             alt="Xem nhanh">
                                                    </a>
                                                    <a href="javascript:void(0)" class="setWishlist btn-anima hidden-xs"
                                                       data-wish="ay-te-bao-chet-toan-than-white-conc-aloha"
                                                       tabindex="0" title="Thêm vào yêu thích">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/heart.svg?1718684608158"
                                                             alt="Thêm vào yêu thích">
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="product-info">
                                                <h3 class="product-name"><a
                                                        href="/ay-te-bao-chet-toan-than-white-conc-aloha"
                                                        title="Tẩy tế bào chết toàn thân WHITE CONC ALOHA- Hàng Nhật nội địa">Tẩy
                                                        tế bào chết toàn thân WHITE CONC ALOHA- Hàng Nhật nội địa</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="price">200.000₫</span>
                                                    <span class="compare-price">250.000₫</span>
                                                    <span class="smart">(-20%)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-next"
                                         style="width: 280.25px; margin-right: 15px;">
                                        <div class=" item_product_main">
                                            <form action="/cart/add" method="post" class="variants product-action"
                                                  data-id="product-actions-29655887" enctype="multipart/form-data">
                                                <a class="image_thumb scale_hover"
                                                   href="/gel-tay-te-bao-chet-va-peel-da-detclear-bright-peel-mau-den"
                                                   title="Gel tẩy tế bào chết và peel da Detclear Bright&amp; Peel màu đen - Hàng Nhật nội địa">
                                                    <img width="480" height="480" class="lazyload image1"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                         data-src="//bizweb.dktcdn.net/thumb/large/100/257/549/products/det-sumi.png?v=1677151829927"
                                                         alt="Gel tẩy tế bào chết và peel da Detclear Bright&amp; Peel màu đen - Hàng Nhật nội địa">
                                                </a>
                                                <div class="vendoritem">
                                                    <img width="250" height="54" class="lazyload"
                                                         src="data:image/png;base64,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"
                                                         data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/thuonghieu_16.jpg?1718684608158"
                                                         alt="Japan">
                                                </div>
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="82261960">
                                                    <button
                                                        class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                        title="Mua ngay">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1718684608158"
                                                             alt="Mua ngay">
                                                    </button>
                                                    <a title="Xem nhanh"
                                                       href="/gel-tay-te-bao-chet-va-peel-da-detclear-bright-peel-mau-den"
                                                       data-handle="gel-tay-te-bao-chet-va-peel-da-detclear-bright-peel-mau-den"
                                                       class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                             alt="Xem nhanh">
                                                    </a>
                                                    <a href="javascript:void(0)" class="setWishlist btn-anima hidden-xs"
                                                       data-wish="gel-tay-te-bao-chet-va-peel-da-detclear-bright-peel-mau-den"
                                                       tabindex="0" title="Thêm vào yêu thích">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/heart.svg?1718684608158"
                                                             alt="Thêm vào yêu thích">
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="product-info">
                                                <h3 class="product-name"><a
                                                        href="/gel-tay-te-bao-chet-va-peel-da-detclear-bright-peel-mau-den"
                                                        title="Gel tẩy tế bào chết và peel da Detclear Bright&amp; Peel màu đen - Hàng Nhật nội địa">Gel
                                                        tẩy tế bào chết và peel da Detclear Bright&amp; Peel màu đen -
                                                        Hàng Nhật nội địa</a></h3>
                                                <div class="price-box">
                                                    <span class="price">250.000₫</span>
                                                    <span class="compare-price">320.000₫</span>
                                                    <span class="smart">(-22%)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="width: 280.25px; margin-right: 15px;">
                                        <div class=" item_product_main">
                                            <form action="/cart/add" method="post" class="variants product-action"
                                                  data-id="product-actions-29655865" enctype="multipart/form-data">
                                                <a class="image_thumb scale_hover"
                                                   href="/gel-tay-te-bao-chet-detclear-white-fragrance-musk-mau-den-cho-da-dau-mun-dau-den"
                                                   title="Gel Tẩy Tế Bào Chết Detclear White Fragrance musk màu đen ( cho da dầu, mụn đầu đen)">
                                                    <img width="480" height="480" class="lazyload image1"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                         data-src="//bizweb.dktcdn.net/thumb/large/100/257/549/products/4560371873208.webp?v=1677153587417"
                                                         alt="Gel Tẩy Tế Bào Chết Detclear White Fragrance musk màu đen ( cho da dầu, mụn đầu đen)">
                                                </a>
                                                <div class="vendoritem">
                                                    <img width="250" height="54" class="lazyload"
                                                         src="data:image/png;base64,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"
                                                         data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/thuonghieu_16.jpg?1718684608158"
                                                         alt="Japan">
                                                </div>
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="82261912">
                                                    <button
                                                        class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                        title="Mua ngay">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1718684608158"
                                                             alt="Mua ngay">
                                                    </button>
                                                    <a title="Xem nhanh"
                                                       href="/gel-tay-te-bao-chet-detclear-white-fragrance-musk-mau-den-cho-da-dau-mun-dau-den"
                                                       data-handle="gel-tay-te-bao-chet-detclear-white-fragrance-musk-mau-den-cho-da-dau-mun-dau-den"
                                                       class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                             alt="Xem nhanh">
                                                    </a>
                                                    <a href="javascript:void(0)" class="setWishlist btn-anima hidden-xs"
                                                       data-wish="gel-tay-te-bao-chet-detclear-white-fragrance-musk-mau-den-cho-da-dau-mun-dau-den"
                                                       tabindex="0" title="Thêm vào yêu thích">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/heart.svg?1718684608158"
                                                             alt="Thêm vào yêu thích">
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="product-info">
                                                <h3 class="product-name"><a
                                                        href="/gel-tay-te-bao-chet-detclear-white-fragrance-musk-mau-den-cho-da-dau-mun-dau-den"
                                                        title="Gel Tẩy Tế Bào Chết Detclear White Fragrance musk màu đen ( cho da dầu, mụn đầu đen)">Gel
                                                        Tẩy Tế Bào Chết Detclear White Fragrance musk màu đen ( cho da
                                                        dầu, mụn đầu đen)</a></h3>
                                                <div class="price-box">
                                                    <span class="price">195.000₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="width: 280.25px; margin-right: 15px;">
                                        <div class=" item_product_main">
                                            <form action="/cart/add" method="post" class="variants product-action"
                                                  data-id="product-actions-29549927" enctype="multipart/form-data">
                                                <a class="image_thumb scale_hover"
                                                   href="/gel-tay-te-bao-chet-natureine-aqua-peel-moisture-peeling-gel-300ml-30ml"
                                                   title="Gel Tẩy Tế Bào Chết Natureine Aqua Peel Moisture Peeling Gel (300ml + 30ml) - Hàng Nhật nội địa">
                                                    <img width="480" height="480" class="lazyload image1"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                         data-src="//bizweb.dktcdn.net/thumb/large/100/257/549/products/tai-xuong-jfif-1676539002901.jpg?v=1676539005347"
                                                         alt="Gel Tẩy Tế Bào Chết Natureine Aqua Peel Moisture Peeling Gel (300ml + 30ml) - Hàng Nhật nội địa">
                                                </a>
                                                <div class="vendoritem">
                                                    <img width="250" height="54" class="lazyload"
                                                         src="data:image/png;base64,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"
                                                         data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/thuonghieu_16.jpg?1718684608158"
                                                         alt="Japan">
                                                </div>
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="81527935">
                                                    <button
                                                        class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                        title="Mua ngay">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1718684608158"
                                                             alt="Mua ngay">
                                                    </button>
                                                    <a title="Xem nhanh"
                                                       href="/gel-tay-te-bao-chet-natureine-aqua-peel-moisture-peeling-gel-300ml-30ml"
                                                       data-handle="gel-tay-te-bao-chet-natureine-aqua-peel-moisture-peeling-gel-300ml-30ml"
                                                       class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                             alt="Xem nhanh">
                                                    </a>
                                                    <a href="javascript:void(0)" class="setWishlist btn-anima hidden-xs"
                                                       data-wish="gel-tay-te-bao-chet-natureine-aqua-peel-moisture-peeling-gel-300ml-30ml"
                                                       tabindex="0" title="Thêm vào yêu thích">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/heart.svg?1718684608158"
                                                             alt="Thêm vào yêu thích">
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="product-info">
                                                <h3 class="product-name"><a
                                                        href="/gel-tay-te-bao-chet-natureine-aqua-peel-moisture-peeling-gel-300ml-30ml"
                                                        title="Gel Tẩy Tế Bào Chết Natureine Aqua Peel Moisture Peeling Gel (300ml + 30ml) - Hàng Nhật nội địa">Gel
                                                        Tẩy Tế Bào Chết Natureine Aqua Peel Moisture Peeling Gel (300ml
                                                        + 30ml) - Hàng Nhật nội địa</a></h3>
                                                <div class="price-box">
                                                    <span class="price">450.000₫</span>
                                                    <span class="compare-price">600.000₫</span>
                                                    <span class="smart">(-25%)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="width: 280.25px; margin-right: 15px;">
                                        <div class=" item_product_main">
                                            <form action="/cart/add" method="post" class="variants product-action"
                                                  data-id="product-actions-26603432" enctype="multipart/form-data">
                                                <a class="image_thumb scale_hover"
                                                   href="/tay-da-chet-dang-tui-natural-aqua-gel-80g"
                                                   title="Tẩy da chết dạng túi Natural Aqua Gel 80g -Hàng Nhật nội địa">
                                                    <img width="480" height="480" class="lazyload image1"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                         data-src="//bizweb.dktcdn.net/thumb/large/100/257/549/products/image-removebg-preview-49.png?v=1690539622243"
                                                         alt="Tẩy da chết dạng túi Natural Aqua Gel 80g -Hàng Nhật nội địa">
                                                </a>
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="67726349">
                                                    <button
                                                        class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                        title="Mua ngay">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1718684608158"
                                                             alt="Mua ngay">
                                                    </button>
                                                    <a title="Xem nhanh"
                                                       href="/tay-da-chet-dang-tui-natural-aqua-gel-80g"
                                                       data-handle="tay-da-chet-dang-tui-natural-aqua-gel-80g"
                                                       class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                             alt="Xem nhanh">
                                                    </a>
                                                    <a href="javascript:void(0)" class="setWishlist btn-anima hidden-xs"
                                                       data-wish="tay-da-chet-dang-tui-natural-aqua-gel-80g"
                                                       tabindex="0" title="Thêm vào yêu thích">
                                                        <img width="24" height="24"
                                                             src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/heart.svg?1718684608158"
                                                             alt="Thêm vào yêu thích">
                                                    </a>
                                                </div>
                                            </form>
                                            <div class="product-info">
                                                <h3 class="product-name"><a
                                                        href="/tay-da-chet-dang-tui-natural-aqua-gel-80g"
                                                        title="Tẩy da chết dạng túi Natural Aqua Gel 80g -Hàng Nhật nội địa">Tẩy
                                                        da chết dạng túi Natural Aqua Gel 80g -Hàng Nhật nội địa</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="price">195.000₫</span>
                                                    <span class="compare-price">220.000₫</span>
                                                    <span class="smart">(-11%)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-prev swiper-button-disabled"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.buynow', function () {
                var _variantID = $('#product-selectors').val();
                var _Qty = parseInt($('#qtym').val());
                ;
                if (_variantID == null) {
                    _variantID = $('#one_variant').val();
                }
                jQuery.ajax({
                    type: "POST",
                    url: "/cart/add.js",
                    data: "quantity=" + _Qty + "&VariantId=" + _variantID,
                    dataType: "json",
                    success: function (e) {
                        window.location = '/checkout';
                    },
                    error: function (e, t) {
                        Bizweb.onError(e, t);
                    }
                });
            })
        });
        var variantsize = false;
        var ww = $(window).width();

        function validate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }

        jQuery(function ($) {

            // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

            // Hide selectors if we only have 1 variant and its title contains 'Default'.

            $('.selector-wrapper').hide();

            $('.selector-wrapper').css({
                'text-align': 'left',
                'margin-bottom': '15px'
            });
        });

        jQuery('.swatch :radio').change(function () {
            var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
            var optionValue = jQuery(this).val();
            jQuery(this)
                .closest('form')
                .find('.single-option-selector')
                .eq(optionIndex)
                .val(optionValue)
                .trigger('change');
            $(this).closest('.swatch').find('.header .value-roperties').html(optionValue);
        });
        setTimeout(function () {
            $('.swatch .swatch-element').each(function () {
                $(this).closest('.swatch').find('.header .value-roperties').html($(this).closest('.swatch').find('input:checked').val());
            });
        }, 500);
    </script>
    <script>
        function activeTab(obj) {
            $('.product-tab ul li').removeClass('active');
            $(obj).addClass('active');
            var id = $(obj).attr('data-tab');
            $('.tab-content').removeClass('active');
            $(id).addClass('active');
        }

        $('.product-tab ul li').click(function () {
            activeTab(this);
            return false;
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 4,
            slidesPerView: 10,
            freeMode: true,
            lazy: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            hashNavigation: true,
            slideToClickedSlide: true,
            breakpoints: {
                260: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                300: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                1199: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
            navigation: {
                nextEl: '.gallery-thumbs .swiper-button-next',
                prevEl: '.gallery-thumbs .swiper-button-prev',
            },
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 0,
            lazy: true,
            hashNavigation: true,
            thumbs: {
                swiper: galleryThumbs
            }
        });
        var swiperrela = new Swiper('.product-relate-swiper', {
            slidesPerView: 4,
            spaceBetween: 20,
            slidesPerGroup: 1,
            navigation: {
                nextEl: '.product-relate-swiper .swiper-button-next',
                prevEl: '.product-relate-swiper .swiper-button-prev',
            },
            breakpoints: {
                280: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 15
                }
            }
        });
    </script>
@endsection
