@extends('admin.layouts.main')
@section('title')
<title>TimeWorks Manager</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css?v1.0.1">
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
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
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
    <div class="box-section-timesheet row">
        <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item active">
                <i class=" ti-clipboard"></i>
                <p>Bảng công</p>
            </div>
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <i class=" ti-settings"></i>
                <p>Cài đặt ngày chốt công</p>
            </div>
        </div>
        <div class="col-md-12 col-lg-10 col-sm-12 card">
            <div class="tab-pane active card-header">
                <div class="row align-items-center unset-width">
                    <div class="col-8">
                        <h4>Quản lí bảng công</h4>
                    </div>
                    <div class="col-4">
                        <a href="" class="btn btn-outline-primary btn-round waves-effect waves-light" style="float: right; margin-right: 10px;">
                            <i class="ti-printer"></i>
                            Xuất Excel
                        </a>
                    </div>
                </div>
                <form action="" class="mt-3">
                    <div class="row unset-width">
                        <div class="form-group col-lg-12">
                            <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords" class="form-control filter-data">
                        </div>
                        <div class="form-group col-lg-4">
                            <input class="form-control" type="month" name="month" max="{{ $currentMonth }}" value="{{ $inpMonth }}" placeholder="Chọn tháng này">
                        </div>
                        <div class="form-group col-lg-4">
                            <select class="form-control filter-data" name="position">
                                <option value="">Chọn phòng ban, vị trí, nhân viên</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <button class="btn btn-primary btn-sm">Tìm Kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="task_Manager" style="margin-top: 20px">
                    <div class="flex" style="display: flex">
                        <div class="items-center" >
                            <div class="w-10 h-10 rounded-full" style="background-color: rgb(0, 177, 79);"></div>
                            <span class="text-grey55">Chấm công đúng giờ</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: rgb(255, 159, 10);"></div>
                            <span class="text-grey55">Đi muộn/ Về sớm/ Quên checkout</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: rgb(187, 187, 187);"></div>
                            <span class="text-grey55">Không chấm công</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: rgb(10, 132, 255);"></div>
                            <span class="text-grey55">Có đơn từ</span>
                        </div>
                        <div class="items-center">
                        <div class="w-10 h-10 rounded-full" style="background-color: rgb(0, 188, 212);"></div>
                            <span class="text-grey55">Nghỉ lễ</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: rgb(255, 69, 58);"></div>
                            <span class="text-grey55">Có lỗi</span>
                        </div>
                    </div>
                    <div>
                        <p>Có <b>3</b> nhân viên trong danh sách</p>
                    </div>
                    <div class="table-border-style">
                        <div class="table-responsive scrollbar-custom">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="table-align-center text-position">Tên nhân viên</th>
                                        @foreach ($formatDates as $date => $dateName)
                                            <th class="{{ $loop->index == 0 ? "pl-index" : ''}}">
                                                {{$date}}
                                                <br/>
                                                {{$dateName}}
                                            </th>
                                        @endforeach
                                        <th class="table-align-center">Công thực tế</th>
                                        <th class="table-align-center">Công nghỉ phép</th>
                                        <th class="table-align-center">Công nghỉ lễ</th>
                                        <th class="table-align-center">Công không lương</th>
                                        <th class="table-align-center">Số giờ OT</th>
                                        <th class="table-align-center">Giờ làm việc</th>
                                        <th class="table-align-center">Số phút đi muộn</th>
                                        <th class="table-align-center">Số phút về sớm</th>
                                        <th class="table-align-center">Công hiện tại</th>
                                        <th class="table-align-center">Công chuẩn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-position" style="padding: 0;">Trần Trọng Anh</th>
                                        @foreach ($formatDates as $date => $dateName)
                                            <td class="{{ $loop->index == 0 ? "pl-index" : ''}}">
                                                <div class="flex-col">
                                                    <span>1</span>
                                                    <div class="flex justify-center flex-wrap px-10" style="background-color: rgb(0, 177, 79);"></div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>40</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane card-block">
                <h2>Cài đặt ngày chốt công</h2>
                <p>Chọn 1 trong 2 cách</p>
                <div class="tab-radio">
                    <div class="item " >
                        <input id="item1" type="radio" name="checked"  onchange="checkMe(this.checked)"><label for="">Ngày cuối cùng của tháng </label>
                    </div>
                    <div class="item">
                        <input id="item2" type="radio"  name="checked" onchange="checkMe(this.checked)"><label for=""> Người dùng tự chọn ngày cố định mỗi tháng</label>
                    </div>
                </div>
                <div class="tab-select-time" >

                    <div class="select-time" id="contentt" style="display: none" >
                    <label fotab-select-timer="">Chọn ngày chấm công bất kỳ trong tháng</label>
                    <select name=""  class="form-control ml-2">
                        @for ($day = 1; $day <= 31; $day++)
                            <option value="{{$day}}">Ngày {{$day}}</option>
                        @endfor
                    </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="float:right; margin-right:30px">Lưu</button>
            </div>
        </div>
        {{-- <div  class=" dataTables_pager">

            {!!$formatDates->links()!!}

        </div> --}}
    </div>

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
</script>
@endsection