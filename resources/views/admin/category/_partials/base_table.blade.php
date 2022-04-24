<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class={{ (Session::has('message.success') && session('id_new') && session('id_new') == $category->id ) ?'bg-green':'' }} >
                    <td>{{ $loop->index+1 }}</td>
                    <td>
                        <label class="label label-success">#{{ $category->id }}</label>
                        {{$category->name}}
                    </td>
                    <td>
                        <img src="@if ($category->image) {{asset('storage')}}/{{$category->image}} @else {{asset('frontend/image/no_image.png')}} @endif" alt="" width="80">
                    </td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" class="value-status" data-id="{{$category->id}}" @if ($category->status) checked @else @endif>
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        <a href="{{ route('show-form-update-category', ['id' => $category->id]) }}"><i class="ti-marker-alt"></i></a>
                        <button class="btn-delete" data-id="{{$category->id}}"><i class="ti-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            @if (!count($categories) > 0)
                <tr>
                    <td colspan="7" class="box_data_empty">
                        <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="paginate row justify-content-center">
    {{ $categories->links() }}
</div>
<div class="overlay-load">
    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
</div>