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
                    </td>
                    <td>{{ $user->phone ?: "Chưa có" }}</td>
                    <td>{{ $user->birth_day ?: "Chưa có" }}</td>
                    <td> <p class="ellipsis">{{ $user->address ?: "Chưa có" }}</p></td>
                    <td>
                        <button class="btn btn-primary btn-round waves-effect waves-light unlock-user" data-id="{{ $user->id }}"><i class="ti-key"></i> Bỏ chặn</button>
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