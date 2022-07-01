<div class="">
    <div class="main-search morphsearch-search open">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Enter Keyword" style="width: 200px; background: transparent">
            <button style="background: none; border: none; margin-left: -30px " > <span class="input-group-append "><i class="ti-search input-group-text"></i></span></button>
           
        </div>
    </div>
   <div class="form-group row">
    <div class="col-sm-5">
        <select name="" id="" class="form-control">
            <option value="2">Trạng Thái Hoạt Động</option>
            <option value="1">On</option>
            <option value="0">Off</option>
        </select>
    </div>
    </div>
    <div class="col-sm-6" style="width: 100%;text-align: right" >
        {{-- <button type="button" id="add-wifi-btn"  class="btn btn-primary waves-effect add-wifi-btn" data-toggle="modal" data-target="#add-wifi-modal"> <i class="fa fa-plus"></i> Thêm</button>curent_ip --}}
        <button type="button" id="add-wifi-btn"  class="btn btn-primary add-wifi-btn" data-toggle="modal" data-target="#add-wifi-modal" > <i class="fa fa-plus"></i> Thêm</button>
        
    </div>
   </div>
   <div class="form-froup row">
    <div class="table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên WIFI</th>
                    <th>IP</th>
                    <th>Trạng Thái Hoạt Động</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt=1;
                @endphp
                @foreach ($wifi as $wf)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $wf->name }}</td>
                        <td>{{ $wf->wifi_ip }}</td>
                        <td>@if ($wf->status == 1)
                            <p style="color: green" >On</p>
                            @else
                            <p style="color: red">Off</p> 
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div  class=" dataTables_pager" style="margin-top: 30px">

            {!!$wifi->links()!!}

        </div>
       </div>
   </div>
   
   <div class="modal fade" class="add-wifi-modal" id="add-wifi-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM MỚI WIFI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tên Wifi</label>
                    <input type="text" class="form-control"  name="name" id="name">
                    <span id="name_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">IP</label>
                    <input type="text" class="form-control"  name="wifi-ip" id="wifi-ip">
                    <span id="ip_error_msg" class="text text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Branch</label>
                    <select name="branch" class="form-control" id="branch">
                        @foreach ($branch as $br)
                            <option value="{{ $br->id }}">{{ $br->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">ip hiện tại của bạn là : <span id="the_current_ip">{{ $current_ip }}</span><span class="btn " id="current_ip_button" style="background: none ; border: none" >Dùng IP này</span></label>
                    <hr>
                    <label for="">Trạng thái hoạt động</label>
                    <br>
                    <input type="radio" name="check-status" id="check-status-on" value="1" > <label for="">On</label>
                    <br>
                    <input type="radio" name="check-status" id="check-status-off" value="0"> <label for="">Off</label>
                    <br>
                    <span id="status_error_msg" class="text text-danger"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" id="the-add-wifi-button" data-url="{{ route('checkin.add-wifi') }}" class="btn btn-primary waves-effect waves-light ">Thêm</button>
            </div>
        </div>
    </div>
</div>
</div>

