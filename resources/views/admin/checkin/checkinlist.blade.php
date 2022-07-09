<p style="font-weight: 600; font-size: 25px">Hình Thức Chấm Công</p>
<hr>
<div class="form-froup row">
    <div class="col-sm-12">
        <p style="font-size: 20px; margin: auto"><i class="fa fa-mobile-phone icon-theme"></i> Chấm Công Bằng Điện Thoại</p>
    </div>
    <div class="col-sm-12 mt-3 pb-3" style="margin-left: 30px;">
        <div class="form-group d-flex justify-center">
            <input type="checkbox" v-model="attendance_setting" :disabled="attendance_setting.includes('4')" class="checkbox_custom mr-2" value="1">
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
            <input type="checkbox" v-model="attendance_setting" :disabled="attendance_setting.includes('4')" class="checkbox_custom mr-2" value="2">
            <div>
                <label for="" style="font-size: 15px">
                    Giới hạn chấm công theo vị trí(GPS). Thiết lập vị trí chấm công
                    <a href="{{ route('setting.branch.list') }}" style="font-size: 15px; color: #ff9d36">Tại Đây</a>
                </label>
                <div class="" style="margin-left: 10px"><small>Camel không khuyến khích sử dụng loại hình chấm công này</small></div>
            </div>
        </div>
        <div class="form-group d-flex justify-center">
            <input type="checkbox" v-model="attendance_setting" :disabled="attendance_setting.includes('4')" class="checkbox_custom mr-2" value="3">
            <div>
                <label for="" style="font-size: 15px">
                    Chấm công bằng QR code. Thiết lập link hiển thị QR
                    <a href=""  style="font-size: 15px; color: #ff9d36">Tại Đây</a>
                </label>
                <div class="" style="margin-left: 10px"><small>Mã QR sẽ thay đổi mỗi 30s 1 lần để đảm bảo tính xác thực</small></div>
            </div>
        </div>
        <div class="form-group d-flex justify-center">
            <input type="checkbox" v-model="attendance_setting" class="checkbox_custom mr-2" value="4" @click="() => { attendance_setting = ['4'] }">
            <div>
                <label for="" style="font-size: 15px"> Không giới hạn</label>
                <div class="" style="margin-left: 10px"><small>Nhân viên có thể chấm công ở bất kì đâu</small></div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit"class="btn btn-primary btn-round waves-effect waves-light" @click="handleUpdateAttendanceSetting()">Cập nhật</button>
        </div>
    </div>
</div>


