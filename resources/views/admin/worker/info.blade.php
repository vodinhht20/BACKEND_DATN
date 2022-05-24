@extends('admin.layouts.main')

@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/datepicker.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/company-work.css">
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
    <div class="main__tabnine">
        <div class="grid_wide">
            <div class="tabs" style="flex-grow: 1">
                <div class="tab-item active">
                    <i class=" ti-clipboard"></i>
                    <p>Bảng công</p>
                </div>
                <div class="tab-item">
                    <i class=" ti-settings"></i>
                    <p>Cài đặt ngày chốt công</p>
                </div>
            </div>
            <div class="tab-content" style="flex-grow: 8">
                <div class="tab-pane active">
                    <h1>Quản lí bảng công</h1>
                    <div class="form-group col-lg-4 col-md-6 col-sx-12">
                        <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords"
                            class="form-control filter-data">
                    </div>
                    <div class="content-work-head">
                        <div class="work-head-left">
                            <select class="form-control filter-data" style="font-weight:bold">
                                <?php
                                use Carbon\Carbon;
                                $month = Carbon::now()->monthName;
                                $month = Carbon::now()->format('n ');
                                $bef_month = Carbon::now()
                                    ->startOfMonth()
                                    ->subMonth($month);
                                
                                echo "<option value=''><span>Tháng $month </span></option>";
                                
                                for ($bef_month = 1; $bef_month < $month; $bef_month++) {
                                    echo "<option value=''><span>Tháng $bef_month</span></option>";
                                }
                                ?>
                            </select>
                            <select class="form-control filter-data">
                                <option value="">Chọn phòng ban, vị trí, nhân viên</option>
                            </select>
                        </div>
                        <div class="work-head-right" style="margin-right: 0">

                            <i class=" ti-bar"></i>
                            <i class=" ti-eye"></i>
                            <i class=" ti-list"></i>
                            <a href="#" class="btn btn-outline-primary btn-round waves-effect waves-light">
                                <i class="ti-printer"></i>
                                Xuất Excel
                            </a>

                        </div>
                    </div>
                    <div class="task_Manager" style="margin-top: 20px">
                        <div>
                            <i class=" fa-circle">Chấm công đúng giờ</i>
                            <i class=" fa-circle">Đi muôn/Về sớm/Quên check out</i>
                            <i class=" fa-circle">Không chấm công</i>
                            <i class=" fa-circle">Có đơn từ</i>
                            <i class=" fa-circle">Nghỉ lễ</i>
                            <i class=" fa-circle">Có lỗi</i>
                        </div>
                        <div>
                            <p>Có<span> 3 </span>nhân viên trong danh sách</p>
                        </div>
                        <div>
                            <table class="table_manager">
                                <thead>
                                    <tr>
                                        <th>Tên nhân viên</th>

                                        <th class='timeworks'>

                                            <?php
                                            
                                            $month = Carbon::now()->monthName;
                                            $month = Carbon::now()->format('n');
                                            $date = Carbon::now($month)->format('n');
                                            $day = Carbon::now($date)->dayName;
                                            $day = Carbon::now($date)->format('n');
                                            $date = Carbon::now($month)->format('d / m');
                                            
                                            echo "
                                                                                    
                                                                                    <span>Thứ $day  </span>
                                                                                        <span>$date </span>
                                                                                    ";
                                            ?></th>

                                        <th>Công thực tế</th>
                                        <th>Công nghỉ phép</th>
                                        <th>Công nghỉ lễ</th>
                                        <th>Công không lương</th>
                                        <th>Số giờ OT</th>
                                        <th>Giờ làm việc</th>
                                        <th>Số phút đi muộn</th>
                                        <th>Số phút về sớm</th>
                                        <th>Công hiện tại</th>
                                        <th>Công chuẩn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img src="" alt="">
                                            <p>Trần Trọng Anh</p>
                                        </td>
                                        <td></td>
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
                <div class="tab-pane">
                    <h2>Cài đặt ngày chốt công</h2>
                    <p>Chọn 1 trong 2 cách</p>
                    <div class="tab-radio">
                        <div class="item active">
                            <input name="check" type="radio"><label for="">Ngày cuối cùng của tháng </label>
                        </div>
                        <div class="item" id="actionday">
                            <input name="check" type="radio"><label for=""> Người dùng tự chọn ngày cố định mỗi
                                tháng</label>
                        </div>
                    </div>
                    <div class="tab-select-time">
                        <div class="select-time active">

                        </div>
                        <div class="select-time">
                            <label fotab-select-timer="">Chọn ngày chấm công bất kỳ trong tháng</label>
                            <select name="" id="" class="selectday">

                                <?php
                                for ($i = 1; $i <= 28; $i++) {
                                    echo "<option value=''>$i</option>";
                                }
                                ?>

                            </select>
                        </div>

                    </div>
                    <button type="submit" style="float:right">Lưu</button>
                </div>
            </div>
        </div>
    </div>
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
        })
    </script>
    <script>
        const items = document.querySelectorAll(".item");
        const select - times = document.querySelectorAll(".select-time ");


        items.forEach((tabb, index) => {
            const select - time = select - times[index];

            tabb.checked = function() {
                document.querySelector(".item.active").classList.remove("checked");
                document.querySelector(".select-time.active").classList.remove("checked");
                this.classList.add("checked");
                select - time.classList.add("checked");
            };
        })
    </script>
@endsection

@section('page-script')
@endsection
