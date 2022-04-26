<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ Auth::user()->getAvatar() ?? asset('frontend/image/avatar_empty.jfif') }}"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{ Auth::user()->name }}<i class="fa fa-caret-down"></i></span>
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
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Sản phẩm</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu  {{ 
                    Request::routeIs('admin-product-list') 
                || Request::routeIs('admin-product-create')
                || Request::routeIs('admin-product-update')
                || Request::routeIs('admin-product-trash')
                || Request::routeIs('admin-list-category')
                || Request::routeIs('show-form-create-category')
                || Request::routeIs('show-form-update-category')
                    ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"
                        data-i18n="nav.basic-components.main">Quản trị sản phẩm</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ Request::routeIs('admin-product-list') ? 'active' : '' }}">
                        <a href=" {{route('admin-product-list')}} " class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"
                                data-i18n="nav.basic-components.alert">Danh sách sản phẩm</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin-product-create') ? 'active' : '' }}">
                        <a href="{{ route('admin-product-create')}} " class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"
                                data-i18n="nav.basic-components.breadcrumbs">Thêm sản phẩm</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin-list-category') ? 'active' : '' }}">
                        <a href="{{ route('admin-list-category')}} " class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"
                                data-i18n="nav.basic-components.alert">Loại sản phẩm</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin-product-trash') ? 'active' : '' }}">
                        <a href="{{ route('admin-product-trash')}} " class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext"
                                data-i18n="nav.basic-components.alert">Thùng rác</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        {{-- <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Đơn hàng</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="chart.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-package"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Đơn Hàng</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-money"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Doanh Thu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-harddrives"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Đơn Hàng Tồn</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> --}}

        <div class="pcoded-navigation-label" data-i18n="nav.category.other">Nhân viên</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ Request::routeIs('admin-list-user') ? 'active' : '' }}">
                <a href="{{ route('admin-list-user') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Nhân viên</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ Request::routeIs('admin-role.index') ? 'active' : '' }}">
                <a href="{{ route('admin-role.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bolt-alt"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Phân Quyền</span>
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
        </ul>

        {{-- <div class="pcoded-navigation-label" data-i18n="nav.category.other">Blog</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-pencil-alt"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Viết Bài</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-write"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Danh Sách Bài Viết</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul> --}}
    </div>
</nav>