
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
    <div class="tab-content tabs card-block">
        <div class="tab-pane active" id="type" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5>Zero Configuration</h5>
                    <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td> <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                      </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td><label class="switch">
                                        <input type="checkbox">
                                        <span class="slider round"></span>
                                      </label>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="deathline" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5>Hạn Chốt Đơn</h5>
                </div>
                <div class="card-block">
                    
                    <form action="">
                        <div class="form-group">
                            <p>Hạn chốt đơn vào 3 ngày chốt công</p>
                        </div>
                        <div class="form-group">
                            <label for="">cài đặt ngày chốt công tại <a href="">đây</a></label>
                        </div>
                        <div class="form-group">
                            <label for="">Số ngày sau ngày chốt công</label>
                            <input type="number" class="form-control">
                        </div>
                        <hr>
                        <div class="form-footer" style="text-align: end">
                            <input type="submit" value="Lưu" class="btn btn-info" name="" id="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="dafuk" role="tabpanel">
           <div class="card">
               <div class="card-header">
                   <h5>Hạn Chốt Đơn OT</h5>
               </div>
               <div class="card-block">
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
        
    </div>
</div>
