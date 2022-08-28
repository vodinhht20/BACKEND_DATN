<!-- Modal -->
<div class="modal fade modal_synchronized" id="modal_synchronized" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đồng bộ dữ liệu chấm công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overflow-modal scrollbar-right-custom row">
                    <div class="form-group col-lg-6">
                        <label for="recipient-name" class="col-form-label">Chọn file <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".xlsx, .xlsm, .xls, .xltx" id="inpFile" @change="($event) => {inputFile = $event?.target.files}">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="recipient-name" class="col-form-label">Lựa chọn tháng <span class="text-danger">*</span></label>
                        <input class="form-control" type="hidden" name="month" :value="inputMounthImport" placeholder="Lựa chọn tháng">
                        <date-picker v-model="inputMounthImport" type="month" value-type="YYYY-MM" format="MM-YYYY" placeholder="Select month" name="month"></date-picker>
                    </div>
                    <div class="col-12">
                        <p>Dữ liệu bạn tải lên sẽ đồng bộ với số công của nhân viên trong tháng trong hệ thống. Trường hợp có sự chênh lệch về số công thì sẽ lấy số công cao nhất của nhân viên đấy.
                        <br><a href="/template/template_import_timesheet.xlsx?v=1.0.1" class="text-primary">Download file mẫu</a></p>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_preview_import" @click="previewDataImport()" v-if="inputFile.length > 0 && inputMounthImport">Xem trước</button>
                        <button type="button" class="btn btn-secondary btn-sm ml-2" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal_synchronized" id="modal_preview_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1100px !important;">
        <div class="modal-content">
            <form enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dữ liệu chấm công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overflow-modal scrollbar-right-custom">
                    <div class="table-border-style">
                        <div class="table-responsive scrollbar-custom" style="width:100%;">
                            <table class="table align-middle-td" v-if="Object.keys(dataPreview).length > 0">
                                <thead>
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th v-for="(worktime, day) in Object.values(app.dataPreview)[0]">@{{ day }}</th>
                                    </th>
                                </thead>
                                <tbody>
                                    <tr v-for="(data, key) in dataPreview">
                                        <td>@{{ key }}</td>
                                        <td v-for="(worktime, day) in data">
                                            <div class="text-center" >
                                                <span>@{{ worktime['root'] }}</span>
                                                <i class="ti-arrow-right icon-theme" style="font-size: 12px; padding: 5px;" v-if="worktime['new'] > worktime['root']" title="Dữ liệu sẽ được cập nhật theo dữ liệu mới"></i>
                                                <i class="ti-split-v-alt icon-remove-danger" style="font-size: 12px; padding: 5px;" v-else title="Dữ liệu sẽ không đồng bộ"></i>
                                                <span style="color: #0ba70b;">@{{ worktime['new'] }}</span>
                                            </div>
                                         </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div v-else>
                                <img src="{{ asset('frontend/image/loading_crm.gif') }}" alt="" style=" width: 400px; display: block; margin: auto;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div v-if="recordNotExist.length > 0">Không tìm thấy dữ liệu nhân viên có mã: <label class="label label-inverse-danger" v-for="record in recordNotExist">@{{ record }}</label></div>
                    <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-primary btn-sm ml-2" @click="synchronized()" v-if="Object.keys(dataPreview).length > 0">Đồng bộ</button>
                        <button type="button" class="btn btn-secondary btn-sm ml-2" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>