@extends('main')

@section('content')
    <form class="bg0 p-t-130 p-b-85" method="post">
        @include('admin.alert')


        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Giỏ hàng</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->
    @if (count($products) != 0)
        <!-- Start Cart  -->
            <div class="cart-box-main">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-main table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($products as $key => $product)
                                        @php
                                            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                            $priceEnd = $price * $carts[$product->id];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid" src="{{ $product->thumb }}" alt="IMG"/>
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="#">
                                                    {{ $product->name }}
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p>{{ number_format($price, 0, '', '.') }}</p>
                                            </td>

                                            <td class="quantity-box">
                                                <input type="number" name="num_product[{{ $product->id }}]" size="4"
                                                       value="{{ $carts[$product->id] }}" min="0" step="1"
                                                       class="c-input-text qty text">
                                            </td>
                                            <td class="total-pr">
                                                <p>{{ number_format($priceEnd, 0, '', '.') }}</p>
                                            </td>
                                            <td class="remove-pr">
                                                <a href="#">
                                                    <a href="/carts/delete/{{ $product->id }}"><i
                                                            class="fas fa-times"></i></a>

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-lg-6 col-sm-6">

                        </div>
                        <div class="col-lg-6 col-sm-6">

                            <div class="update-box">
                                <input type="submit" value="Cập nhật" formaction="/update-cart"
                                >
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-lg-8 col-sm-12"></div>
                        <div class="col-lg-4 col-sm-12">

                                <div class="mb-3">
                                    <label for="firstName">Họ tên *</label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="" required="">
                                    <div class="invalid-feedback"> Nhập tên</div>
                                </div>
                                <div class="mb-3">
                                    <label for="username">Số điện thoại *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" placeholder=""
                                               required="">
                                        <div class="invalid-feedback" style="width: 100%;"> Nhập sđt
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" placeholder="">
                                    <div class="invalid-feedback"> Nhập email
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Địa chỉ *</label>
                                    <input type="text" class="form-control" name="address" placeholder="" required="">
                                    <div class="invalid-feedback"> Nhập địa chỉ.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="address2">Ghi chú *</label>
                                    <textarea type="text" class="form-control" name="content">
                                    </textarea>
                                </div>
                                <hr class="mb-1">

                        </div>
                        <div class="col-12 d-flex shopping-box"><button href="#" class="ml-auto btn hvr-hover">Đặt hàng</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Cart -->
    </form>
    @else
        <div class="text-center mt-4" style="height: 200px;"><h2>Giỏ hàng trống</h2></div>
    @endif
@endsection
