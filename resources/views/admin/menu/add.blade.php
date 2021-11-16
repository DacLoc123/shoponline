@extends('admin.main')
@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        @include('admin.alert')
        <!-- form start -->
        <form action="/admin/menus/add/store" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên Danh Mục </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="menu"
                           placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label>Danh Mục </label>
                    <select class="form-control" name="parent_id">
                        <option value="0"> Danh Mục Cha</option>
                        {!! \App\Helpers\Helper::getParent($menus) !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô Tả Ngắn </label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Mô Tả Chi Tiết </label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
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
