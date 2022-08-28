@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Danh sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.min.css">
    <style>
        .vue-treeselect__value-container {
            height: 36px;
        }
        .vue-treeselect__placeholder {
            line-height: 40px;
        }
        .vue-treeselect__control {
            border-radius: 2px;
            border: 1px solid #cccccc !important;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị nhân sự</h5>
                    <p class="m-b-0">Danh sách tất cả nhân sự</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Nhân sự</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="card app_vue">
        <div class="card-header" style="box-shadow: none;">
            <h5 style="font-size: 17px;">Danh sách nhân sự</h5>
            <a href="{{route('user-black-list')}}" class="btn btn-outline-dark btn-round waves-effect" style="float: right; padding: 10px 15px !important;">
                <i class="ti-lock"></i>
                Danh sách chặn
            </a>
            <a href="{{route('show-form-user-create')}}" class="btn btn-outline-primary btn-round waves-effect mr-3" style="float: right; padding: 10px 15px !important;">
                <i class="ti-plus"></i>
                Thêm nhân sự
            </a>
            <a href="javascript:void(0)" class="btn btn-outline-primary btn-round waves-effect mr-3" data-toggle="modal" data-target="#modal_import" style="float: right; padding: 10px 15px !important;">
                <i class="ti-plus"></i>
                Import Excel
            </a>
        </div>
        <div class="row mb-3" style="margin: unset;">
            <div class="form-group col-md-3 col-sx-6 col-lg-3">
                <label for="">Từ khóa: </label>
                <input class="form-control action_filter" type="text" name="keyword" placeholder="Tìm kiếm bằng tên, email,..." data-filter="keyword">
            </div>
            <div class="form-group col-md-3 col-sx-6 col-lg-3">
                <label for="">Trạng thái nhân sự: </label>
                <select name="status" class="form-control action_filter" data-filter="status">
                    <option value="">-- Tất cả --</option>
                    <option value="1">Đang hoạt động</option>
                    <option value="2">Chưa kích hoạt</option>
                    <option value="3">Bị chặn</option>
                </select>
            </div>
            <div class="form-group col-md-3 col-sx-6 col-lg-3">
                <label for="">Vị trí phòng ban: </label>
                <input type="hidden" name="departments" :value="departmentValue">
                <treeselect v-model="departmentValue" :multiple="true" :options="departments" @input="changePosition()" :disable-branch-nodes="true"/>
            </div>
            <div class="form-group col-md-3 col-sx-6 col-lg-3">
                <label for="">Chi nhánh: </label>
                <select name="branch_id" class="form-control action_filter" data-filter="branch_id">
                    <option value="">-- Tất cả --</option>
                    @foreach ($branchs as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @include('admin.layouts.messages')
        <div class="card-block table-border-style" id="data-table">
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
                        <tr v-for="(employee, index) in employees.data">
                            <td class="text-center">@{{ index + 1 }}</td>
                            <td class="text-center">
                                <img :src="employee.avatar" alt="" class="avatar_list">
                                <br>
                                @{{employee.fullname}}
                                <br>
                                <label class="label label-danger" v-if="employee.status == {{ config('employee.status.retired') }}">@{{ employee.status_str }}</label>
                                <label class="label label-success" v-else>@{{ employee.status_str }}</label>
                            </td>
                            <td class="text-center">
                                <label for="" class="badge badge-primary">@{{ employee?.position?.name || "N/A" }}</label>
                                <hr>
                                <label for="" class="badge badge-info">@{{ employee?.position?.department?.name || "N/A" }}</label>
                            </td>
                            <td class="text-center">
                                <p>SĐT: @{{ employee.phone || "Chưa cập nhật" }}</p>
                                <p>@{{ employee.email }}</p>
                            </td>
                            <td class="text-center ellipsis">
                                @{{ employee?.address || "Chưa thiết lập địa chỉ !" }}
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" :href="getLinkDetail(employee.id)">Xem chi tiết</a>
                                        <a class="dropdown-item change-pass" @click="changePass(employee.id, employee.fullname)">Thay đổi mật khẩu</a>
                                        <a class="dropdown-item change-pass" @click="changeStatus(employee)">Thay đổi trạng thái</a>
                                        <a class="dropdown-item change-pass" @click="blockEmployee(employee.id)">Chặn thành viên</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
            <div style="float: right;" class=""  v-if="employees.total > 0">
                <template>
                    <paginate
                        :page-count="employees.last_page"
                        v-model="employees.current_page"
                        :initial-page="employees.current_page"
                        :click-handler="changePage"
                        :prev-text="'‹'"
                        :next-text="'›'"
                        :page-link-class="'page-link'"
                        :container-class="'pagination'"
                        :page-class="'page-item'"
                        :prev-link-class="'page-link'"
                        :next-link-class="'page-link'"
                        :prev-class="'page-item'"
                        :next-class="'page-item'"
                    >
                    </paginate>
                </template>
            </div>
            <div class="overlay-load">
                <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import dữ liệu nhân viên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body overflow-modal scrollbar-right-custom row">
                            <div class="form-group col-lg-12">
                                <label for="recipient-name" class="col-form-label">Chọn file <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" accept=".xlsx, .xlsm, .xls, .xltx" id="inpFile">
                            </div>
                            <div class="col-12">
                                <p> Thêm nhiều nhân viên bằng cách import thông tin từ file Excel. Lưu ý mọi thông tin phải hợp lệ như file mẫu.
                                <br><a href="/template/template_import_employee.xlsx" class="text-primary">Download file mẫu</a></p>
                            </div>
                        </div>
                        <div class="modal-footer" style="display: block;">
                            <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_preview_import" @click="handleImport()">Xác nhận</button>
                                <button type="button" class="btn btn-secondary btn-sm ml-2" data-dismiss="modal">Hủy bỏ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay-load-employee">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
        </div>
    </div>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.umd.min.js"></script>
<script src="{{ asset('frontend/js/vue-paginate.js') }}"></script>
<script>
    Vue.component('treeselect', VueTreeselect.Treeselect);
    Vue.component('paginate', VuejsPaginate)
    Vue.config.devtools = true
    var app = new Vue({
        el: '.app_vue',
        data: {
            departmentValue: {!! json_encode($requestDepartments) !!},
            departments: {!! json_encode($departments) !!},
            employees: {!! json_encode($employees) !!}
        },
        methods: {
            changePosition: () => {
                var urlParam = new URL(window.location);
                urlParam.searchParams.set('departments', app.departmentValue);
                window.history.pushState({}, '', urlParam);
                app.getData();
            },
            changePage: (page) => {
                // change param url
                var urlParam = new URL(window.location);
                urlParam.searchParams.set('page', page);
                window.history.pushState({}, '', urlParam);
                app.getData();
            },
            getData: () => {
                // call api
                $('.overlay-load').css('display', 'flex');
                let params = location.search;
                axios.get(`{{ route('ajax-get-employee') }}${params}`).then(({ data }) => {
                    app.employees = data.data;
                    $('.overlay-load').css('display', 'none');
                })
            },
            changePass: async (id, fullname) => {
                const { value: password } = await Swal.fire({
                    title: '<h3 style="margin-top: 10px;">Thay đổi mật khẩu</h3>',
                    html:
                        `
                        <div style="width: 90%;">
                            <p>Thay đổi mật khẩu user <b>${fullname}</b></p>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>` +
                            `<div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="Re password">
                                </div>
                            </div>` +
                            `<p class="text-validate"></p>
                        </div>`
                        ,
                    focusConfirm: false,
                    confirmButtonText: "Thay đổi",
                    showCancelButton: true,
                    preConfirm: () => {
                        let password = $('#password').val();
                        let rePassword = $('#rePassword').val();
                        if (password != rePassword) {
                            Swal.fire({
                                title: "Thất bại",
                                icon: 'error',
                                title: 'Mật khẩu không trùng khớp'
                            })
                            return false
                        }
                        if (password.trim() == "") {
                            Swal.fire({
                                title: "Thất bại",
                                icon: 'error',
                                title: 'Vui lòng nhập thông tin'
                            })
                            return false
                        }
                        return password
                    }
                })
                if (password) {
                    let option = {
                        id,
                        password
                    }
                    $('.overlay-load').css('display', 'flex');
                    const response = await axios.post("{{route('ajax-user-change-password')}}", option)
                    if (response.status == 200) {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thành công',
                            'Mật khẩu đã được thay đổi',
                            'success'
                        )
                    }
                }
            },
            blockEmployee: (employee_id) => {
                Swal.fire({
                    title: 'Hành động nguy hiểm !!',
                    text: "Bạn có muốn chặn thành viên này không.",
                    icon: 'warning',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $('.overlay-load').css('display', 'flex');
                        let params = location.search;
                        axios.post("{{route('ajax-block-employee')}}" + params, { employee_id })
                            .then(({data}) => {
                                app.employees = data.data;
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Thành viên này sẽ không có quyền truy cập vào hệ thống',
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
            },
            changeStatus: async (employee) => {
                const { value } = await Swal.fire({
                    title: '<h3 style="margin-top: 10px;">Thay đổi trạng thái</h3>',
                    html: `
                        <div class="row" style="width: 90%; margin: 0 auto !important; text-align: start;">
                            <div class="col-sm-12 form-group">
                                <label class="col-form-label">Lựa chọn trạng thái</label>
                                <select name="status" id="statusOption" class="form-control">
                                    @foreach (config('employee.status_active') as $id => $name)
                                        <option value="{{$id}}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    `,
                    focusConfirm: false,
                    confirmButtonText: "Thay đổi",
                    showCancelButton: true,
                    preConfirm: () => {
                        let status = $('#statusOption').val();
                        return status;
                    },
                    didOpen: () => {
                        $("#statusOption").val(employee.status).change();
                    }
                })
                if (value) {
                    let option = {
                        employee_id: employee.id,
                        status: value
                    }
                    $('.overlay-load').css('display', 'flex');
                    const response = axios.post("{{route('ajax-change-status-employee')}}", option)
                    .then(({ data }) => {
                        let dataFormat = data.data;
                        $('.overlay-load').css('display', 'none');
                        console.log("data", dataFormat);
                        Swal.fire(
                            'Thành công',
                            'Trạng thái đã được thay đổi',
                            'success'
                        );
                        app.employees.data = app.employees.data.map((item) => {
                            if (item.id == dataFormat.id) {
                                item.status = dataFormat.status;
                                item.status_str = dataFormat.status_str;
                            }
                            return item;
                        });
                    })
                    .catch((error) => {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thất bại',
                            error?.response?.data?.message || 'Đã có lỗi xảy ra',
                            'error'
                        )
                    })
                }
            },
            getLinkDetail: (employeeId) => {
                let linkRoot = `{{ route('show-info-user', ['id' => '????']) }}`
                return linkRoot.replace("????", employeeId);
            },
            handleImport: () => {
                $('.overlay-load-employee').css('display', 'flex');
                var data = new FormData();
                data.append('file', document.getElementById('inpFile').files[0]);
                data.append('date', app.inputMounthImport);
                data.append('file', app.formFileImport);
                axios.post("{{route('ajax-import-employee')}}", data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(({data}) => {
                    $('.overlay-load-employee').css('display', 'none');
                    Swal.fire(
                        'Thành công',
                        'Import dữ liệu thành công',
                        'success'
                    ).then(() => {
                        $('.overlay-load-employee').css('display', 'flex');
                        location.reload();
                    });
                })
                .catch(error => {
                    $('.overlay-load').css('display', 'none');
                    Swal.fire(
                        'Thất bại',
                        error.response?.data?.messages || "Đã có lỗi xảy ra",
                        'error'
                    )
                })
            }

        }
    });

    $('.action_filter').on('input', function(e){
        var keyFilter = e.target.getAttribute("data-filter");
        var urlParam = new URL(window.location);
        urlParam.searchParams.set(keyFilter, $(this).val());
        window.history.pushState({}, '', urlParam);
        app.getData();
    });
    $('.action_filter').map((index, element) => {
        let keyFilter = element.getAttribute('data-filter');
        element.value = (new URL(document.location)).searchParams.get(keyFilter) || '';
    })
</script>
@endsection
