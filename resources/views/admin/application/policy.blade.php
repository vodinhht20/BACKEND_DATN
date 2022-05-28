<div class="">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs default-tab " role="tablist">
        <li class="nav-item">
            <a class="nav-link " data-toggle="tab" data-target="#type2" aria-controls="type" aria-expanded="true" role="tab" >Danh Sách Các Loại Đơn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#deathline2" aria-controls="deathline" aria-expanded="false" role="tab" >Thiết Lập Hạn Chốt Đơn</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#dafuk2" aria-controls="dafuk" aria-expanded="false" role="tab" >Thiết lập hạn chốt đơn OT</a>
        </li>
        
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs card-block">
        <div class="tab-pane " id="type2" role="tabpanel">
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
        <div class="tab-pane" id="deathline2" role="tabpanel">
            <div class="card">
                <div class="card-header">
                    <h5>Hạn Chốt Đơn</h5>
                </div>
                <div class="card-block">
                    <p>Hạn chốt đơn vào 3 ngày chốt công</p>
                    <br>
                    <span>cài đặt ngày chốt công tại <a href="">đây</a></span>
                    <br>
                    <form action="">
                        <br>
                        <input type="number">
                        <br>
                        <hr>
                        <br>
                        <input type="submit" name="" id="">
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="dafuk2" role="tabpanel">
           <div class="card">
               <div class="card-header">
                   <h5>Hạn Chốt Đơn OT</h5>
               </div>
               <div class="card-block">
                   <span>Chỉ Cho Phép duyệt đơn sau ngày đăng ký OT thực tế </span>
                   <form action="">
                       <br>
                       <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                      </label>
                      <br>
                      <hr>
                      <br>
                      <input type="submit" name="" id="">

                   </form>
               </div>
               
           </div>
        </div>
        
    </div>
</div>
