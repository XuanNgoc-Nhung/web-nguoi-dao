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

                <li><strong><span> {{$danh_muc['ten']}}</span></strong></li>
            </ul>
        </div>
    </section>
    <div class="container">
        <div class="row">

            <div class="block-collection col-xl-12 col-lg-12 col-12">
                <div class="section-box-bg">
                    <div class="category-products">
                        <div class="products-view products-view-grid list_hover_pro">
                            <div class="row">
                                @if(count($san_pham))
                                    @foreach($san_pham as $sp)
                                        <div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                            <div class="item_product_main">
                                                <form action="/cart/add" method="post" class="variants product-action"
                                                      data-id="product-actions-35302158" enctype="multipart/form-data">
                                                    <a class="image_thumb scale_hover"
                                                       href="{{'san-pham-'. $sp['slug']}}"
                                                       title="{{$sp['ten']}}">
                                                        <img width="480" height="480" style="height: 100%" class="lazyload image1 loaded"
                                                             src="{{$sp['hinh_anh']?json_decode($sp['hinh_anh'])[0]:''}}"
                                                             alt="{{$sp['ten']}}"
                                                             data-was-processed="true">
                                                    </a>
                                                    <div class="group_action">
                                                        <input type="hidden" name="variantId" value="113894276">
                                                        <a title="Xem nhanh"
                                                           href="{{$sp['slug']}}"
                                                           data-handle="{{$sp['slug']}}"
                                                           class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                            <img width="24" height="24"
                                                                 src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1718684608158"
                                                                 alt="Xem nhanh">
                                                        </a>
                                                    </div>
                                                </form>
                                                <div class="product-info">
                                                    <h3 class="product-name">
                                                        <a
                                                            href="{{'san-pham-'. $sp['slug']}}"
                                                            title="{{$sp['ten']}}">{{$sp['ten']}}</a></h3>
                                                    <div class="price-box">
                                                        <span class="price">{{(int)$sp['gia']-(int)$sp['khuyen_mai']}}₫</span>
                                                        <span class="compare-price">{{(int)$sp['gia']}}₫</span>
                                                        <span class="smart">(-20%)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12 text-center">
                                        <h1>Không có sản phẩm phù hợp</h1>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="pagenav">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('user.layouts.xem-nhanh-san-pham')
@endsection
