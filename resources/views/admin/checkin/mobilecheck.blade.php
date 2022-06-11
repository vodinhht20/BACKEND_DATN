<div class="">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs default-tab tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link " data-toggle="tab" data-target="#type" aria-controls="type" aria-expanded="true" role="tab" >Danh Sách Các Loại Đơn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#deathline" aria-controls="deathline" aria-expanded="false" role="tab" >Thiết Lập Hạn Chốt Đơn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#dafuk" aria-controls="dafuk" aria-expanded="false" role="tab" >Thiết lập hạn chốt đơn OT</a>
        </li>
        
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs card-block" style="width: 100%">
        <div class="tab-pane active" id="type" role="tabpanel">
            @include('admin.checkin.wifilist')
        </div>
        <div class="tab-pane" id="deathline" role="tabpanel">
                    <h5>Hạn Chốt Đơn</h5>
                    <br>
                    <form action="">
                        <div class="form-group">
                            <p>Hạn chốt đơn vào 3 ngày chốt công</p>
                        </div>
                        <div class="form-group">
                            <label for="">cài đặt ngày chốt công tại <a href="">đây</a></label>
                        </div>
                        <div class="form-group">
                            <label for="">Số ngày sau ngày chốt công</label>
                            <input type="number" class="form-control" style="width: 10%;">
                        </div>
                        <hr>
                        <div class="form-footer" style="text-align: end">
                            <input type="submit" value="Lưu" class="btn btn-info" name="" id="">
                        </div>
                    </form>
        </div>
        <div class="tab-pane" id="dafuk" role="tabpanel">
                   <h5>Hạn Chốt Đơn OT</h5>
                   <br>
                   <form action="">
                        <div class="form-group">
                            <span>Chỉ Cho Phép duyệt đơn sau ngày đăng ký OT thực tế </span>
                        </div>
                        <div class="form-group" >
                            <label class="switch">
                                <input type="checkbox" class="value-status" data-id="1" checked="">
                                <span class="slider round"></span>
                            </label>
                        </div>
                      <hr>
                      <div class="form-footer" style="text-align: end">
                        <input type="submit" name="" id="" class="btn btn-info" >
                      </div>
                   </form>
        </div>
    </div>
</div>