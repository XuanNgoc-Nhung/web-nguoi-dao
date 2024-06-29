@extends("user.layouts.app")
@section("title")
    <title>Quản lý vật phẩm</title>
@endsection
@section("content")
    @include('user.layouts.banner-top')
    @include('user.layouts.doi-tac')
    @include('user.layouts.hot-sale')
    <section class="section_air_conditioner">
        <div class="container">
            <a class="banner_air_conditioner" href="https://sieuthisakura.com/hoa-my-pham" title="Banner">
                <img width="1200" height="314" class="lazyload"
                     src="data:image/png;base64,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"
                     data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/men_product_img.jpg?1717404002200"
                     alt="Banner"/>
            </a>
            @if(count($list_cate_child))
                @foreach($list_cate_child as $cate)
                    <div class="title_index">
                        <h2 class="h2_title">
                            <img width="32" height="32"
                                 src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/icon_men_product.png?1717404002200"
                                 alt="{{$cate['ten']}}"/>
                            <a class="main-title" href="/danh-muc-{{$cate['slug']}}" title="{{$cate['ten']}}">{{$cate['ten']}}</a>
                        </h2>
                        <ul class="link_title">
                            <li><a href="/danh-muc-{{$cate['slug']}}" title="{{$cate['ten']}}">Xem tất cả</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        @if(count($cate['sanPham']))
                            @foreach($cate['sanPham'] as $item)
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                                    <div class="item_product_main ">
                                        <form action="/cart/add" method="post" class="variants product-action"
                                              data-id="product-actions-26080997" enctype="multipart/form-data">
                                            <a class="image_thumb scale_hover"
                                               href="{{'san-pham-'. $item['slug']}}"
                                               title="{{$item['ten']}}">
                                                <img width="480" style="height: 100%" class="lazyload image1"
                                                     src="{{json_decode($item['hinh_anh'])[0]}}"
                                                     data-src="{{json_decode($item['hinh_anh'])[0]}}"
                                                     alt="{{$item['ten']}}">
                                            </a>
                                            <div class="group_action">
                                                <button
                                                    class="btn-anima hidden-xs btn-buy btn-cart btn-left btn btn-views left-to add_to_cart active "
                                                    title="Mua ngay">
                                                    <img width="24" height="24"
                                                         src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/cart-add.svg?1717404002200"
                                                         alt="Mua ngay"/>
                                                </button>
                                                <a title="Xem nhanh"
                                                   data-handle="{{$item}}"
                                                   class="btn-anima hidden-xs xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                                                    <img width="24" height="24"
                                                         src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/view.svg?1717404002200"
                                                         alt="Xem nhanh"/>
                                                </a>
                                            </div>
                                        </form>
                                        <div class="product-info">
                                            <h3 class="product-name"><a
                                                    href="{{'san-pham-'. $item['slug']}}"
                                                    title="{{$item['ten']}}">{{$item['ten']}}</a></h3>
                                            <div class="price-box">
                                                    <span class="price">{{$item['gia']-$item['khuyen_mai']}}₫</span>
                                                    <span class="compare-price">{{$item['gia']}}đ</span>
                                                    <span class="smart">(-{{$item['khuyen_mai']}}đ)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <p>Chưa có sản phẩm</p>
                            </div>
                        @endif
                    </div>
                    <hr>
                @endforeach
            @else
                <p>Chưa có danh mục</p>
            @endif
        </div>
    </section>
    @include('user.layouts.xem-nhanh-san-pham')
@endsection
