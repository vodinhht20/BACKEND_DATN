<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th class="text-center">Thành viên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birth day</th>
                <th>Address</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td class="text-center">
                        <img src="{{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list">
                        <p class="text-fullname">{{ $user->name }}</p>
                    </td>
                    <td>
                        <p class="ellipsis" width="200">{{ $user->email }}</p>
                        @if ($user->email_verified_at)
                            <label for="" class="label label-success">Đã xác thực email</label>
                        @else
                            <label for="" class="label label-default">Chưa xác thực email</label>
                        @endif
                    </td>
                    <td>{{ $user->phone ?: "Chưa có" }}</td>
                    <td>{{ $user->birth_day ?: "Chưa có" }}</td>
                    <td> <p class="ellipsis">{{ $user->address ?: "Chưa có" }}</p></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (!$user->email_verified_at)
                                    <a class="dropdown-item confirm-email" data-id="{{ $user->id }}" data-email="{{ $user->email }}">Xác thực email</a>
                                @endif
                                <a class="dropdown-item change-pass" data-id="{{ $user->id }}" data-name="{{ $user->name }}">Thay đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{ route('show-form-update-user', ['id' => $user->id]) }}">Chỉnh sửa thông tin</a>
                                @if ($user->id != Auth::user()->id)
                                    <a class="dropdown-item btn-block-user" data-id="{{ $user->id }}">Đưa vào danh sách chặn</a>
                                    <a class="dropdown-item btn-remove-user" data-id="{{ $user->id }}">Xóa bỏ</a>
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
    {{ $users->links() }}
</div>
<div class="overlay-load">
    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
</div>