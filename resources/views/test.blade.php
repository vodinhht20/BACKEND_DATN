@extends('layouts.main')
@section('content')
<h3>Up load file lên drive</h3>
<form method="POST"  id="form-upload" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
      <img src="https://docs.google.com/uc?id=1W5GndP2oU2fLVJv424uh3s92MpVzr0xV" alt="">
      <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1" > {{-- accept="video/mp4,video/x-m4v,video/avi,video/msvideo,video/x-msvideo,video/x-ms-wmv,video/webm" --}}
    </div>
    <div id="box_load">
    </div>
    <button class="btn btn-primary">Tải file</button>
</form>
@endsection