
@extends('admin.main')
@section('content')
    <div class="card card-primary">
        <!-- form start -->
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Tên sản phẩm</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Danh mục</label>
                        <select class="form-control" name ="menu_id">
                            <option value="0">Thư mục cha</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}" {{$product->menu_id==$menu->id?'selected':''}}>
                                  {{$menu->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Giá gốc</label>
                            <input type="number" name="price" value="{{$product->price}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Giá giảm </label>
                            <input type="number" name="price_sale" value="{{$product->price_sale}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div  class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Size</label>
                            <input type="text" name="size" value="{{$product->size}}" class="form-control" placeholder="Nhập size">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Color</label>
                            <input type="text" name="color" value="{{$product->color}}" class="form-control" placeholder="Nhập màu sắc">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label >Mô tả chung</label>
                    <textarea name="description" class="form-control"> {{$product->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="content" id="content" class="form-control">{{$product->content}}</textarea>
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input type="file" name="file" class="form-control" id = "upload">
                    <div id = "image_show">
                        <a href="{{$product->thumb}}" target="_blank">
                            <img src="{{$product->thumb}}" width="100px">
                        </a>
                    </div>
                    <input type="hidden" name = "thumb" value="{{$product->thumb}}" id="thumb">
                </div>

                <div class="form-group">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                            {{$product->active == 1? 'checked =""':''}}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                            {{$product->active == 0? ' checked ="" ':' '}}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            </div>

            @csrf
        </form>

    </div>
@endsection

