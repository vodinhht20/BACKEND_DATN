<p style="font-weight: 600; font-size: 25px">Hình Thức Chấm Công</p>
<hr>
<div class="form-froup row">
    <div class="col-sm-12">
        <p style="font-size: 20px; margin: auto"><i class="fa fa-mobile-phone icon-theme"></i> Chấm Công Bằng Điện Thoại</p>
    </div>
    <div class="col-sm-12 mt-3" style="margin-left: 30px;">
        <div class="form-group d-flex justify-center">
            <input type="checkbox" name="wifi_check_box" class="checkbox_custom mr-2" id="wifi_check_box">
            <div>
                <label for="" style="font-size: 15px">
                    Giới hạn chấm công qua WI-FI của công ty. Thiết Lập WIFI
                    <a style="font-size: 15px; color: #ff9d36" @click="changeTab('timesheetPhone_tab'), changeTabSub('timesheet_tab_wifi')">Tại Đây</a>
                </label>
                <div class="" style="margin-left: 10px">
                    <small>Bạn Cần wifi với IP tĩnh để sử dụng hình thức chấm công này</small>
                </div>
            </div>
        </div>
        <div class="form-group d-flex justify-center">
            <input type="checkbox" name="location_check_box" class="checkbox_custom mr-2" id="location_check_box">
            <div>
                <label for="" style="font-size: 15px">
                    Giới hạn chấm công theo vị trí(GPS). Thiết lập vị trí chấm công
                    <a @click="changeTab('timesheetPhone_tab'), changeTabSub('timesheet_tab_location')" :class="{ active: current_tab == 'timesheetPhone_tab'}"  :class="{ active: current_tab_sub == 'timesheet_tab_location'}"  style="font-size: 15px; color: #ff9d36">Tại Đây</a>
                </label>
                <div class="" style="margin-left: 10px"><small>Camel không khuyến khích sử dụng loại hình chấm công này</small></div>
            </div>
        </div>
        <div class="form-group d-flex justify-center">
            <input type="checkbox" name="qr_check_box" class="checkbox_custom mr-2" id="qr_check_box">
            <div>
                <label for="" style="font-size: 15px">
                    Chấm công bằng QR code. Thiết lập link hiển thị QR
                    <a href=""  style="font-size: 15px; color: #ff9d36">Tại Đây</a>
                </label>
                <div class="" style="margin-left: 10px"><small>Mã QR sẽ thay đổi mỗi 30s 1 lần để đảm bảo tính xác thực</small></div>
            </div>
        </div>
        <div class="form-group d-flex justify-center">
            <input type="checkbox" name="select_all_check_box" class="checkbox_custom mr-2" id="select_all_check_box">
            <div>
                <label for="" style="font-size: 15px"> Không giới hạn</label>
                <div class="" style="margin-left: 10px"><small>Nhân viên có thể chấm công ở bất kì đâu</small></div>
            </div>
        </div>
    </div>
</div>


