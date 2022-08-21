@extends('admin.layouts.main')
@section('title')
    <title>Cập nhật tin tức | {{ $post->name }}</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/addbanner.css">
    <style>
        .error {
            color: rgb(245, 61, 61);
            font-size: 13px;
        }
    </style>
@endsection
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h5>Thêm post</h5>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block">
                <form method="POST" enctype="multipart/form-data" class="row" id="fom-create-post">
                    @csrf
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" style="height: 38px;">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Hình ảnh</label>
                        <input type="file" name="images" value="{{ old('images', $post->images) }}" class="form-control">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Danh mục bài viết</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id', $post->category_id)) selected="selected" @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Áp dụng cho chi nhánh</label>
                        <select class="form-control" name="branch_id" id="">
                            <option value="">-- Tất cả --</option>
                            @foreach($branchs as $branch)
                                <option value="{{ $branch->id }}" @if(old('branch_id', $post->branch_id)) selected="selected" @endif>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label>Nội dung</label>
                        <textarea id="mytextarea" name="content">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="form-group col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary waves-effect">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
<script src="https://cdn.tiny.cloud/1/{{env('TINYMCE_KEY')}}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
        placeholder: 'Nhập nội dung ...'
      });

      const objData = {
        rules: {
            title: {
                required: true,
                maxlength: 255
            },
            category_id: "required"
        },
        messages: {
            title: {
                required: `<span class="text-validate">Vui lòng nhập tiêu đề !</span>`,
                maxlength: `<span class="text-validate">Tiêu đề không quá 255 ký tự !</span>`
            },
            regulation: `<span class="text-validate">Vui lòng chọn loại đơn !</span>`,
        }
    }
    validateForm("#fom-create-post", objData);
</script>
@endsection
