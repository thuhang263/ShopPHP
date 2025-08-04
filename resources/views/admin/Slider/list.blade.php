@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Link</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Cập nhật</th>
            <th style="width: 100px">Sửa/Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{ $slider->name}}</td>
                <td>{{ $slider->url}}</td>
                <td><a href="{{$slider->thumb}}" target="_blank">
                        <img src="{{$slider->thumb}}" height="40px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{ $slider->update_at}}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                        <i class="far fa-edit"></i>
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

    {!! $sliders->links() !!}
@endsection

