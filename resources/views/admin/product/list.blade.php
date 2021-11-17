@extends('admin.main')

@section('content')
    <div class="card-header bg-primary">
        <h3 class=" text-center">{{ $title }}</h3>
    </div>
    <div>
        @include('admin.alert')
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Ảnh.</th>
                <th>Active</th>
                <th>Cập nhật</th>
                <th style="width: 130px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            {!! \App\Helpers\Helper::product($products) !!}
            </tbody>
        </table>
    </div>
    <div class="pagin">
        @if($products->total()!=0)
            <div class="col-md-12 mt-4">
                <ul class="pagination">
                    <li class="paginate_button page-item {{($products->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $products->url(1) }}">Previous</a>
                    </li>
                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="paginate_button page-item {{($products->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="paginate_button page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link"
                           href="{{ $products->url($products->currentPage()+1) }}">Next</a>
                    </li>
                </ul>
            </div>
        @else
            <h4>Không có sản phẩm</h4>
        @endif
    </div>

@endsection
