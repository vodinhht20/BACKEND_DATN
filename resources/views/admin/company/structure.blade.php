@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/structure.css">
@endsection
@section('header-page')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Quản lý công ty</h5>
                        <p class="m-b-0">Quản lý công ty của bạn</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Công ty</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    
    <div class="structure" translate="no">
        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.info') }}" role="tab" aria-expanded="false">
                    <i class="ti-layout-media-overlay"></i><br>
                    Thông tin <br> công ty</a>
            </li>
            <li class="nav-item btn-item">
                <a class="nav-link" href="{{ route('company.branchs') }}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Hệ thống <br> chi nhánh</a>
            </li>
            <li class="nav-item btn-item active">
                <a class="nav-link" href="{{ route('company.structure') }}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Cơ cấu <br> tổ chức</a>
            </li>
        </ul>
        <div class="treeview js-treeview">
            <ul>
                <li>
                    <div class="treeview__level" data-level="A">
                        <span class="level-title">Bịp</span>
                        <div class="treeview__level-btns">
                            <div class="btn btn-default btn-sm level-add"><span class="fa fa-times text-danger"></span>
                            </div>
                            <div class="btn btn-default btn-sm level-remove in"><span
                                    class="fa fa-trash text-danger"></span></div>
                            <div class="btn btn-default btn-sm level-same in"><span>Thêm bịp cấp ngang bằng</span></div>
                            <div class="btn btn-default btn-sm level-sub in"><span>Thêm bịp cấp thấp</span></div>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="treeview__level" data-level="B">
                                <span class="level-title">Bịp Bịp</span>
                                <div class="treeview__level-btns">
                                    <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                                    <div class="btn btn-default btn-sm level-remove"><span
                                            class="fa fa-trash text-danger"></span></div>
                                    <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                    <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span></div>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="treeview__level" data-level="C">
                                        <span class="level-title">Bịp Bịp Bịp</span>
                                        <div class="treeview__level-btns">
                                            <div class="btn btn-default btn-sm level-add"><span
                                                    class="fa fa-plus"></span></div>
                                            <div class="btn btn-default btn-sm level-remove"><span
                                                    class="fa fa-trash text-danger"></span></div>
                                            <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                            <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span></div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="treeview__level" data-level="D">
                                                <span class="level-title">Bịp Bịp Bịp Bịp</span>
                                                <div class="treeview__level-btns">
                                                    <div class="btn btn-default btn-sm level-add"><span
                                                            class="fa fa-plus"></span></div>
                                                    <div class="btn btn-default btn-sm level-remove"><span
                                                            class="fa fa-trash text-danger"></span></div>
                                                    <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                                    <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="treeview__level" data-level="C">
                                        <span class="level-title">Bịp Bịp Bịp</span>
                                        <div class="treeview__level-btns">
                                            <div class="btn btn-default btn-sm level-add"><span
                                                    class="fa fa-plus"></span></div>
                                            <div class="btn btn-default btn-sm level-remove"><span
                                                    class="fa fa-trash text-danger"></span></div>
                                            <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                            <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span></div>
                                        </div>
                                    </div>
                                    <ul>
                                    </ul>
                                </li>
                                <li>
                                    <div class="treeview__level" data-level="C">
                                        <span class="level-title">Bịp Bịp Bịp</span>
                                        <div class="treeview__level-btns">
                                            <div class="btn btn-default btn-sm level-add"><span
                                                    class="fa fa-plus"></span></div>
                                            <div class="btn btn-default btn-sm level-remove"><span
                                                    class="fa fa-trash text-danger"></span></div>
                                            <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                            <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span></div>
                                        </div>
                                    </div>
                                    <ul>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="treeview__level" data-level="B">
                                <span class="level-title">Bịp Bịp</span>
                                <div class="treeview__level-btns">
                                    <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                                    <div class="btn btn-default btn-sm level-remove"><span
                                            class="fa fa-trash text-danger"></span></div>
                                    <div class="btn btn-default btn-sm level-same"><span>Thêm bịp cấp ngang bằng</span></div>
                                    <div class="btn btn-default btn-sm level-sub"><span>Thêm bịp cấp thấp</span></div>
                                </div>
                            </div>
                            <ul>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <template id="levelMarkup">
            <li>
                <div class="treeview__level" data-level="A">
                    <span class="level-title">Thêm</span>
                    <div class="treeview__level-btns">
                        <div class="btn btn-default btn-sm level-add"><span class="fa fa-plus"></span></div>
                        <div class="btn btn-default btn-sm level-remove"><span class="fa fa-trash text-danger"></span></div>
                        <div class="btn btn-default btn-sm level-same"><span>Thêm Bịp cấp ngang bằng</span></div>
                        <div class="btn btn-default btn-sm level-sub"><span>Thêm Bịp cấp thấp</span></div>
                    </div>
                </div>
                <ul>
                </ul>
            </li>
        </template>
    </div>
@endsection

<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script id="rendered-js">
    $(function() {
        let treeview = {
            resetBtnToggle: function() {
                $(".js-treeview").
                find(".level-add").
                find("span").
                removeClass().
                addClass("fa fa-plus");
                $(".js-treeview").
                find(".level-add").
                siblings().
                removeClass("in");
            },
            addSameLevel: function(target) {
                let ulElm = target.closest("ul");
                let sameLevelCodeASCII = target.
                closest("[data-level]").
                attr("data-level").
                charCodeAt(0);
                ulElm.append($("#levelMarkup").html());
                ulElm.
                children("li:last-child").
                find("[data-level]").
                attr("data-level", String.fromCharCode(sameLevelCodeASCII));
            },
            addSubLevel: function(target) {
                let liElm = target.closest("li");
                let nextLevelCodeASCII = liElm.find("[data-level]").attr("data-level").charCodeAt(0) +
                    1;
                liElm.children("ul").append($("#levelMarkup").html());
                liElm.children("ul").find("[data-level]").
                attr("data-level", String.fromCharCode(nextLevelCodeASCII));
            },
            removeLevel: function(target) {
                target.closest("li").remove();

            }
        };
        // Treeview Functions
        $(".js-treeview").on("click", ".level-add", function() {
            $(this).find("span").toggleClass("fa-plus").toggleClass("fa-times text-danger");
            $(this).siblings().toggleClass("in");
        });

        // Add same level
        $(".js-treeview").on("click", ".level-same", function() {
            treeview.addSameLevel($(this));
            treeview.resetBtnToggle();
        });

        // Add sub level
        $(".js-treeview").on("click", ".level-sub", function() {
            treeview.addSubLevel($(this));
            treeview.resetBtnToggle();
        });
        // Remove Level
        $(".js-treeview").on("click", ".level-remove", function() {
            treeview.removeLevel($(this));
        });

        // Selected Level
        $(".js-treeview").on("click", ".level-title", function() {
            let isSelected = $(this).closest("[data-level]").hasClass("selected");
            !isSelected && $(this).closest(".js-treeview").find("[data-level]").removeClass("selected");
            $(this).closest("[data-level]").toggleClass("selected");
        });
    });
    //# sourceURL=pen.js
</script>
<script src="https://cpwebassets.codepen.io/assets/editor/iframe/iframeRefreshCSS-4793b73c6332f7f14a9b6bba5d5e62748e9d1bd0b5c52d7af6376f3d1c625d7e.js"></script>
