@extends('admin.main')

@section('head')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        <div>
            @include('admin.alert')
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label for="menu">Tên Danh Mục</label>
                        <input type="text" name="name" value="{{ $menu->name }}" class="form-control"
                               placeholder="Nhập tên danh mục">
                    </div>

                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="parent_id">
                            <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}> Danh Mục Cha</option>

                            {!! \App\Helpers\Helper::getParent_edit($menus,$menu->parent_id ) !!}
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mô Tả </label>
                        <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Mô Tả Chi Tiết</label>
                        <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active"
                                   name="active" {{ $menu->active == 1 ? 'checked=""' : '' }}>
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active"
                                   name="active" {{ $menu->active == 0 ? 'checked=""' : '' }}>
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
