<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    @include('header')
</head>

<body>
<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 10 cho nam
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% giảm giá của sản phẩm thời trang
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Giảm 50%! Mua ngay
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="VNĐ">
                        <option>VNĐ</option>
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Liên hệ :- <a href="#"> +11 900 800 100</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Shop Fashion</a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item active"><a class="nav-link" href="\">Trang chủ</a></li>
                    {!! \App\Helpers\Helper::menus($menus) !!}
                    <li class="nav-item"><a class="nav-link" href="about.html">Thông tin</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact-us.html">Liên hệ</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu"><a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">
                                @if(isset($products_cart))
                                    @php count($products_cart) @endphp
                                @else
                                    0
                                @endif
                            </span>
                        </a></li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                @php $sumPriceCart = 0; @endphp
                <ul class="cart-list">
                    @if (isset($products_cart) > 0)
                        @foreach($products_cart as $item)
                            @php
                                $price = $item->price_sale != 0 ? $item->price_sale : $item->price;
                                $sumPriceCart += $item->price_sale != 0 ? $item->price_sale : $item->price;
                            @endphp
                            <li>
                                <a href="#" class="photo"><img src="{{ $item->thumb }}"
                                                               class="cart-thumb"
                                                               style="max-height: 48px;max-width: 48px;"
                                                               alt="{{ $item->name }}"/></a>
                                <h6><a href="#">{{ $item->name }}</a></h6>
                                <p><span class="price">{!! $price !!}</span><span style="font-size:4px !important;">&ensp;đ</span></p>
                            </li>
                        @endforeach
                        <li class="total">
                            <a href="/carts" class="btn btn-default hvr-hover btn-cart">Giỏ hàng</a>
                            <span class="float-right"><strong>Tổng</strong>: {{ number_format($sumPriceCart, '0', '', '.') }}</span>
                        </li>
                    @else
                        Không có sản phẩm
                    @endif
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

@yield('content')

<!-- End Instagram Feed  -->
@include('footer')
</body>

</html>
