<style>
    table {
        width: 80%;
        margin: auto;
        height: 55%;
        font-family: Verdana,sans-serif;
        border-color: #fff;
    }
    table th{
        background-color: #001529;
        color: #fff;
        height: 3vw;
        font-weight: bold;
    }
    h1{
        text-align: center;
        font-family: Verdana,sans-serif;
    }
</style>
@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/datepicker.css">
@endsection
@section('content')
<h1>Quản Lý Công</h1>
<div>
    <table border="1" class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">Mã NV</th>
                <th scope="col">Tên nhân viên</th>
                <th scope="col">Chức danh</th>
                <th scope="col">Biểu đồ</th>
                <th scope="col">Trễ giờ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">SMB.01.02</td>
                <td>Nguyễn Quang Nghĩa</td>
                <td>Nhân Viên DEV</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">MA002</td>
                <td>Lê Thị Bích Vân</td>
                <td>Nhân Viên Hành Chính</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">KD004</td>
                <td>Phạm Như Quỳnh</td>
                <td>Nhân Viên Phân Tích</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">HC001</td>
                <td>Trần Công Bằng</td>
                <td>Nhân Vien Kinh Doanh</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">MA008</td>
                <td>Tiến Bịp</td>
                <td>Nhân Viên Kinh Doanh</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row">DEV004</td>
                <td>Định Mãi Đỉnh</td>
                <td>Nhân Viên Hành Chính</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
