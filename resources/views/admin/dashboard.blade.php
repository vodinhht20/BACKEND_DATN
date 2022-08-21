@extends('admin.layouts.main')
@section('title')
    <title>Dashboard</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Thống kê</h5>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    @hasanyrole("admin|human_resource")
    <!-- task, page, download counter  start -->
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-purple">{{@$countEmployee}}</h4>
                        <h6 class="text-muted m-b-0">Nhân sự</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-user f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-purple">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tổng số nhân sự</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-green">{{@$countBranch}}</h4>
                        <h6 class="text-muted m-b-0">Chi nhánh</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-file-text-o f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-green">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tổng số chi nhánh</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-red">{{@$countDepartment}}</h4>
                        <h6 class="text-muted m-b-0">Phòng ban</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-calendar-check-o f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Số lượng phòng ban</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- task, page, download counter  end -->

    <!--  sale analytics start -->
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Thống kê nhân sự theo chi nhánh</h5>
            </div>
            <div class="card-block">
                <div id="chartdiv"></div>
            </div>
        </div>
    </div>
    <!--  sale analytics end -->
    @else
    <div class="col-xl-12 col-md-12">
        <div class="card">
            <div class="card-block">
                <div class="align-items-center">
                    <h6 class="text-muted m-b-0 text-center" style="font-size: 32px; padding: 20px;">
                        Xin chào {{Auth::user()->fullname}} , chúc bạn một ngày làm việc hiệu quả! 😉</h6>
                </div>
            </div>
        </div>
    </div>
    @endhasanyrole
</div>
@endsection

@section('page-script')
<script type="text/javascript" src="{{asset('assets')}}/pages/dashboard/custom-dashboard.js"></script>
<script>
    am5.ready(function() {
    var root = am5.Root.new("chartdiv");
    root.setThemes([
      am5themes_Animated.new(root)
    ]);
    
    var data = {!! @json_encode($chartEmployeesBranch) !!};
    console.log(data);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
      am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        paddingBottom: 50,
        paddingTop: 40
      })
    );
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    
    var xRenderer = am5xy.AxisRendererX.new(root, {});
    xRenderer.grid.template.set("visible", false);
    
    var xAxis = chart.xAxes.push(
      am5xy.CategoryAxis.new(root, {
        paddingTop:40,
        categoryField: "name",
        renderer: xRenderer
      })
    );
    
    
    var yRenderer = am5xy.AxisRendererY.new(root, {});
    yRenderer.grid.template.set("strokeDasharray", [3]);
    
    var yAxis = chart.yAxes.push(
      am5xy.ValueAxis.new(root, {
        min: 0,
        renderer: yRenderer
      })
    );
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
      am5xy.ColumnSeries.new(root, {
        name: "Income",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "steps",
        categoryXField: "name",
        sequencedInterpolation: true,
        calculateAggregates: true,
        maskBullets: false,
        tooltip: am5.Tooltip.new(root, {
          dy: -30,
          pointerOrientation: "vertical",
          labelText: "{valueY}"
        })
      })
    );
    
    series.columns.template.setAll({
      strokeOpacity: 0,
      cornerRadiusBR: 10,
      cornerRadiusTR: 10,
      cornerRadiusBL: 10,
      cornerRadiusTL: 10,
      maxWidth: 50,
      fillOpacity: 0.8
    });
    
    var currentlyHovered;
    
    series.columns.template.events.on("pointerover", function (e) {
      handleHover(e.target.dataItem);
    });
    
    series.columns.template.events.on("pointerout", function (e) {
      handleOut();
    });
    
    function handleHover(dataItem) {
      if (dataItem && currentlyHovered != dataItem) {
        handleOut();
        currentlyHovered = dataItem;
        var bullet = dataItem.bullets[0];
        bullet.animate({
          key: "locationY",
          to: 1,
          duration: 600,
          easing: am5.ease.out(am5.ease.cubic)
        });
      }
    }
    
    function handleOut() {
      if (currentlyHovered) {
        var bullet = currentlyHovered.bullets[0];
        bullet.animate({
          key: "locationY",
          to: 0,
          duration: 600,
          easing: am5.ease.out(am5.ease.cubic)
        });
      }
    }
    
    var circleTemplate = am5.Template.new({});
    
    series.bullets.push(function (root, series, dataItem) {
      var bulletContainer = am5.Container.new(root, {});
      var circle = bulletContainer.children.push(
        am5.Circle.new(
          root,
          {
            radius: 34
          },
          circleTemplate
        )
      );
    
      var maskCircle = bulletContainer.children.push(
        am5.Circle.new(root, { radius: 27 })
      );
    
      // only containers can be masked, so we add image to another container
      var imageContainer = bulletContainer.children.push(
        am5.Container.new(root, {
          mask: maskCircle
        })
      );
    
      var image = imageContainer.children.push(
        am5.Picture.new(root, {
          templateField: "pictureSettings",
          centerX: am5.p50,
          centerY: am5.p50,
          width: 60,
          height: 60
        })
      );
    
      return am5.Bullet.new(root, {
        locationY: 0,
        sprite: bulletContainer
      });
    });
    
    // heatrule
    series.set("heatRules", [
      {
        dataField: "valueY",
        min: am5.color(0xe5dc36),
        max: am5.color(0x5faa46),
        target: series.columns.template,
        key: "fill"
      },
      {
        dataField: "valueY",
        min: am5.color(0xe5dc36),
        max: am5.color(0x5faa46),
        target: circleTemplate,
        key: "fill"
      }
    ]);
    
    series.data.setAll(data);
    xAxis.data.setAll(data);
    
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineX.set("visible", false);
    cursor.lineY.set("visible", false);
    
    cursor.events.on("cursormoved", function () {
      var dataItem = series.get("tooltip").dataItem;
      if (dataItem) {
        handleHover(dataItem);
      } else {
        handleOut();
      }
    });
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear();
    chart.appear(1000, 100);
    
    }); // end am5.ready()
    </script>
@endsection
