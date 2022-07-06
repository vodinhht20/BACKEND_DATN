 <p style="font-weight: 600; font-size: 25px">Hình Thức Chấm Công</p>
 <hr>
<div class="form-froup row">
    <div class="col-sm-6">
        <p style="font-size: 20px; margin: auto"><i class="fa fa-mobile-phone"></i> Chấm Công Bằng Điện Thoại</p>
    </div>
    <div class="form-group" style="margin-left: 30px ; width: 100% ">
        <input type="checkbox" name="wifi_check_box" id="wifi_check_box"> <label for="" style="font-size: 15px"> Giới hạn chấm công qua WI-FI của công ty. Thiết Lập WIFI <a  @click="changeTab('timesheetPhone_tab'), changeTabSub('timesheet_tab_wifi')" :class="{ active: current_tab == 'timesheetPhone_tab'}"  style="font-size: 15px; color: #ff9d36">Tại Đây</a></label>
        <div class="col-form-label" style="margin-left: 17px"><small>Bạn Cần wifi với IP tĩnh để sử dụng hình thức chấm công này</small></div>
    </div>
    <div class="form-group" style="margin-left: 30px ; width: 100% ">
        <input type="checkbox" name="location_check_box" id="location_check_box"> <label for="" style="font-size: 15px"> Giới hạn chấm công theo vị trí(GPS). Thiết lập vị trí chấm công <a @click="changeTab('timesheetPhone_tab'), changeTabSub('timesheet_tab_location')" :class="{ active: current_tab == 'timesheetPhone_tab'}"  :class="{ active: current_tab_sub == 'timesheet_tab_location'}"  style="font-size: 15px; color: #ff9d36">Tại Đây</a></label>
        <div class="col-form-label" style="margin-left: 17px"><small>Camel không khuyến khích sử dụng loại hình chấm công này</small></div>
    </div>
    <div class="form-group" style="margin-left: 30px ; width: 100% ">
        <input type="checkbox" name="qr_check_box" id="qr_check_box"> <label for="" style="font-size: 15px"> Chấm công bằng QR code. Thiết lập link hiển thị QR <a href=""  style="font-size: 15px; color: #ff9d36">Tại Đây</a></label>
        <div class="col-form-label" style="margin-left: 17px"><small>Mã QR sẽ thay đổi mỗi 30s 1 lần để đảm bảo tính xác thực</small></div>
    </div>
    <div class="form-group " style="margin-left: 30px ; width: 100%">
        <input type="checkbox" name="select_all_check_box" id="select_all_check_box"> <label for="" style="font-size: 15px"> Không giới hạn</label>
        <div class="col-form-label" style="margin-left: 17px"><small>Nhân viên có thể chấm công ở bất kì đâu</small></div>
    </div>

</div>


