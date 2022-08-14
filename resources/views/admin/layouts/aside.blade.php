<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ Auth::user()->getAvatar() ?? asset('frontend/image/avatar_empty.jfif') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ Auth::user()->fullname }}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="{{ route('logout')}} "><i
                                class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                        Friend</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Quản trị</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a href=" {{route('dashboard')}} " class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        @hasanyrole("admin|human_resource")
            <div class="pcoded-navigation-label" data-i18n="nav.category.other">Bảng công</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::routeIs('timesheet') ? 'active' : '' }}">
                    <a href="{{ route("timesheet") }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-book"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Bảng công</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        @endhasanyrole

        @hasanyrole("admin|human_resource")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Lịch</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ Request::routeIs('schedule-*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.main">Cài đặt lịch</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::routeIs('schedule-calender-index') ? 'active' : '' }}">
                            <a href=" {{route('schedule-calender-index')}} " class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-calendar"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Lịch làm việc</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('schedule-calendar-holiday') ? 'active' : '' }}">
                            <a href=" {{route('schedule-calendar-holiday')}} " class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-calendar"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Lịch nghỉ lễ</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endhasanyrole

        @hasanyrole("admin|human_resource|leader")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Đơn từ</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ Request::routeIs('application-*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-files"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.main">Đơn từ</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::routeIs('application-view') ? 'active' : '' }}">
                            <a href=" {{route('application-view')}} " class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-calendar"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Phê duyệt đơn</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        @role("admin")
                            <li class="{{
                                Request::routeIs('application-nest-view') ||  Request::routeIs('application-nest-create')
                                ? 'active' : ''
                            }}">
                            <a href=" {{route('application-nest-view')}} " class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-calendar"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Thiết lập đơn</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        @endrole
                    </ul>
                </li>
            </ul>
        @endhasanyrole

        @role("admin")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Chấm Công</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::routeIs('checkin.*') ? 'active' : '' }}">
                    <a href="{{ route("checkin.view") }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-agenda"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cài đặt chấm công</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        @endrole

        @hasanyrole("admin|human_resource")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Thành viên</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-user"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.main">Quản trị Thành viên</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::routeIs('admin-list-user') ? 'active' : '' }}">
                            <a href="{{ route('admin-list-user') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-user"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Danh sách thành viên</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        @role("admin")
                            <li class="{{ Request::routeIs('admin-role.index') ? 'active' : '' }}">
                                <a href="{{ route('admin-role.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-bolt-alt"></i></span>
                                    <span class="pcoded-mtext"
                                        data-i18n="nav.basic-components.breadcrumbs">Phân quyền</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li class="{{ Request::routeIs('user-black-list') ? 'active' : '' }}">
                                <a href="{{ route('user-black-list') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="ti-zip"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Danh Sách Chặn</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </li>
            </ul>
        @endhasanyrole

        @hasanyrole("admin|human_resource")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Tin tức</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-announcement"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.main">Quản trị tin tức </span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::routeIs('post.add') ? 'active' : '' }}">
                            <a href="{{ route('post.add') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-user"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Đăng tin</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('post.info') ? 'active' : '' }}">
                            <a href="{{ route('post.info') }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-user"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.basic-components.alert">Danh sách bài viết</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('setting.banner.*') ? 'active' : '' }}">
                            <a href="{{ route("setting.banner.info") }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-agenda"></i><b>FC</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Quản lý banner</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endhasanyrole

        @role("admin")
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Cài đặt chung</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ Request::routeIs('setting.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-agenda"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.main">Cài đặt chung</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::routeIs('setting.company.*') ? 'active' : '' }}">
                            <a href="{{ route("setting.company.info") }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-agenda"></i><b>FC</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Thông tin công ty</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('setting.branch.*') ? 'active' : '' }}">
                            <a href="{{ route("setting.branch.list") }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-agenda"></i><b>FC</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Hệ thống chi nhánh</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('setting.structure.*') ? 'active' : '' }}">
                            <a href="{{ route("setting.structure.show") }}" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-agenda"></i><b>FC</b></span>
                                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Cơ cấu tổ chức</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        @endrole
    </div>
</nav>