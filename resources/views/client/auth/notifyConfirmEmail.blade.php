@section('title')
    <title>Xác thực email</title>
@endsection
@extends('layouts.main')
@section('content')
<main class="notify-confirm-emailpage">
    <div class="box-wrap">
        <img src="{{asset('frontend')}}/image/verify-emai.svg" alt="">
        <p>Email xác thực tài khoản đã được gửi đến email <b>{{$email}}</b> của bạn.</p>
        <p>( Vui lòng kiểm tra hộp thư đến hoặc spam trong email của bạn )</p>
        <a href="{{ route('login') }}" class="btn-re-send-mail"><i class="fas fa-paper-plane"></i>Quay lại</a>
    </div>
    
</main>
@endsection