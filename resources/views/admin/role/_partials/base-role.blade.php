@foreach ($roles as $role)
    <div class="card">
        <div class="card-header">
            <h5 style="font-size: 17px;">Quyền <b>{{ $role->name }}</b></h5>
        </div>
        <div class="card-block scroll-overflow">
            @if (count($role->getUser) > 0)
                @foreach ($role->getUser as $user)
                    <div class="align-middle m-b-30">
                        <img src="{{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" class="img-radius img-40 align-top m-r-15">
                        <div class="d-inline-block">
                            <h6>{{ $user->name }}</h6>
                            <p class="text-muted m-b-0">{{ $user->email }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                Chưa có thành viên nào
            @endif
            <div class="overlay-load">
                <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            </div>
        </div>
    </div>
@endforeach