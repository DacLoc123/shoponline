@extends('main')
@section('content')

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            @foreach($sliders as $slider)
                <li class="text-left">
                    <img src="{{$slider->thumb}}" alt="{{$slider->name}}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-white">{!!  $slider->name !!}</h3>
                                {!!  $slider->description !!}
                                <p><a class="btn hvr-hover" href="{{$slider->link}}">Mua ngay</a></p>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/template/client/images/shirt-img.jpg" alt=""/>
                        <a class="btn hvr-hover" href="#">Nam</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="/template/client/images/shirt-img.jpg" alt=""/>
                        <a class="btn hvr-hover" href="#">Nữ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="title-all text-center">--}}
{{--                        <h1>Featured Products</h1>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Tất cả</button>
                            <button data-filter=".top-featured">Sản phẩm mới</button>
                            <button data-filter=".best-seller">Sản phẩm giảm giá</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">

                @foreach($products_sale as $product)
                    <div class="col-lg-3 col-md-6 special-grid best-seller" style="max-height: 470px !important;">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Giảm giá</p>
                                </div>
                                <img src="{{$product->thumb}}" style="max-height: 340px !important;" class="img-fluid" alt="{{$product->name}}">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                    class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                                    class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                               title="Add to Wishlist"><i
                                                    class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{$product->name}}</h4>
                                <div>
                                    {!! \App\Helpers\Helper::checkprice($product->price, $product->price_sale) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

<br>

                @foreach($products_new as $product)
                        <br>
                    <div class="col-lg-3 col-md-6 special-grid top-featured" style="max-height: 470px !important;">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="sale">Mới</p>
                                </div>
                                <img src="{{$product->thumb}}" style="max-height: 340px !important;" class="img-fluid" alt="{{$product->name}}">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                    class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                                    class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                               title="Add to Wishlist"><i
                                                    class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{$product->name}}</h4>
                                <div>
                                    {!! \App\Helpers\Helper::checkprice($product->price, $product->price_sale) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Products  -->


    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-01.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-02.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-03.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-04.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-05.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-06.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-07.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-08.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-09.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="/template/client/images/instagram-img-05.jpg" alt=""/>
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
