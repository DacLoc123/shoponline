@extends('admin.main')

@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection


@section('content')

    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                @include('admin.alert')
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="menu">Tên Danh Mục</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}"
                                   placeholder="Tên Danh Mục">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Danh Mục</label>
                            <select class="custom-select" name="menu_id">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ $product->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Giá Gốc</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Giá Giảm</label>
                            <input type="number" name="price_sale" value="{{ $product->price_sale }}"
                                   class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Mô Tả </label>
                    <textarea name="description" class="form-control"> {{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô Tả Chi Tiết</label>
                    <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh Sản Phẩm</label>
                    <input type="file" class="form-control" id="upload">
                    <div id="image_show">
                        <a href="{{ $product->thumb }}" target="_blank"> <img src="{{ $product->thumb }}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh Chi Tiết</label>
                    <input type="file" multiple class="form-control" name="image_path[]" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                            {{ $product->active == 1 ? 'checked=""' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                            {{ $product->active == 0 ? 'checked=""' : '' }}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
