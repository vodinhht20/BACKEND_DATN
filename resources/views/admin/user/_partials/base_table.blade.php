<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th class="text-center">Thành viên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birth day</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td class="text-center">
                        <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list">
                        <p class="text-fullname">{{ $employee->fullname }}</p>
                    </td>
                    <td>
                        <p class="ellipsis" width="200">{{ $employee->email }}</p>
                        @if ($employee->email_verified_at)
                            <label for="" class="label label-success">Đã xác thực email</label>
                        @else
                            <label for="" class="label label-default">Chưa xác thực email</label>
                        @endif
                    </td>
                    <td>{{ $employee->phone ?: "Chưa có" }}</td>
                    <td>{{ $employee->birth_day ?: "Chưa có" }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (!$employee->email_verified_at)
                                    <a class="dropdown-item confirm-email" data-id="{{ $employee->id }}" data-email="{{ $employee->email }}">Xác thực email</a>
                                @endif
                                <a class="dropdown-item change-pass" data-id="{{ $employee->id }}" data-name="{{ $employee->fullname }}">Thay đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{ route('show-form-update-user', ['id' => $employee->id]) }}">Chỉnh sửa thông tin</a>
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
<div class="paginate row justify-content-center">
    {{ $employees->links() }}
</div>
<div class="overlay-load">
    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
</div>