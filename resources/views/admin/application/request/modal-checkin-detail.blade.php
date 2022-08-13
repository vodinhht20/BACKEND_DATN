<!-- Modal -->
<div class="modal fade modal_synchronized" id="modal_checkin_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết chấm công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body overflow-modal scrollbar-right-custom row">
                    <div class="col-12">
                        <label class="">Địa chỉ IP: <label class="label label-inverse-primary" id="IP">0.0.0.0</label></label>
                        <label class="">Thời gian checkIn: <label class="label label-inverse-primary" id="checkinAt"></label></label>
                    </div>
                    <div class="col-12">
                        <label class="">Vị trí chấm công</label>
                        <div id="googleMap" style="width:100% !important; height:400px !important;" class=""></div>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="action_form" style="display: flex; align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn btn-secondary btn-sm ml-2" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>