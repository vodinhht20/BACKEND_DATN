<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên</th>
                <th>Thông tin liên lạc</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">{{$employee->fullname}}</td>
                    <td>
                        <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list"> {{-- {{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }} --}}
                    </td>
                    <td>
                        <p>SĐT: {{ $employee->phone ?: "Chưa cập nhật" }}</p>
                        <p class="ellipsis" width="200">{{ $employee->email }}</p>
                        @if ($employee->email_verified_at)
                            <label for="" class="label label-success">Đã xác thực email</label>
                        @else
                            <label for="" class="label label-danger">Chưa xác thực email</label>
                        @endif

                    </td>
                    <td>
                        @if ($employee->status == 1)
                        <label class="label label-success">{{ getStatusName($employee->status)}}</label>
                        @elseif($employee->status == 1)
                        <label class="label label-warning">{{ getStatusName($employee->status)}}</label>
                        @else
                        <label class="label label-danger">{{ getStatusName($employee->status)}}</label>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (!$employee->email_verified_at)
                                    <a class="dropdown-item confirm-email" data-id="{{ $employee->id }}" data-email="{{ $employee->email }}">Xác thực email</a>
                                @endif
                                <a class="dropdown-item change-pass" data-id="{{ $employee->id }}" data-name="{{ $employee->fullname }}">Thay đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{ route('show-form-update-user', ['id' => $employee->id]) }}">Chỉnh sửa thông tin</a>
                                <a class="dropdown-item" href="{{ route('show-info-user', ['id' => $employee->id]) }}">Xem chi tiết</a>
                                @if ($employee->id != Auth::user()->id)
                                    <a class="dropdown-item btn-block-user" data-id="{{ $employee->id }}">Đưa vào danh sách chặn</a>
                                    <a class="dropdown-item btn-remove-user" data-id="{{ $employee->id }}">Xóa bỏ</a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="paginate row justify-content-center" id="paginate-link">
    <nav>
        <ul class="pagination">
            <li  class="page-item" id="pre" onclick="filter({{$employees->currentPage()}}-1)">
                <span class="page-link" rel="prev" aria-label="pagination.previous">‹</span>
            </li>
            @for ($i = 1; $i <= $pages; $i++)
                <li class="page-item" id="page{{$i}}" onclick="filter({{$i}})">
                    <span class="page-link">{{$i}}</span>
                </li>
            @endfor
            <li  class="page-item" id="next" onclick="filter({{$employees->currentPage()}}+1)">
                <span class="page-link" rel="next" aria-label="pagination.next">›</span>
            </li>
        </ul>
    </nav>
   
</div>
<div class="overlay-load">
    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
</div>

<script>
    $( document ).ready(function() {
        $('#page'+"{{$employees->currentPage()}}").addClass('active')
        if("{{$employees->currentPage()}}" == 1){
            $('#pre').addClass('disabled')
        }
        if("{{$employees->currentPage()}}" == "{{$pages}}"){
            $('#next').addClass('disabled')
        }
        if("{{$pages}}" == 1){
            $('#paginate-link').hide()
        }
    });

    $('.btn-block-user').on('click', function (e) {
            Swal.fire({
                    title: 'Xác nhận !',
                    text: "Bạn có muốn đưa chặn nhân viên này không ?",
                    icon: 'warning',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let option = {
                            _token: '{{ csrf_token() }}',
                            id: $(this).attr("data-id")
                        }
                        $('.overlay-load').css('display', 'flex');
                        axios.post("{{route('ajax-block-user')}}", option)
                            .then(({data}) => {
                                $('#data-table').html(data.data);
                                callApi();
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Nhân viên này đã được thêm vào danh sách chặn',
                                    'success'
                                )
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
        });

        $('.confirm-email').on('click', function (e) {
            Swal.fire({
                    title: 'Xác thực email ?',
                    html: "Xác thực <b style='color: #5fc0fc;'>"+ $(this).attr('data-email') +"</b>",
                    icon: 'question',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác thực'
                })
                .then(async (result) => {
                    if (result.isConfirmed) {
                        let option = {
                            _token: '{{ csrf_token() }}',
                            id: $(this).attr("data-id"),
                            params: window.location.search
                        }
                        $('.overlay-load').css('display', 'flex');
                        const response = await axios.post("{{route('ajax-user-confirm-email')}}", option)
                        if (response.status == 200) {
                            $('#data-table').html(response.data.data);
                            await callApi();
                            $('.overlay-load').css('display', 'none');
                            Swal.fire(
                                'Thành công',
                                'Tài khoản đã được xác thực',
                                'success'
                            )
                        }
                    }
                })
        });
</script>