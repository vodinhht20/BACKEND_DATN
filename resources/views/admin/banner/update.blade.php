@extends('admin.layouts.main')
@section('title')
    <title>Cập nhật banner</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>

    <style>
        .banner-info .image_area {
		  position: relative;
		}

		.banner-info img {
		  	display: block;
		  	max-width: 100%;
		}

		.banner-info .preview {
  			overflow: hidden;
  			width: 160px;
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.banner-info .modal-lg{
  			max-width: 1000px !important;
		}

		.banner-info .overlay {
		  position: absolute;
		  bottom: 10px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.banner-info .image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.banner-info .text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
    </style>
@endsection
@section('content')
    <div class="banner-info">
        <div class="card">
            <div class="card-header">
                <h5>Cập nhật banner</h5>
            </div>
            <div class="card-block">
                @include('admin.layouts.messages')
                <form method="POST" enctype="multipart/form-data" class="row" id="create-from-banner">
                    @csrf
                    <div class="col-6">
                        <div class="col-12 mb-2">
                            <label>Tên banner</label>
                            <input type="text" name="name" class="form-control" value="{{ $banner->name }}" placeholder="Nhập tên banner ...">
                        </div>
                        <div class="col-12 mb-2">
                            <label>Link sự kiện</label>
                            <input type="text" name="links" class="form-control" value="{{ $banner->links }}" placeholder="Chọn link sự kiện ...">
                        </div>
                        <div class="col-12 mb-2">
                            <label>Ngày bắt đầu</label>
                            <input type="date" name="from_at" value="{{ $banner->from_at }}" class="form-control">
                        </div>
                        <div class="col-12 mb-2">
                            <label>Ngày kết thúc</label>
                            <input type="date" name="to_at" value="{{ $banner->to_at }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="">
                            <label>Tải ảnh lên:</label>
                            <input type="file" class="form-control" id="upload_image">
                        </div>
                        <div class="mt-3">
                            <strong>Hình ảnh: </strong>
                            <img src="{{ asset("storage/$banner->image") }}" alt="" id="uploaded_image" style="margin: 0 auto; margin-top: 10px; border-radius: 10px;max-height: 200px;object-fit: cover;">
                            <input type="hidden" name="image" value="{{ $banner->image }}" id="base_path">
                        </div>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="modal-crop-image" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tùy chỉnh kích thước ảnh</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="crop" class="btn btn-primary">Cắt ảnh</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        var $modal = $('#modal-crop-image');
        var image = document.getElementById('sample_image');
        var cropper;

        $('#upload_image').change(function(event){
            var files = event.target.files;
            var done = function(url){
                image.src = url;
                $modal.modal('show');
            };

            if(files && files.length > 0)
            {
                reader = new FileReader();
                reader.onload = function(event)
                {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 645 / 245,
                viewMode: 3,
                preview:'.preview'
            });
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 645,
                height: 245
            });

            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var image = reader.result;
                    axios.post("{{ route('upload-image') }}", { image })
                    .then(({ data }) => {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data.full_path);
                        $('#base_path').val(data.base_path);
                    })
                    .catch(({response}) => {
                        alert("Không thể tùy chỉnh ảnh vào lúc này");
                    });
                };
            });
        });

    });

    const objData = {
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            from_at: "required",
            to_at: "required"
        },
        messages: {
            name: {
                required: `<span class="text-validate">Vui lòng nhập tên banner !</span>`,
                maxlength: `<span class="text-validate">Tên banner không quá 255 ký tự !</span>`
            },
            from_at: `<span class="text-validate">Vui lòng ngày bắt đầu !</span>`,
            to_at: `<span class="text-validate">Vui lòng chọn kết thúc !</span>`,
        }
    }
    validateForm("#create-from-banner", objData);
</script>
@endsection
