<div class="table-border-style mt-2">
    <div class="table-responsive scrollbar-custom" style="width:100%;">
        <table class="table align-middle-td">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã đơn</th>
                    <th>Loại đơn</th>
                    <th>Người tạo</th>
                    <th>Thời gian tạo</th>
                    <th>Thời gian áp dụng</th>
                    <th>Người duyệt đơn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>#002</td>
                    <td>
                        <p>Đơn nghỉ không lương</p>
                        <label for="" class="label bg-primary">Đang xử lý</label>
                    </td>
                    <td>
                        <p><b>Võ Văn Định</b></p>
                        <p>Phòng hành chính nhân sự</p>
                        <label for="" class="label label-inverse-info-border">HR Manager</label>
                    </td>
                    <td>
                        <b>22/07/2022</b>
                    </td>
                    <td>
                        <div>
                            <label for="">Bắt đầu nghỉ</label>
                            <p><b>23/07/2022</b></p>
                        </div>
                        <div>
                            <label for="">Kết thúc nghỉ</label>
                            <p><b>23/07/2022</b></p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <img src="https://technext.github.io/mega_able/assets/images/avatar-4.jpg" alt="" width="50">
                            <img src="https://technext.github.io/mega_able/assets/images/avatar-4.jpg" alt="" width="50">
                            <img src="https://technext.github.io/mega_able/assets/images/avatar-4.jpg" alt="" width="50">
                            <img src="https://technext.github.io/mega_able/assets/images/avatar-4.jpg" alt="" width="50">
                        </div>
                    </td>
                    <td>
                        <div class="mytooltip tooltip-effect-9">
                            <button class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-icon">
                                <i class="icofont icofont-eye-alt"></i>
                            </button>
                            <span class="tooltip-content3">Xem chi tiết</span>
                        </div>
                        <div class="mytooltip tooltip-effect-9 ml-2">
                            <button class="btn waves-effect waves-dark btn-success btn-outline-success btn-icon">
                                <i class="icofont icofont-check-circled"></i>
                            </button>
                            <span class="tooltip-content3">Duyệt nhanh</span>
                        </div>
                    </td>
                </tr>
                {{-- @if (count($singleTypes) == 0)
                    <tr>
                        <td colspan="6" class="box_data_empty">
                            <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                        </td>
                    </tr>
                @endif --}}
            </tbody>
        </table>
    </div>
    <div style="float: right;" class="pagination_cutomize">
        {{-- {{ $singleTypes->links() }} --}}
    </div>
</div>
