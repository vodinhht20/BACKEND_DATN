<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
                <div class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control" placeholder="Enter Keyword">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('home.index')}}">
                <img class="img-fluid" src="{{asset('frontend')}}/image/logo-3.png" alt="Theme-Logo" width="100"/>
            </a>
            <a class="mobile-options waves-effect waves-light">
                <i class="ti-more"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                    </div>
                </li>
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        <div class="input-group">
                            <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                        <i class="ti-fullscreen"></i>
                    </a>
                </li>
                <li class="header-notification" id="box-notify-header">
                    <a href="#!" class="waves-effect waves-light">
                        <i class="ti-bell"></i>
                        <span class="badge bg-c-red" :class="{ inactive: hd_notifications.filter(record => record.watched == 0).length == 0 }"></span>
                    </a>
                    <ul class="show-notification">
                        <li>
                            <h6>Thông báo</h6>
                            <div class="text-primary" id="check-view-noti" style="float: right" @click="handleWatchedNoti('viewed_all')" title="Đánh dấu tất cả đã đọc">
                                <i class="ti-check"></i>
                                <i class="ti-check" style="margin-left: -5px;"></i>
                            </div>
                        </li>
                        <li class="waves-effect waves-light box-content">
                            <div class="media noti-item" v-if="hd_notifications.length > 0" :class="{ active: !notify.watched}" v-for="notify in hd_notifications" @click="handleWatchedNoti(notify.id, notify)">
                                <div class="media-body">
                                    <h5 class="notification-user">@{{ notify.title }} <span v-if="notify.watched" style="font-weight: 400 !important; font-size: 12px !important;">( Đã xem )</span></h5>
                                    <p class="notification-msg">@{{ notify.content }}</p>
                                    <span class="notification-time">@{{ notify.created_at }}</span>
                                </div>
                            </div>
                            <p class="noti-item" style="padding: 0 10px;" v-if="hd_notifications.length == 0">Hiện không có thông báo nào !</p>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav-right">
                    @hasanyrole("admin")
                        <li>
                            <form role="search" action="{{ route('login-as-employee') }}" class="app-search m-r-10" target="_blank" id="form-login-member" method="POST">
                                @csrf
                                <div style="display: inline-block;">
                                    <select id="" class="form-control" name="login_key" style="
                                        height: 32px !important;
                                        padding: 0 5px;
                                        width: 230px;
                                    ">
                                        <option value="">---  None  ---</option>
                                        @foreach ($employeeData as $employee)
                                            <option value="{{ $employee['login_key'] }}">[{{ $employee['employee_code'] }}] {{ $employee['fullname'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light" onclick="$('#form-login-member').submit()" target="blank" style="padding: 5px;">Đăng nhập</a>
                            </form>
                        </li>
                    @endhasanyrole
                    <li class="user-profile header-notification">
                        <a href="#!" class="waves-effect waves-light">
                            <img src="{{Auth::user()->getAvatar() ?? asset('frontend/image/avatar_empty.jfif')}}" class="img-radius" alt="User-Profile-Image">
                            <span>{{Auth::user()->fullname}}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            {{-- <li class="waves-effect waves-light">
                                <a href="#!">
                                    <i class="ti-settings"></i> Settings
                                </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="">
                                    <i class="ti-user"></i> Profile
                                </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="">
                                    <i class="ti-email"></i> My Messages
                                </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="">
                                    <i class="ti-lock"></i> Lock Screen
                                </a>
                            </li> --}}
                            <li class="waves-effect waves-light">
                                <a href="{{route('logout')}}">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
</nav>