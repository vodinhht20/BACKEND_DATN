@extends('admin.layouts.main')
@section('title')
    <title>Đơn từ | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị đơn từ</h5>
                    <p class="m-b-0">Danh sách tất cả các đơn từ</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Đơn từ</a>
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
                    <h5 style="font-size: 17px;">Danh sách đơn từ</h5>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="text-center">Nhân viên</th>
                                    <th class="text-center">Loại đơn</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>Trần Văn A</td>
                                        <td>{{ $ticket->type }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td class="ellipsis">{{ $ticket->content }}</td>
                                        <td>{{ $ticket->created_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Tùy chọn
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="">Duyệt đơn này</a>
                                                    <a class="dropdown-item" href="">Phủ quyết đơn này</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate row justify-content-center">
                        {{ $tickets->links() }}
                    </div>
                    <div class="overlay-load">
                        <img src="{{asset('frontend')}}/image/loading.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<!-- sweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- axios -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endsection
