<div class="row align-items-end">
    <div class="col-md-3">
        <label for="">Từ khóa:</label>
        <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <label for="">Từ khóa:</label>
        <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <label for="">Từ khóa:</label>
        <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <button class="btn btn-inverse btn-sm waves-effect waves-light" style="float: right;">Tất cả</button>
        <button class="btn btn-primary btn-sm waves-effect waves-light mr-2" style="float: right;">Tìm kiếm</button>
    </div>
</div>
<div class="mt-5 mb-2 row">
    <div class="col-4">Có <b>20</b> lịch làm việc trong danh sách</div>
    <div class="col-8">
        <button class="btn btn-outline-primary btn-round waves-effect btn-sm waves-light mr-3" style="padding-top: 10px; float: right;"  data-toggle="modal" data-target="#exampleModal">
            <i class="ti-plus"></i>
            Thêm mới
        </button>
    </div>
</div>
<div class="">
    <div class="table-border-style">
        <div class="table-responsive">
            <table class="table align-middle-td">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên lịch làm việc</th>
                        <th>Ca làm việc trong lịch</th>
                        <th>Thời gian hiệu lực</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lịch làm việc hằng ngày</td>
                        <td>
                            <h5 class="shift-title">Ca Sáng</h5>
                            <div class="content-line mt-2">
                                <i class="ti-timer"></i>
                                <span class="label label-inverse-primary">08:00 - 12:00</span>
                            </div>
                            <div class="content-line mt-2">
                                <i class="ti-calendar"></i>
                                <span>
                                    <label class="label label-inverse-success">Thứ 2</label>
                                    <label class="label label-inverse-success">Thứ 3</label>
                                    <label class="label label-inverse-success">Thứ 4</label>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="label-blur">Từ</span>
                                <span>
                                    26/04/2022
                                </span>
                            </div>
                            <div class="mt-2">
                                <span class="label-blur">Đến</span>
                                <span>
                                    26/04/2022
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-show-more" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Xem thêm">
                                    <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="">Xem chi tiết</a>
                                    <a class="dropdown-item" href="">Chỉnh sửa lịch làm việc</a>
                                    <a class="dropdown-item" href="">Xóa lịch làm việc</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Lịch làm việc hằng ngày</td>
                        <td>
                            <h5 class="shift-title">Ca Sáng</h5>
                            <div class="time mt-2">
                                <div class="label-blur">
                                    <i class="ti-timer"></i>
                                </div>
                                <span class="label label-inverse-primary">08:00 - 12:00</span>
                            </div>
                            <div class="weekday mt-2">
                                <div class="label-blur">
                                    <i class="ti-calendar"></i>
                                </div>
                                <span>
                                    <label class="label label-inverse-info">Thứ 2</label>
                                    <label class="label label-inverse-info">Thứ 3</label>
                                    <label class="label label-inverse-info">Thứ 4</label>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span class="label-blur">Từ</span>
                                <span>
                                    26/04/2022
                                </span>
                            </div>
                            <div class="mt-2">
                                <span class="label-blur">Đến</span>
                                <span>
                                    26/04/2022
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-show-more" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Xem thêm">
                                    <i class="ti-more-alt"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="">Xem chi tiết</a>
                                    <a class="dropdown-item" href="">Chỉnh sửa lịch làm việc</a>
                                    <a class="dropdown-item" href="">Xóa lịch làm việc</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm ca làm việc cho công ty</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tên lịch làm việc</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Ca làm việc</label>
                    <div v-for="(companyShift, index) in dataCompanyShifts" class="company-shift">
                        <div class="row mt-2 align-items-center">
                            <div class="col-11 row" style="margin: unset; grid-column-gap: 10px; align-items: center;">
                                <input type="text" class="form-control col-5" v-model="companyShift.shiftName" placeholder="Tên ca làm">
                                <date-picker v-model="companyShift.shiftTime" lang="vn" type="time" range placeholder="Select time" format="HH:mm" value-type="format"></date-picker>
                            </div>
                            <div class="col-1 btn-remote btn-remove" v-if="dataCompanyShifts.length > 1  && dataCompanyShifts.length != index+1" @click="removeCompanyShift(index)"><i class="ti-close"></i></div>
                            <div class="col-1 btn-remote btn-add" v-else @click="addCompanyShift"><i class="ti-plus"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Ngày áp dụng trong tuần</label>
                    <div class="box-day-name">
                        <span :class="dataCompanyDate.active ? 'item-day-name active' : 'item-day-name' " v-for="dataCompanyDate in dataCompanyDates" @click="chooseDateName(dataCompanyDate.id)">@{{ dataCompanyDate.name }}</span>
                    </div>
                </div>
                <div class="form-group interval-day">
                    <label class="col-form-label">Thời gian hiệu lực</label>
                    <date-picker v-model="intervalDay" lang="vn" range value-type="format" format="MM-DD-YYYY"></date-picker>
                    <input type="hidden" v-if="intervalDay" :value="intervalDay">
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy bỏ</button>
          <button type="button" class="btn btn-primary btn-sm" @click="handleSubmmitAddWorkShift()">Lưu lại</button>
        </div>
      </div>
    </div>
</div>