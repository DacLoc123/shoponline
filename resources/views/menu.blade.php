@extends('main')

@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">{{$menu->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp xếp </span>
                                    <select id="basic" class="selectpicker show-tick form-control"
                                            data-placeholder="$ USD">
                                        <option data-display="Select">Không</option>
                                        <option value="0">Giá tăng</option>
                                        <option value="1">Giá giảm</option>
                                    </select>
                                </div>
                                {{--                            <p>Showing all 4 results</p>--}}
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i
                                                class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i
                                                class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                @if(count($products)!=0)
                                    <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                        <div class="row">
                                            {!! \App\Helpers\Helper::productbycate_grid($products) !!}

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="list-view">

                                            {!! \App\Helpers\Helper::productbycate_list($products) !!}

                                    </div>
                                @else
                                    <h2>Không có sản phẩm</h2>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection
