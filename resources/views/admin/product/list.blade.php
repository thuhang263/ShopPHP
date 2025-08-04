@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá gốc</th>
            <th>Giá giảm</th>
            <th>Kích thước</th>
            <th>Màu sắc</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">Edit/Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{ $product->name}}</td>
                <td>{{ $product->menu ? $product->menu->name : 'Không' }}</td>
                <td>{{ $product->price}}</td>
                <td>{{ $product->price_sale}}</td>
                <td>{{ $product->size}}</td>
                <td>{{ $product->color}}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>

                <td>{{ $product->update_at}}</td>
                <td>&nbsp;
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$product->id}},'/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div>

@endsection

