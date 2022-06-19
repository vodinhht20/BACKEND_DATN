@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Phân quyền</title>
@endsection
@section('style-page')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding: 0 0 0 10px !important;
            background: none !important;
        }
        .select2-container .select2-selection--single {
            height: 35.5px;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 33.5px !important;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            height: 35.5px;
            border: solid #aaaaaa 1px;
        }
        .select2-container .select2-search--inline .select2-search__field {
            margin: 0 0 0 10px !important;

        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-top: 2px !important;
            background-color: var(--ui-blue);
            border: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice span {
            color: rgb(255, 255, 255) !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border-right: #fff;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
            background-color: #ff8282 !important;
        }
        .select2-container--open {
            z-index: 99999999999999;
        }
        .scroll-overflow {
            height: 375px;
            overflow-y: scroll;
        }
        .scroll-overflow::-webkit-scrollbar {
            width: 6px;
            background-color: #fff;
        }
        .scroll-overflow::-webkit-scrollbar-thumb {
            background-color: var(--THEME-UI);
            border-radius: 5px;
        }
        .scroll-overflow::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #fff;
        }
        .ti-pencil {
            font-size: 17px;
            color: orange;
            cursor: pointer;
            padding: 5px;
            float: right;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị thành viên</h5>
                    <p class="m-b-0">Phân quyền truy cập cho thành viên</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Phân quyền</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 style="font-size: 17px;">Lựa chọn thành viên</h5>
                </div>
                <div class="card-block">
                    @include('admin.layouts.messages')
                    <form action="" id="form-add-role">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class=""><label class="col-form-label">Lựa chọn thành viên</label> <span class="ti-pencil" title="Chỉnh sửa"></span></div>
                                    <select name="model_id" id="model_id" class="form-control" disabled>
                                        <option value="0">-- Lựa chọn thành viên --</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{ $employee->id }}">[{{ $employee->id }}] {{ $employee->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">Lựa chọn quyền</span></label>
                                    <select name="role_name[]" id="select_role" class="form-control select2" multiple="multiple">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">[{{ $role->id }}] {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-round waves-effect waves-light">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6" id="data-role">
            @foreach ($roles as $role)
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-size: 17px;">Quyền <b>{{ $role->name }}</b></h5>
                    </div>
                    <div class="card-block scroll-overflow">
                        @if (count($role->getUser) > 0)
                            @foreach ($role->getUser as $employee)
                                <div class="align-middle m-b-30">
                                    <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <h6>{{ $employee->name }}</h6>
                                        <p class="text-muted m-b-0">{{ $employee->email }}</p>
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
        </div>
    </div>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    (function showModal(){
        Swal.fire({
            position: 'top',
            title: 'Lựa chọn thành viên',
            showConfirmButton: true,
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            confirmButtonText: 'Lựa chọn',
            html: `<select name="model_id" id="select_user" class="form-control select2">
                        <option value=""></option>
                        @foreach ($employees as $employee)
                            @if(Auth::user()->id != $employee->id)
                                <option value="{{ $employee->id }}">[{{ $employee->id }}] {{ $employee->fullname }}</option>
                            @endif
                        @endforeach
                    </select>`,
            didOpen: function () {
                $('#select_user').select2({
                    placeholder: "Lựa chọn thành viên"
                });
            },
            preConfirm: () => {
                if ($('#select_user').val() == '') {
                    Swal.showValidationMessage(
                        'Vui lòng lựa chọn thành viên'
                    )
                } else {
                    const data = {
                        model_id: $('#select_user').val()
                    }
                    return axios.post('{{ route("ajax-get-role-user") }}', data)
                        .then(response => {
                            if (!response.status) {
                                throw new Error(response.statusText)
                            }
                            return response;
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                            `Request failed: ${error}`
                            )
                        })
                }
            }
        })
        .then(({ value }) => {
            $('#model_id').val(value.data.model_id);
            $('#select_role').val(value.data.roles).trigger('change');
        })
        $('.ti-pencil').on('click', function (){showModal()});
    }
    )()
    $(document).ready(function() {
        $('#select_role').select2({
            placeholder: "Lựa chọn quyền",
        });

    });
    $('#form-add-role').on('submit', function(e) {
        e.preventDefault();
        let model_id = $('#model_id').val();
        let role_name = $('#select_role').val();
        if (model_id == '') {
            alert('Vui lòng lựa chọn thành viên')
            return;
        } else if (role_name == '') {
            alert('Vui lòng lựa chọn quyền')
            return;
        }
        $('.overlay-load').css('display', 'flex');
        const options = {
            _token: '{{ csrf_token() }}',
            model_id,
            role_name
        }
        $.ajax({
            type: "POST",
            url: "{{ route('ajax-add-role-user') }}",
            data: options,
            dataType: "json",
            success: function (response) {
                $('#data-role').html(response.data);
                $('.overlay-load').css('display', 'none');
                Swal.fire(
                    'Thành công',
                    `Đã cập nhật role cho thành viên này"`,
                    'success'
                )
            },
            error: function(err) {
                $('.overlay-load').css('display', 'none');
                Swal.fire(
                    'Thất bại !',
                    'Cập nhật role thất bại, vui lòng thử lại sau !',
                    'error'
                )
            }
        });
    })
</script>
@endsection
