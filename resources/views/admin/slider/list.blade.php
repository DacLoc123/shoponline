@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        <div>
            @include('admin.alert')
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tiêu đề</th>
                    <th>Link</th>
                    <th>Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Cập nhập</th>
                    <th style="width: 130px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $key =>$slider)
                    <tr>
                        <td>{{$slider->id}}</td>
                        <td>{{$slider->name}}</td>
                        <td style="width: 200px;">{{$slider->link}}</td>
                        <td><a href="{{$slider->thumb}}" target="_blank">
                                <img src="{{$slider->thumb}}" height="40px">
                            </a></td>
                        <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                        <td>{{$slider->updated_at}}</td>
                        <td><a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                               onclick="removeRow({{$slider->id}},'/admin/sliders/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--            @if($sliders->total()!=0)--}}
            {{--                <div class="col-md-12 mt-4">--}}
            {{--                    <ul class="pagination">--}}
            {{--                        <li class="paginate_button page-item {{($sliders->currentPage() == 1) ? ' disabled' : '' }}">--}}
            {{--                            <a class="page-link" href="{{ $sliders->url(1) }}">Previous</a>--}}
            {{--                        </li>--}}
            {{--                        @for ($i = 1; $i <= $sliders->lastPage(); $i++)--}}
            {{--                            <li class="paginate_button page-item {{($sliders->currentPage() == $i) ? ' active' : '' }}">--}}
            {{--                                <a class="page-link" href="{{ $sliders->url($i) }}">{{ $i }}</a>--}}
            {{--                            </li>--}}
            {{--                        @endfor--}}
            {{--                        <li class="paginate_button page-item {{ ($sliders->currentPage() == $sliders->lastPage()) ? ' disabled' : '' }}">--}}
            {{--                            <a class="page-link"--}}
            {{--                               href="{{ $sliders->url($sliders->currentPage()+1) }}">Next</a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            @else--}}
        </div>
    </div>
@endsection

