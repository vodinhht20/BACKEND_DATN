@extends('admin.layouts.main')
@section('title')
    <title>Setting Company</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/banner.css?v=1.0.0">
@endsection

@section('content')
    <div class="banner-info">
        <div class="card">
            <div class="card-header">
                <h5>Blog</h5>
                <p>Danh sách bài viết</p>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <i class="fa fa fa-wrench open-card-option"></i>
                            <a href="{{route("post.add")}}" role="tab">Thêm Post</a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Image</th>
                                <th>Tin tức</th>
                                <th>Người viết</th>
                                <th>Chi nhánh áp dụng</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="ellipsis"><a href="">
                                        {{ formartString($post->title, 50) }}
                                        <br>
                                        <label for="" class="label label-inverse-primary">{{ $post->category->name ?? "N/A" }}</label>
                                    </a></td>
                                    <td><img class="img-banner" src="{{$post->getPost()}}" alt="{{ formartString($post->title, 30) }}"></td>
                                    <td class="ellipsis">
                                        <label for="" class="label label-primary" onclick="preview({{ $post->id }})" style="cursor: pointer;">Nhấn vào đây để xem</label>
                                    </td>
                                    <td> <label for="" class="label label-inverse-primary">{{$post->employee->fullname ?? "N/A"}}</label></td>
                                    <td>{{$post?->branch?->name ?: "Áp dụng cho tất cả"}}</td>
                                    <td class="box-actions">
                                        <a href="{{route("post.update", $post->id)}}">
                                            <i style="float: right" class="ti-pencil icon-edit-primary"></i>
                                        </a>
                                        <div style="cursor: pointer;" class="handle-remove" data-id="{{ $post->id }}"><i class="ti-trash icon-remove-danger"></i></div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="float: right;" class="pagination_cutomize">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-create-schedule" id="modal-preview-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xem trước bài viết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body overflow-modal scrollbar-right-custom" >
                    <iframe src="https://workcamel.tk" frameborder="0" id="content-modal" style="width: 100%; height: 400px;"></iframe>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        function preview(id) {
            let linkRoot = `{{ route('preview-post', ['id' => '????']) }}`
            let linkPreview = linkRoot.replace("????", id); ;
            $('#content-modal').attr('src', linkPreview);
            $('#modal-preview-post').modal('show');
        }

        $(".handle-remove").on('click', function () {
            Swal.fire({
                    title: 'Hành động nguy hiểm !',
                    text: "Bạn có chắc chắn chắn muốn xóa tin này không !",
                    icon: 'warning',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = {
                            id: $(this).attr("data-id")
                        }
                        $('.overlay-load').css('display', 'flex');
                        axios.delete("{{route('post.delete')}}", { data })
                            .then(({data}) => {
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Nhân viên này đã được xóa',
                                    'success'
                                ). then(() => {
                                    $('.overlay-load').css('display', 'flex');
                                    location.reload();
                                })

                            })
                            .catch((error) => {
                                    $('.overlay-load').css('display', 'none');
                                    Swal.fire(
                                    'Thất bại',
                                    error.response.data.message,
                                    'error'
                                )
                            })
                    }
                })
        })
    </script>
@endsection
