@extends('admin.layouts.main')
@section('title')
    <title>Danh sách banner</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/banner.css">
@endsection

@section('content')
    <div class="banner-info">
        <div class="card">
            <div class="card-header">
                <h5>Banner</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <i class="fa fa fa-wrench open-card-option"></i>
                            <a href="{{route("setting.banner.addbanner")}}" role="tab">Thêm banner</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-block table-border-style">
                @include('admin.layouts.messages')
                <div class="table-responsive scrollbar-custom">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Trạng thái</th>
                                <th>Dealine</th>
                                <th>Người tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $banner->name }}</td>
                                    <td><img class="img-banner" src="{{ $banner->getBanner() }}" alt="{{ $banner->name }}"></td>
                                    <td>{!!  $banner->status()  !!}</td>
                                    <td>
                                        {{ $banner->from_at }} - {{$banner->to_at }}
                                    </td>
                                    <td><label for="" class="label label-inverse-primary">{{ $banner->author->fullname }}</label></td>
                                    <td class="box-actions">
                                        <div data-id="{{ $banner->id }}" class="handle-remove" style="cursor: pointer;">
                                            <i class="ti-trash icon-remove-danger"></i>
                                        </div>
                                        <a href="{{ route("setting.banner.updatebanner", $banner->id) }}">
                                            <i style="float: right" class="ti-pencil icon-edit-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $banners->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
    <script>
        $(".handle-remove").on('click', function () {
            Swal.fire({
                    title: 'Hành động nguy hiểm !',
                    text: "Bạn có chắc chắn chắn muốn xóa banner này không !",
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
                        axios.delete("{{route('setting.banner.delete')}}", { data })
                            .then(({data}) => {
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Banner này đã được xóa',
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
