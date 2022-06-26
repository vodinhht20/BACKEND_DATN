@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản Lý ĐƠn Từ</h5>
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
<div class="box-section-timesheet row">
    <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
        <div class="col-lg-12 col-md-3 col-sm-4 tab-item active">
            <i class=" ti-clipboard"></i>
            <p>Hình Thức Chấm Công</p>
        </div>
        <div class="col-lg-12 col-md-3 col-sm-4 tab-item">
            <i class=" ti-settings"></i>
            <p>Chấm Công Bằng Điện Thoại</p>
        </div>
    </div>
    <div class="col-md-12 col-lg-10 col-sm-12 card">
        <div class="tab-pane active ">
            @include('admin.checkin.checkinlist')
        </div>
        <div class="tab-pane card-block">
            @include('admin.checkin.mobilecheck')
        </div>
    </div>
    
</div>
@endsection

@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css?v1.0.1">
@endsection
@section('page-script')
<script>

    const tabs = document.querySelectorAll(".tab-item");
    const panes = document.querySelectorAll(".tab-pane");
    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function() {
            document.querySelector(".tab-item.active").classList.remove("active");
            document.querySelector(".tab-pane.active").classList.remove("active");
            this.classList.add("active");
            pane.classList.add("active");
        };
    });

    function checkMe(checked) {
        var cb = document.getElementById("item1");
        var db = document.getElementById("item2");

        var content = document.getElementById("contentt");
        if (db.checked==true) {
            content.style.display="block";

        }else{
            content.style.display="none";

        } if (cb.checked==true) {
            content.style.display="none";


        }
    }
    ///////////////////////////////////////////////
    //<----------------AJAX For WIFI---------------------->
    $(document).ready(function(){
        $('#the-add-wifi-button').click(function(){
          console.log("lmaoooooooo");
          const url=$(this).attr('data-url');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                method: "post",
                url: url,
                dataType: "JSON",
                data:{
                    name:$('#name').val(),
                    ip:$('#wifi-ip').val(),
                    branch:$('#branch').val(),
                    status:$('#check-status').val()
                },
                success: function () {
                        console.log("LMAOOO");
                      },
                error: function(){
                    console.error();
                }
            })
        })
    })
    //<----------------AJAX For Location---------------------->
    $(document).ready(function(){
        $('#add-location-button').click(function(){
          console.log("lmaoooooooo");
          const url=$(this).attr('data-url');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                method: "post",
                url: url,
                dataType: "JSON",
                data:{
                    name:$('#name').val(),
                    code_branch:$('#code_branch').val(),
                    address:$('#address').val(),
                    hotline:$('#hotline').val(),
                    longtitude:$('#longtitude').val(),
                    latitude:$('#latitude').val(),
                    radius:$('#radius').val(),
                },
                
                success: function (response) {
                    window.location.reload()
                      },
                error: function(response){
                    console.error();
                }
            })
        })
    })  
</script>
@endsection
