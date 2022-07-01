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
        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#location-modal"><i class="fa fa-plus"></i> Thêm</button>
        
    </div>
   </div>
   <div class="form-froup row">
    <div class="table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Chi Nhánh</th>
                    <th>Địa Chỉ</th>
                    <th>Chi Nhánh</th>
                    <th>Bán Kính</th>
                    <th>Vĩ Độ</th>
                    <th>Kinh Độ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt=1
                @endphp
                @foreach ($branch as $br)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $br->code_branch }}</td>
                        <td>{{ $br->address }}</td>
                        <td>{{ $br->name }}</td>
                        <td>{{ $br->radius }}</td>
                        <td>{{ $br->latitude }}</td>
                        <td>{{ $br->longtitude }}</td>
                    </tr>
                @endforeach
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
                    <label for="">Mã Chi Nhánh</label>
                    <input type="text" class="form-control" placeholder="Tên Gợi Nhớ VỊ Trí" name="code_branch" id="code_branch">
                    <span id="code_branch_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Chi Nhánh</label>
                    <input type="text" name="location-name" class="form-control" id="location_name" placeholder="Tên chi nhánh">
                    <span id="location_name_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Địa Chỉ"  name="address" id="address">
                    <span id="address_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Hotline</label>
                    <input type="number" class="form-control" placeholder="Hotline"  name="hotline" id="hotline">
                    <span id="hotline_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Vĩ Độ</label>
                    <input type="number" class="form-control" placeholder="Vĩ Độ"  name="latitude" id="latitude">
                    <span id="latitude_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Kinh Độ</label>
                    <input type="number" class="form-control" placeholder="Kinh Độ"  name="longtitude" id="longtitude">
                    <span id="longtitude_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Bán Kính</label>
                    <input type="number" class="form-control" value="100"  name="radius" id="radius">
                    <span id="radius_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Khoảng Cách Có thể chấm công từ vị trí đã thiết lập (mét) </label>
                    <label for="">Để xác thực được chính xác nhất, Camel khuyên dùng giá trị trong khoảng 100~200 mét </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect add-location-button" id="add-location-button" data-url="{{ route('checkin.add-location') }}">Thêm</button>
            </div>
        </div>
    </div>
</div>
</div>