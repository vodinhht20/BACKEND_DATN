@extends('admin.layouts.main')
@section('title')
    <title>Setting Post</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/addbanner.css">
@endsection
@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h5>Thêm post</h5>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block">
                <form method="POST" enctype="multipart/form-data" class="row">
                    @csrf
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" class="form-control" style="height: 38px;">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Hình ảnh</label>
                        <input type="file" name="images" class="form-control">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Danh mục bài viết</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label>Áp dụng cho chi nhánh</label>
                        <select class="form-control" name="branch_id" id="">
                            @foreach($branchs as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12">
                        <label>Nội dung</label>
                        <textarea id="mytextarea" name="content">Hello, World!</textarea>
                    </div>
                    <div class="form-group col-lg-12 text-center">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Thêm post</button>
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
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
</script>
@endsection
