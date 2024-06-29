
<header class="header">
    <div class="container">
        <div class="box-catelory">
            <div class="row align-items-center">
                <div class="col-lg-10 header-mid">
                    <div class="navigation-horizontal">
                        <nav class="header-nav">
                            <ul id="nav" class="nav">
                                @foreach($list_cate as $cate)
                                    <li class="nav-item has-childs">
                                        <a style="cursor: pointer" class="nav-link" title="MẸ & BÉ">
                                            <i class="mask_icon" style="-webkit-mask-image: url('{{$cate['avatar']}}')"></i>
                                            <span style="text-transform: uppercase">{{$cate['ten']}}</span>
                                            <img width="32" height="32" src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/down-arrow.png?1717404002200" alt="icon"/></a>
                                        <i class="open_mnu down_icon"></i>
                                        <ul class="dropdown-menu">
                                            @foreach($cate->danhMucCon as $child)
                                                <li class="nav-item-lv2">
                                                    <a class="nav-link" href="danh-muc-{{$child['slug']}}" title="Sữa cho bé">{{$child['ten']}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="{{route('user.tinTuc')}}" class="nav-link" title="MẸ & BÉ">
                                        <i class="mask_icon" style="-webkit-mask-image: url('https://bizweb.dktcdn.net/100/257/549/themes/918015/assets/icon_megamenu_7.png?1717404002200')"></i>
                                        TIN TỨC </a>
                                </li>
                                <li class="nav-item li-kmdiscount">
                                    <a class="nav-link" title="Khuyến mãi">
                                        <img width="32" height="32" alt="Khuyến mãi" class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/gift.gif?1717404002200"/> Khuyến mãi</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="control-menu">
                            <a href="#" id="prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#fff" d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg></a>
                            <a href="#" id="next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#fff" d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-12 header-menu">
                    <div class="li-kmdiscount">
                        <a href="/khuyenmai" class="item-link" title="Khuyến mãi">
                            <img width="32" height="32" alt="Khuyến mãi" class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="//bizweb.dktcdn.net/100/257/549/themes/918015/assets/gift.gif?1717404002200"> Khuyến mãi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
