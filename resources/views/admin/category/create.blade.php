@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Thêm Mới</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị sản phẩm</h5>
                    <p class="m-b-0">Thêm các loại sản phẩm cho cửa hàng của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Loại Sản Phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm sản phẩm</h5>
                    <span>Thêm sản phẩm mới cho cửa hàng của bạn...</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{route('post-create-category')}}" method="POST" id="form-create"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên loại sản phẩm <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Nhập tên loại sản phẩm" id="name-category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Danh mục gốc </span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="parent_id">
                                    <option value="">--- Lựa chọn danh mục gốc ---</option>
                                    @foreach ($category_parents as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hình ảnh</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="image" onchange="loadFile(event)">
                            </div>
                            <div class="col-sm-5">
                                <img id="preview_image" src=""/>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>

    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview_image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
    
    const objData = {
      rules: {
        name: "required",
        slug: "required",
      },
      messages: {
        name: `<span class="text-validate">Vui lòng nhập tên loại sản phẩm</span>`,
        slug: `<span class="text-validate">Vui lòng nhập slug</span>`,
      }
    }
    validateForm("#form-create",objData);
</script>
@endsection
