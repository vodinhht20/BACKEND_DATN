<div class="">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs default-tab tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link " data-toggle="tab" data-target="#type" aria-controls="type" aria-expanded="true" role="tab" @click="changeTabSub('timesheet_tab_wifi')" :class="{ active: current_tab_sub == 'timesheet_tab_wifi'}">Danh Sách WIFI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#deathline" aria-controls="deathline" aria-expanded="false" role="tab" @click="changeTabSub('timesheet_tab_location')" :class="{ active: current_tab_sub == 'timesheet_tab_location'}">Danh Sách Vị Trí</a>
        </li>
        
        
    </ul>
    <!-- Tab panes -->
    <div class="tabs card-block" style="width: 100%">
        <div class="tab_sub_custom" id="type" role="tabpanel" v-if="current_tab_sub == 'timesheet_tab_wifi'">
            @include('admin.checkin.wifilist')
        </div>
        <div class="tab_sub_custom" id="deathline" role="tabpanel" v-if="current_tab_sub == 'timesheet_tab_location'">
            @include('admin.checkin.locationlist')        
        </div>
        
    </div>
</div>