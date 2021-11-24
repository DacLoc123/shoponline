@extends('main')

@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Chi tiết sản phẩm</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{$product->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"><img style="max-height: 420px !important;" class="d-block w-100" src="{{$product->thumb}}"
                                                                   alt="{{$product->name}}"></div>
                            @foreach($productImages as $item)
                                <div class="carousel-item"><img class="d-block w-100" style="max-height: 420px !important;" src="{{$item->image}}"
                                                                alt="Second slide"></div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Lùi</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Tiến</span>
                        </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{$product->thumb}}" alt=""/>
                            </li>
                            @php
                                $i=1;
                            @endphp
                            @foreach($productImages as $item)
                                <li data-target="#carousel-example-1" data-slide-to="{{$i}}">
                                    <img class="d-block w-100 img-fluid" src="{{$item->image}}" alt=""/>
                                </li>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$product->name}}</h2>
                       {!! \App\Helpers\Helper::pricesa($product->price, $product->price_sale) !!}
{{--                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>--}}
{{--                        <p>--}}
                        <h4>Mô tả ngắn:</h4>
                        {!! $product->content !!}
                        <ul>
                            <li>
                                <div class="form-group size-st">
                                    <label class="size-label">Size</label>
                                    <select id="basic" class="selectpicker show-tick form-control">
                                        <option value="0">Size</option>
                                        <option value="0">S</option>
                                        <option value="1">M</option>
                                        <option value="1">L</option>
                                        <option value="1">XL</option>
                                        <option value="1">XXL</option>
                                        <option value="1">3XL</option>
                                        <option value="1">4XL</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Số lượng</label>
                                    <input class="form-control" value="1" min="0" max="20" type="number">
                                </div>
                            </li>
                        </ul>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="#">Mua ngay</a>
                                <a class="btn hvr-hover" data-fancybox-close="" href="#">Thêm vào giỏ hàng</a>
                            </div>
                        </div>

{{--                        <div class="add-to-btn">--}}
{{--                            <div class="add-comp">--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>--}}
{{--                            </div>--}}
{{--                            <div class="share-bar">--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>--}}
{{--                                <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản phẩm khác</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">

                        @foreach($products as $item)
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img src="{{$item->thumb}}" class="img-fluid" style="max-height: 367px !important;" alt="{{$item->name}}">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a class="nav-link" href="/san-pham/{{$item->id}}-{{Str::slug($item->name,'-')}}.html" data-toggle="tooltip" data-placement="right" title="Xem chi tiết"><i
                                                            class="fas fa-eye"></i></a></li>
                                            </ul>
                                            <a class="cart" href="#">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>
                                            <a class="nav-link" href="/san-pham/{{$item->id}}-{{Str::slug($item->name,'-')}}.html">
                                                {{$item->name}}
                                            </a>
                                        </h4>
                                        {!! \App\Helpers\Helper::pricesa($item->price, $item->price_sale) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
