@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <style>
        .pagination{
            justify-content: center
        }
        .table-responsive{
            width: 100%;
        }
    </style>
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản Lý Đơn Từ</h5>
                    <p class="m-b-0">Danh sách tất cả các loại đơn từ của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Loại Sản Phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="box-section-timesheet row" id="app">
    <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
        <div class="col-lg-12 col-md-3 col-sm-4 tab-item" @click="changeTab('timesheet_tab')" :class="{ active: current_tab == 'timesheet_tab'}">
            <i class=" ti-clipboard"></i>
            <p>Hình Thức Chấm Công</p>
        </div>
        <div class="col-lg-12 col-md-3 col-sm-4 tab-item"  @click="changeTab('timesheetPhone_tab')" :class="{ active: current_tab == 'timesheetPhone_tab'}">
            <i class=" ti-settings "></i>
            <p>Chấm Công Bằng Điện Thoại</p>
        </div>
    </div>
    <div class="col-md-12 col-lg-10 col-sm-12 card">
        <div class="tab-pane" :class="{ active: current_tab == 'timesheet_tab'}">
            @include('admin.checkin.checkinlist')
        </div>
        <div class="tab-pane card-block" :class="{ active: current_tab == 'timesheetPhone_tab'}">
            @include('admin.checkin.mobilecheck')
        </div>
    </div>
    <div class="overlay-load" style="position: fixed;">
        <img src="{{asset('frontend')}}/image/loading.gif" alt="">
        <span>Vui lòng chờ ...</span>
    </div>
</div>
@endsection

@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css?v1.0.1">
@endsection
@section('page-script')
<script>
    var app = new Vue({
        el: '#app',
        data: {
            current_tab: "timesheet_tab",
            current_tab_sub: "timesheet_tab_wifi",
            attendance_setting: {!! $attendanceSetting ?? [] !!}
        },
        methods: {
            changeTab: (tab) => {
                app.current_tab = tab;
                var urlParam = new URL(window.location);
                urlParam.searchParams.set('current_tab', tab);
                window.history.pushState({}, '', urlParam);
            },
            changeTabSub: (tab)=>{
                app.current_tab_sub = tab;
                var urlParam = new URL(window.location);
                urlParam.searchParams.set('current_tab_sub', tab);
                window.history.pushState({}, '', urlParam);
            },
            handleUpdateAttendanceSetting: () => {
                if (app.attendance_setting.length == 0) {
                    Swal.fire(
                        'Lỗi',
                        `Vui lòng lựa chọn hình thức chấm công !`,
                        'error'
                    );
                    return ;
                }
                $('.overlay-load').css('display', 'flex');
                axios.post("{{route('checkin.ajax-attendance-setting')}}", {data: app.attendance_setting})
                .then(res => {
                    $('.overlay-load').css('display', 'none');
                    Swal.fire(
                        'Thành công',
                        `Cập nhật thành công`,
                        'success'
                    )
                })
                .catch(({response}) => {
                    $('.overlay-load').css('display', 'none');
                    Swal.fire(
                        'Thất bại',
                        `${response.data.messages}`,
                        'error'
                    )
                })
            }
        },
    })
    // set current_tab by params
    let params = (new URL(document.location)).searchParams;
    let current_tab = params.get('current_tab');
    app.current_tab = current_tab ? current_tab : 'timesheet_tab';
    ///
    let current_tab_test = params.get('current_tab_sub');
    app.current_tab_sub = current_tab_test ? current_tab_test : 'timesheet_tab_wifi';
    // const tabs = document.querySelectorAll(".tab-item");
    // const panes = document.querySelectorAll(".tab-pane");
    // tabs.forEach((tab, index) => {
    //     const pane = panes[index];

    //     tab.onclick = function() {
    //         document.querySelector(".tab-item.active").classList.remove("active");
    //         document.querySelector(".tab-pane.active").classList.remove("active");
    //         this.classList.add("active");
    //         pane.classList.add("active");
    //     };
    // });

    const current_ip_button=document.getElementById("current_ip_button");
    const wifi_ip=document.getElementById("wifi-ip");
    const the_current_ip=document.getElementById("the_current_ip").innerHTML;
    current_ip_button.onclick = function(){
        wifi_ip.value=the_current_ip;
    }
    ///////////////////////////////////////////////
    //<----------------AJAX For WIFI---------------------->
    $(document).ready(function(){
        $('#the-add-wifi-button').click(function(){
          const url=$(this).attr('data-url');
          const name=$('#name').val();
          const wifi_ip=$('#wifi-ip').val();
          const status=$('input[name=check-status]:checked').val();
                  if(name.trim() ==''){
                    $('#name').addClass('is-invalid');
                    $('#name_error_msg').text("Tên Không Được Bỏ Trống");
                  }else if(wifi_ip.trim() ==''){
                    $('#wifi_ip').addClass('is-invalid');
                    $('#ip_error_msg').text("IP Không Được Bỏ Trống");
                  }else if(status == undefined){
                    $('#status_error_msg').text("Hãy chọn 1 trạng thái");
                  }
                  else{
                    $.ajax({
                    headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    method: "post",
                    url: url,
                    dataType: "JSON",
                    data:{
                    name:$('#name').val(),
                    ip:$('#wifi-ip').val(),
                    branch:$('#branch').val(),
                    status : $('input[name=check-status]:checked').val()
                    },
                    beforeSend:function(){
                        $('.custom-loader').removeClass('hide');
                      },
                      complete:function(){
                        window.location.reload();
                      }
                    })
                }



        })
    })
    //<----------------AJAX For Location---------------------->
    $(document).ready(function(){
        $('#add-location-button').click(function(){
           const location_name=$('#location_name').val();
           const code_branch=$('#code_branch').val();
           const address=$('#address').val();
           const hotline=$('#hotline').val();
           const longtitude=$('#longtitude').val();
           const latitude=$('#latitude').val();
           const radius=$('#radius').val();
           const url=$(this).attr('data-url');
           if(code_branch.trim() ==''){
                    $('#code_branch').addClass('is-invalid');
                    $('#code_branch_error_msg').text("Mã Chi Nhánh Không Được Bỏ Trống");
            }else if(location_name.trim() ==''){
                    $('#location_name').addClass('is-invalid');
                    $('#location_name_error_msg').text("Tên Chi Nhánh Không Được Bỏ Trống");
            }else if(address.trim() ==''){
                    $('#address').addClass('is-invalid');
                    $('#address_error_msg').text("Địa Chỉ Không Được Bỏ Trống");
            }else if(hotline.trim() ==''){
                    $('#hotline').addClass('is-invalid');
                    $('#hotline_error_msg').text("Hotline Không Được Bỏ Trống");
            }else if(longtitude.trim() ==''){
                    $('#longtitude').addClass('is-invalid');
                    $('#longtitude_error_msg').text("Kinh Độ Không Được Bỏ Trống");
            }else if(latitude.trim() ==''){
                    $('#latitude').addClass('is-invalid');
                    $('#latitude_error_msg').text("Vĩ Độ Không Được Bỏ Trống");
            }else if(radius.trim() ==''){
                    $('#radius').addClass('is-invalid');
                    $('#radius_error_msg').text("Bán Kính Không Được Bỏ Trống");
            }else{
                $.ajax({
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                method: "post",
                url: url,
                dataType: "JSON",
                data:{
                    location_name:$('#location_name').val(),
                    code_branch:$('#code_branch').val(),
                    address:$('#address').val(),
                    hotline:$('#hotline').val(),
                    longtitude:$('#longtitude').val(),
                    latitude:$('#latitude').val(),
                    radius:$('#radius').val(),
                    },
                    beforeSend:function(){
                        $('.custom-loader').removeClass('hide');
                    },
                      complete:function(){
                        window.location.reload();
                    }
                })
            }

        })
    })
    /////////////////////////////
    const wifi_check_box=document.getElementById("wifi_check_box");
    const location_check_box=document.getElementById("location_check_box");
    const qr_check_box=document.getElementById("qr_check_box");
    const select_all_check_box=document.getElementById("select_all_check_box");
    select_all_check_box.onclick=function(){
            if($(this).prop('checked')){
                $('#wifi_check_box').prop("disabled", true);
                $('#location_check_box').prop("disabled", true);
                $('#qr_check_box').prop("disabled", true);
            }
            else{
                $('#wifi_check_box').removeAttr("disabled");
                $('#location_check_box').removeAttr("disabled");
                $('#qr_check_box').removeAttr("disabled", true);


            }

    }
</script>
@endsection
