@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        <div>
            @include('admin.alert')
        </div>

        <div class="row m-3">
            <div class="col-8"></div>
            <div class="col-4">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th>Update</th>
                    <th style="width: 130px">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="myTable">
                {!! \App\Helpers\Helper::menu($menus) !!}
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
