<div class="">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs default-tab tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link " data-toggle="tab" data-target="#type" aria-controls="type" aria-expanded="true" role="tab" >Danh Sách WIFI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#deathline" aria-controls="deathline" aria-expanded="false" role="tab" >Danh Sách Vị Trí</a>
        </li>
        
        
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs card-block" style="width: 100%">
        <div class="tab-pane active" id="type" role="tabpanel">
            @include('admin.checkin.wifilist')
        </div>
        <div class="tab-pane" id="deathline" role="tabpanel">
            @include('admin.checkin.locationlist')        
        </div>
        
    </div>
</div>