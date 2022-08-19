<div class="table-responsive" style="width: 100%;">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center" style="vertical-align: middle;">STT</th>
                <th class="text-center" style="vertical-align: middle;">Thông tin</th>
                <th class="text-center" style="vertical-align: middle;">Vị trí <hr> Phòng ban</th>
                <th class="text-center" style="vertical-align: middle;">Thông tin liên lạc</th>
                <th class="text-center" style="vertical-align: middle;">Địa chỉ</th>
                <th class="text-center" style="vertical-align: middle;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="text-center">{{ $loop->index+1 }}</td>
                    <td class="text-center">
                        <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list"> {{-- {{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }} --}}
                        <br>
                        {{$employee->fullname}}
                        <br>
                        <label class="label label-success">{{ $employee->getStatusStr()}}</label>
                    </td>
                    <td>
                        <label for="" class="badge badge-primary">{{ $employee?->position?->name ?: "N/A" }}</label>
                        <hr>
                        <label for="" class="badge badge-info">{{ $employee?->position?->department?->name ?: "N/A" }}</label>
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
                        {{ $employee->address ?: "Chưa thiết lập địa chỉ !" }}
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('show-info-user', ['id' => $employee->id]) }}">Xem chi tiết</a>
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
            @if (count($employees) == 0)
                <tr>
                    <td colspan="6" class="box_data_empty">
                        <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="paginate row justify-content-end">
    {{ $employees->appends(request()->all()) }}
</div>
<div class="overlay-load">
    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
</div>
