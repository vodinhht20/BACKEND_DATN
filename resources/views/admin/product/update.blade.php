@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | {{$product->name}}</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/datepicker.css">
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị sản phẩm</h5>
                    <p class="m-b-0">Cập nhật thông tin sản phẩm</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Sản Phẩm</a>
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
                    <h5>Cập nhật sản phẩm</h5>
                    <span>Cập nhật thông tin sản phẩm <b>{{$product->name}}</b></span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{route('post-admin-product-update',[ 'id' => $product->id ])}}" method="POST" id="form-create"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Nhập tên sản phẩm" id="name-product">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slug</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="slug"  value="{{ $product->slug }}" placeholder="Nhập slug cho sản phẩm" id="slug-product" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Đơn giá <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $product->price }}" name="price" placeholder="Nhập đơn giá">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Khuyến mãi</label>
                            <div class="col-sm-10 row">
                                <div class="form-group col-sm-4 row">
                                    <label class="col-sm-12 col-form-label">Giá trị</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" value="{{ $product->discount }}" name="discount" id="discount" placeholder="vd: 10%" max="100" min="0">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 row">
                                    <label class="col-sm-12 col-form-label">Ngày bắt đầu</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control select-date" value="{{ $product->start_discount }}" name="start_discount" id="start_discount" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="form-group col-sm-4 row">
                                    <label class="col-sm-12 col-form-label">Ngày kết thúc</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control select-date" value="{{ $product->end_discount }}" name="end_discount" id="end_discount" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hình ảnh <span class="text-danger">*</span></label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="image" onchange="loadFile(event)">
                            </div>
                            <div class="col-sm-5">
                                <img id="preview_image" src="{{asset('storage')}}/{{$product->image}} ?: {{asset('frontend/image/no_image.png')}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Loại sản phẩm <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category" id="select_category">
                                    <option value="">--- Lựa chọn loại sản phẩm ---</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if ($category->children_cate)
                                                @foreach ($category->children_cate as $children_cate)
                                                    <option value="{{$children_cate->id}}">&nbsp &nbsp {{$children_cate->name}}</option>
                                                @endforeach
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Nhập mô tả">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.tiny.cloud/1/f486sgzy6a1gmtp45aqn15arqe90oi8qz8h7swhh7sx2kzzd/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/datepicker.js "></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
    });
    $('#select_category').val('{{ $product->category_id }}');
    const start = datepicker('#start_discount', { 
        id: 1,
        overlayButton : "Lựa chọn" ,
        overlayPlaceholder : 'Nhập một năm',
        minDate: new Date(),
        formatter: (input, date, instance) => {
            const value = $.datepicker.formatDate('dd/mm/yy', new Date(date));
            input.value = value;
        }
    });
    const end = datepicker('#end_discount', { 
        id: 1,
        overlayButton : "Lựa chọn" ,
        overlayPlaceholder : 'Nhập một năm',
        minDate: new Date(),
        formatter: (input, date, instance) => {
            const value = $.datepicker.formatDate('dd/mm/yy', new Date(date));
            input.value = value;
        }
    });
    start.getRange()
    end.getRange()
    if ($('#discount').val().trim().length == 0 && $('#discount').val() == 0) {
        $(".select-date").prop('disabled', true);
        $(".select-date").prop('disabled', true);
    }
    $('#discount').on('input', function (e){
        if (e.target.value > 0) {
            $(".select-date").prop('disabled', false);
            $(".select-date").prop('disabled', false);
        } else {
            $(".select-date").prop('disabled', true);
            $(".select-date").prop('disabled', true);
        }
    })
    const objData = {
      rules: {
        name: "required",
        slug: "required",
        price: "required",
        category: "required",
        start_discount: "validDate",
        end_discount: "validDate",
      },
      messages: {
        name: `<span class="text-validate">Vui lòng nhập tên sản phẩm</span>`,
        slug: `<span class="text-validate">Vui lòng nhập slug</span>`,
        price: `<span class="text-validate">Vui lòng nhập giá tiền</span>`,
        category: `<span class="text-validate">Vui lòng chọn loại sản phẩm</span>`,
        start_discount: `<span class="text-validate">Nhập đúng định dạng ngày tháng</span>`,
        end_discount: `<span class="text-validate">Nhập đúng định dạng ngày tháng</span>`,
      }
    }
    validateForm("#form-create",objData);
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview_image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endsection
