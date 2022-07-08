@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <style>
        .v-treeview-node__label {
            flex: unset !important;
        }

        .btn-icon-remove {
            color: #f35f5f;
            background-color: #f3707024;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-icon-remove:hover {
            box-shadow: 0px 1px 3px #ff0000ad;
        }

        .btn-create-custom {
            background-color: orange;
            padding: 4px 20px;
            color: #fff;
            border-radius: 5px;
            transition: 0.2;
            outline: none;
        }

        .btn-icon-edit {
            color: #4494eb !important;
            padding: 5px;
            border-radius: 50%;
            transition: 0.2;
            cursor: pointer;
        }
        .btn-create-custom:hover, .btn-icon-edit {
            opacity: 0.8;
        }
    </style>
@endsection
@section('header-page')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Quản lý công ty</h5>
                        <p class="m-b-0">Quản lý công ty của bạn</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Công ty</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="structure" id="app">
        <div class="card">
            <div class="card-header" style="box-shadow: unset;">
                <h5>Sơ đồ cấu trúc phòng ban</h5>
                <p>Cấu trúc được phân cấp theo phòng ban và theo từng vị trí</p>
            </div>
            <div class="card-block" style="padding-top: 0;">
                <div class="row align-items-center">
                    <h5 class="col-8">Cấu trúc vị trí phòng ban: </h5>
                    <div class="col-4">
                        <button @click="handleCreate()" class="btn btn-outline-primary btn-round waves-effect btn-sm waves-light" style="float: right;">
                            <i class="ti-plus" style="color: unset;"></i> Thêm mới
                        </button>
                    </div>
                </div>
                <div class="ml-3 mr-3">
                    <v-treeview
                        activatable
                        rounded
                        hoverable
                        open-all
                        :items="departments"
                    >
                        <template v-slot:prepend="{ item, open }">
                            <v-icon v-if="item.positions">mdi-home-assistant</v-icon>
                            <v-icon v-else>mdi-sofa-single</v-icon>
                        </template>
                        <template v-slot:append="{ item, open }">
                            <div v-if="item.positions" class="btn-icon-edit" title="Chỉnh sủa phòng ban" @click="handleEdit(item)">
                                <v-icon style="color: #4494eb;">mdi-circle-edit-outline</v-icon>
                                Chỉnh sửa
                            </div>
                        </template>
                    </v-treeview>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-update-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin phòng ban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body overflow-modal scrollbar-right-custom">
                        <form action="" method="post" id="form_create_schedule">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tên phòng ban <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="dataModal.name" placeholder="Nhâp tên phòng ban ...">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Vị trí công việc <span class="text-danger">*</span></label>
                                <div class="mt-2 row align-items-center" v-for="(position, index) in dataModal.positions">
                                    <div class="col-1">#@{{ index+1 }}</div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" v-model="position.name"  placeholder="Nhâp tên vị trí ...">
                                    </div>
                                    <div class="col-1" style="padding: 0;" v-if="position.isNew">
                                        <i class="ti-close btn-icon-remove" @click="handleRemovePosition(index)"></i>
                                    </div>
                                </div>
                                <div class="ml-3 mt-2">
                                    <button type="button" class="btn-create-custom" style="margin-left: 30px;" @click="handleAddPosition()">Thêm vị trí</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                            <button type="button" style="color: #fff;" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy bỏ</button>
                            <button type="submit" style="color: #fff;" class="btn btn-primary btn-sm ml-2" @click="handleSubmitUpdateDepart()">Lưu lại</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-create-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tạo mới phòng ban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body overflow-modal scrollbar-right-custom">
                        <form action="" method="post" id="form_create_schedule">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tên phòng ban <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="dataModal.name" placeholder="Nhâp tên phòng ban ...">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Lựa chọn phòng ban cha</label>
                                <select name="parent_id" id="" class="form-control" v-model="dataModal.parent_id" >
                                    <option value="">-- Mặc định --</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Vị trí công việc <span class="text-danger">*</span></label>
                                <div class="mt-2 row align-items-center" v-for="(position, index) in dataModal.positions">
                                    <div class="col-1">#@{{ index+1 }}</div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" v-model="position.name"  placeholder="Nhâp tên vị trí ...">
                                    </div>
                                    <div class="col-1" style="padding: 0;" v-if="position.isNew">
                                        <i class="ti-close btn-icon-remove" @click="handleRemovePosition(index)"></i>
                                    </div>
                                </div>
                                <div class="ml-3 mt-2">
                                    <button type="button" class="btn-create-custom" style="margin-left: 30px;" @click="handleAddPosition()">Thêm vị trí</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                            <button type="button" style="color: #fff;" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy bỏ</button>
                            <button type="submit" style="color: #fff;" class="btn btn-primary btn-sm ml-2" @click="handleSubmitCreateDepart()">Tạo mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay-load" style="position: fixed;">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            <span>Vui lòng chờ ...</span>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script type="text/javascript">
        var app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                departments: {!! json_encode($orgDepartments) !!},
                dataModal: {name: null, positions: []},
                itemRoot: null
            },
            methods: {
                handleCreate: () => {
                    app.dataModal = {name: null, positions: [{name: ''}], parent_id: ''};
                    $('#modal-create-department').modal('show');
                },
                handleEdit: (item) => {
                    app.itemRoot = item;
                    app.dataModal = {...item};
                    $('#modal-update-department').modal('show');
                },
                handleAddPosition: () => {
                    app.dataModal.positions = [...app.dataModal.positions, {name: '', isNew: true}]
                },
                handleRemovePosition: (indexRemove) => {
                    app.dataModal.positions = app.dataModal.positions.filter((item, index) => index != indexRemove);
                },
                handleSubmitUpdateDepart: () => {
                    $('.overlay-load').css('display', 'flex');
                    axios.post("{{route('setting.structure.update-department')}}", app.dataModal).then(res => {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thành công',
                            `Cập nhật phòng ban thành công`,
                            'success'
                        ).then(() => {
                            $('.overlay-load').css('display', 'flex');
                            location.reload();
                        })
                    }).catch(({response}) => {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thất bại',
                            `${response.data.messages}`,
                            'error'
                        )
                    })
                },
                handleSubmitCreateDepart: () => {
                    $('.overlay-load').css('display', 'flex');
                    axios.post("{{route('setting.structure.create-department')}}", app.dataModal).then(res => {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thành công',
                            `Thêm phòng ban thành công`,
                            'success'
                        ).then(() => {
                            $('.overlay-load').css('display', 'flex');
                            location.reload();
                        })
                    }).catch(({response}) => {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thất bại',
                            `${response.data.messages}`,
                            'error'
                        )
                    })
                }
            }
        })
    </script>
@endsection