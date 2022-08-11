<div>
    <form action="" class="form-filter">
        <div class="row align-items-end">
            <div class="col-md-3">
                <label for="">Từ khóa</label>
                <input type="text" name="keywork" placeholder="Nhập từ khóa..." class="form-control filter-data">
            </div>
            <div class="col-md-3">
                <label for="">Loại đơn:</label>
                <input type="text" name="type" value="" placeholder="Loại đơn..." filter="company_shift_name" class="form-control filter-data">
            </div>
            <div class="col-md-3">
                <label for="">Người tạo:</label>
                <input type="text" name="employee" value="" placeholder="Người tạo..." filter="company_shift_name" class="form-control filter-data">
            </div>
            <input type="hidden" :value="current_tab" name="current_tab">
            <div class="col-md-3">
                <a href="{{ route('schedule-calender-index') }}" class="btn btn-inverse btn-sm waves-effect waves-light" style="float: right;">Tất cả</a>
                <button class="btn btn-primary btn-sm waves-effect waves-light mr-2" style="float: right;">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <div class="mt-5 mb-2 row">
        <div class="col-4">Có <b>@{{ requestProcessData.total }}</b> lịch làm việc trong danh sách</div>
    </div>
</div>
<div class="table-border-style mt-2">
    <div class="table-responsive scrollbar-custom" style="width:100%;">
        <table class="table align-middle-td">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn</th>
                    <th>Loại đơn</th>
                    <th>Người tạo</th>
                    <th>Nội dung</th>
                    <th>Người duyệt đơn</th>
                    <th>Thời gian tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(record, index) in requestProcessData.data">
                    <td>@{{ index+1 }}</td>
                    <td><label for="" class="label label-inverse-primary">#@{{ record.id }}</label></td>
                    <td>
                        <p>@{{ record.name }}</p>
                        <label for="" class="label bg-primary" :class="record.class_status">@{{ record.getStatusStr }}</label>
                    </td>
                    <td>
                        <p><b>@{{ record.employee?.fullname }}</b></p>
                        <p>Phòng ban: <label for="" class="label label-info">@{{ record.employee?.position?.department?.name || "Chưa thiết lập phòng ban" }}</label></p>
                        <p>Vị trí: <label for="" class="label label-info">@{{ record.employee?.position?.name || "Chưa thiết lập vị trí" }}</label></p>
                    </td>
                    <td>
                        <div v-if="record.request_type == {{ config('singletype.type.leave_work') }}">
                            <div>
                                <label for="">Bắt đầu nghỉ</label>
                                <p><label class="label label-inverse-danger">@{{ record.request_detail.quit_work_from_at }}</label></p>
                            </div>
                            <div>
                                <label for="">Kết thúc nghỉ</label>
                                <p><label class="label label-inverse-danger">@{{ record.request_detail.quit_work_to_at }}</label></p>
                            </div>
                        </div>
                        <div v-else-if="record.request_type == {{ config('singletype.type.edit_work') }}">
                            <p>Giờ vào - Giờ ra</p>
                            <label class="label label-inverse-info">@{{ record.quit_work_from_at }}</label>
                            <span class="mr-1">-</span>
                            <label class="label label-inverse-info ml-2">@{{ record.quit_work_to_at }}</label>
                        </div>
                        <div v-else-if="record.request_type == {{ config('singletype.type.ot') }}">
                                <p>Khoảng thời gian OT:</p>
                                <label class="label label-inverse-primary">@{{ record.quit_work_from_at }}</label>
                                <span class="mr-1">-</span>
                                <label class="label label-inverse-primary">@{{ record.quit_work_to_at }}</label>
                        </div>
                        <div v-else>N/A</div>
                    </td>
                    <td style="max-width: 150px; white-space: unset;">
                        <span class="mytooltip tooltip-effect-5 pt-2 pl-2" style="display: inline-block;" v-for="approver in record.approvers">
                            <img :src="approver.avatar" class="avatar-custome" alt="" width="50">
                            <span class="tooltip-content clearfix">
                                <span class="tooltip-text text-center">@{{ approver.fullname }}</span>
                            </span>
                        </span>
                    </td>
                    <td>
                        <b>@{{ record.created_at }}</b>
                    </td>
                    <td>
                        <div class="mytooltip tooltip-effect-9">
                            <a :href="linkRequestDetail(record.id)" class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-icon">
                                <i class="icofont icofont-eye-alt"></i>
                            </a>
                            <span class="tooltip-content3">Xem chi tiết</span>
                        </div>
                        {{-- <div class="mytooltip tooltip-effect-9 ml-2">
                            <button class="btn waves-effect waves-dark btn-success btn-outline-success btn-icon">
                                <i class="icofont icofont-check-circled"></i>
                            </button>
                            <span class="tooltip-content3">Duyệt nhanh</span>
                        </div> --}}
                    </td>
                </tr>
                <tr v-if="requestProcessData.total == 0">
                    <td colspan="8" class="box_data_empty">
                        <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="float: right;" class=""  v-if="requestProcessData.total > 0">
        <template>
            <paginate
                :page-count="requestProcessData.last_page"
                v-model="requestProcessData.current_page"
                :initial-page="requestProcessData.current_page"
                :click-handler="changePageProcess"
                :prev-text="'‹'"
                :next-text="'›'"
                :page-link-class="'page-link'"
                :container-class="'pagination'"
                :page-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-link-class="'page-link'"
                :prev-class="'page-item'"
                :next-class="'page-item'"
            >
            </paginate>
        </template>
    </div>
</div>
