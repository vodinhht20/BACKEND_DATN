<div class="">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs default-tab tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
        </li>
        
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs card-block">
        <div class="tab-pane active" id="home1" role="tabpanel">
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
        <div class="tab-pane" id="profile1" role="tabpanel">
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
        <div class="tab-pane" id="messages1" role="tabpanel">
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