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

                <li><strong><span>Hệ thống đại lý</span></strong></li>

            </ul>
        </div>
    </section>
    <section class="page page-store">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xs-12 col-12 col-left">
                    <div class="option-chos">
                        <div class="group-city group">
                            <select disabled id="city">
                                <option value="" selected="">Danh sách cửa hàng</option>
                            </select>
                        </div>
                        <div class="info-store info-block" id="info-store">
                            @if(count($cua_hang))
                                @foreach($cua_hang as $key=>$ch)
                                    <div data-local="Hà Nội" data-district="Quận Đống Đa" data-ward="undefined"
                                         data-url="{{$ch['ban_do']}}"
                                         class="store-list">
                                        <div class="store-name"
                                             data-url={{$ch['ban_do']}}">
                                            <b>SAKURA Kim Liên</b><span><i class="icon"><svg width="12" height="16"
                                                                                             viewBox="0 0 12 16"
                                                                                             fill="none"
                                                                                             xmlns="http://www.w3.org/2000/svg"> <path
                                                            fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M6.00033 0.5C2.77533 0.5 0.166992 3.10833 0.166992 6.33333C0.166992 10.7083 6.00033 15.5 6.00033 15.5C6.00033 15.5 11.8337 10.7083 11.8337 6.33333C11.8337 3.10833 9.22533 0.5 6.00033 0.5ZM6.00033 8.83333C7.38104 8.83333 8.50033 7.71405 8.50033 6.33333C8.50033 4.95262 7.38104 3.83333 6.00033 3.83333C4.61961 3.83333 3.50033 4.95262 3.50033 6.33333C3.50033 7.71405 4.61961 8.83333 6.00033 8.83333Z"
                                                            fill="#f26398"></path> </svg></i> 135 Lương Định Của, Phường Kim Liên, Quận Đống Đa, Hà Nội</span><span><i
                                                    class="icon"><svg width="15" height="15" viewBox="0 0 15 15"
                                                                      fill="none"
                                                                      xmlns="http://www.w3.org/2000/svg"> <path
                                                            d="M14.7083 11.9274L13.0454 10.8187L11.5672 9.83339C11.2819 9.64357 10.8985 9.7058 10.6878 9.97615L9.77312 11.1521C9.57663 11.4073 9.22316 11.4806 8.94139 11.3246C8.32071 10.9793 7.58674 10.6542 5.96729 9.03271C4.34783 7.41118 4.02068 6.67929 3.67542 6.05861C3.51941 5.77684 3.59274 5.42338 3.84791 5.22691L5.02385 4.31219C5.29417 4.1016 5.35643 3.7182 5.16661 3.43288L4.21154 2.00013L3.07258 0.291677C2.87873 0.000879503 2.49066 -0.0864242 2.19096 0.0933101L0.877418 0.881329C0.522432 1.09048 0.261487 1.42821 0.148637 1.8245C-0.210569 3.13415 -0.28299 6.02317 4.34704 10.6532C8.97707 15.2832 11.8658 15.2106 13.1755 14.8513C13.5718 14.7385 13.9095 14.4776 14.1186 14.1225L14.9067 12.809C15.0864 12.5093 14.9991 12.1213 14.7083 11.9274Z"
                                                            fill="#f26398"></path> <path
                                                            d="M8.53399 2.32747C10.961 2.33017 12.9278 4.29697 12.9305 6.72399C12.9305 6.86681 13.0463 6.98262 13.1891 6.98262C13.3319 6.98262 13.4478 6.86684 13.4478 6.72399C13.4448 4.01144 11.2466 1.81323 8.53402 1.81024C8.3912 1.81024 8.27539 1.92602 8.27539 2.06887C8.27536 2.21166 8.39114 2.32747 8.53399 2.32747Z"
                                                            fill="#f26398"></path> <path
                                                            d="M8.53402 3.87932C10.1044 3.88117 11.377 5.15375 11.3788 6.72411C11.3788 6.86693 11.4946 6.98274 11.6374 6.98274C11.7803 6.98274 11.8961 6.86696 11.8961 6.72411C11.8939 4.8682 10.39 3.3642 8.53402 3.36206C8.3912 3.36206 8.27539 3.47784 8.27539 3.62069C8.27539 3.76354 8.39117 3.87932 8.53402 3.87932Z"
                                                            fill="#f26398"></path> <path
                                                            d="M8.53399 5.43087C9.2478 5.43172 9.82623 6.01015 9.82708 6.72396C9.82708 6.86678 9.94286 6.98259 10.0857 6.98259C10.2285 6.98259 10.3443 6.86681 10.3443 6.72396C10.3432 5.72462 9.53336 4.91478 8.53402 4.91364C8.3912 4.91364 8.27539 5.02941 8.27539 5.17227C8.27536 5.31509 8.39114 5.43087 8.53399 5.43087Z"
                                                            fill="#f26398"></path> </svg></i> <a
                                                    href="tel:0985 321 840">0985 321 840</a></span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <script>
                                $(document).ready(function ($) {
                                    $('.store-list .store-name').click(function () {
                                        var urls = $(this).attr('data-url');
                                        $('.store-list').removeClass('active');
                                        $(this).parent().addClass('active');
                                        $('.wrapcontact').addClass('d-none');
                                        $('.pagebody').removeClass('d-none');
                                        $('.pagebody iframe').attr('src', urls);
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8 col-xs-12 col-12 col-right">
                    <div class="wrapcontact">
                        <div class="iFrameMap">
                            <div id="contact_map" class="map">
                                <iframe
                                    src="{{$cua_hang[0]['ban_do']}}"
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="pagebody d-none">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.518104241413!2d106.650981814287!3d10.771573662229935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec073c87139%3A0x10ef6fd79e84aa6f!2zNzAgTOG7ryBHaWEsIFBoxrDhu51uZyAxNSwgUXXhuq1uIDExLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1648374861399!5m2!1svi!2s"
                            width="600" height="450"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
