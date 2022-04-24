@if (Session::has('message.error'))
    <div class="card-block danger-breadcrumb">
        <div class="breadcrumb-header">
            <h5>Đã có lỗi xảy ra !</h5>
            <span>{{ Session::get('message.error') }}</span>
        </div>
    </div>
@endif
@if (Session::has('message.success'))
    <div class="card-block success-breadcrumb">
        <div class="breadcrumb-header">
            <h5>Thành công !</h5>
            <span>{{ Session::get('message.success') }}</span>
        </div>
    </div>
@endif