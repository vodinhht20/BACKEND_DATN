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
                    </td>
                    <td>{{ $employee->phone ?: "Chưa có" }}</td>
                    <td>{{ $employee->birth_day ?: "Chưa có" }}</td>
                    <td>
                        <button class="btn btn-primary btn-round waves-effect waves-light unlock-user" data-id="{{ $employee->id }}"><i class="ti-key"></i> Bỏ chặn</button>
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