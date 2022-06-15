<div class="">
    <div class="main-search morphsearch-search open">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tên, địa chỉ vị trí bạn muốn tìm" style="width: 200px; background: transparent">
            <button style="background: none; border: none; margin-left: -30px " > <span class="input-group-append "><i class="ti-search input-group-text"></i></span></button>
           
        </div>
    </div>
   <div class="form-group row">
    <div class="col-sm-5">
        <p style="font-weight: 700">có ... Địa chỉ trong danh sách</p>
    </div>
    <div class="col-sm-6" style="width: 100%;text-align: right" >
        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#location-modal">Large</button>
        
    </div>
   </div>
   <div class="form-froup row">
    <div class="table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Vị Trí</th>
                    <th>Địa Chỉ</th>
                    <th>Chi Nhánh</th>
                    <th>Bán Kính</th>
                    <th>Vĩ Độ</th>
                    <th>Kinh Độ</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
       </div>
   </div>
   
   <div class="modal fade" id="location-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM MỚI Vị Trí</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tên Vị Trí</label>
                    <input type="text" class="form-control" placeholder="Tên Gợi Nhớ VỊ Trí" name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Chi Nhánh</label>
                    <select name="" class="form-control" id="">
                        <option value="">chi nhánh làm việc</option>
                        <option value="">chi nhánh làm việc</option>
                        <option value="">chi nhánh làm việc</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa Chỉ"  name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Vĩ Độ</label>
                    <input type="number" class="form-control" placeholder="Vĩ Độ"  name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Kinh Độ</label>
                    <input type="number" class="form-control" placeholder="Kinh Độ"  name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Bán Kính</label>
                    <input type="number" class="form-control" value="100"  name="" id="">
                </div>
                <div class="form-group">
                    <label for="">Khoảng Cách Có thể chấm công từ vị trí đã thiết lập (mét) </label>
                    <label for="">Để xác thực được chính xác nhất, Camel khuyên dùng giá trị trong khoảng 100~200 mét </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>