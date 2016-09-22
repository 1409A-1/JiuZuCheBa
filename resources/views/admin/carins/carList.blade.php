<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="{{asset('admin')}}/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="{{asset('admin')}}/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/icons.css" />

    <!-- libraries -->
    <link href="{{asset('admin')}}/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/tables.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <!-- navbar -->
    @include('common.admin_header')
    <!-- end navbar -->

    <!-- sidebar -->
    @include('common.admin_left')
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->

        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in {{asset('admin')}}/js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>车辆列表</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat success new-product" href="{{ url('carIns') }}">+ 添加车辆</a>
                        </div>
                            <h5 style="float:left;margin-top: 4px;">车辆搜索：</h5>
                            <div class="ui-select">
                                <select class="carType" id="car1">
                                    <option value="0">请选择车辆型号</option>
                                    @foreach($cart as $k => $v)
                                        <option value="{{ $v['type_id'] }}">{{ $v['type_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ui-select">
                                <select class="carType" id="car2">
                                    <option value="0">请选择品牌</option>
                                    @foreach($carb as $k => $v)
                                        <option value="{{ $v['brand_id'] }}">{{ $v['brand_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <script src="{{asset('admin')}}/js/js.js"></script>
                    <script>
                        $(function(){
                            $("#ins").click(function(){
                                location.href='model_add';
                            });
                        });
                    </script>
                    <div class="row-fluid" style="width:100%;" id="look">
                        <table class="table" id="look">
                            <tr>
                                <th>车辆名字</th>
                                <th>车辆图片</th>
                                <th>车辆数量详情</th>
                                <th>车辆类型</th>
                                <th>车辆品牌</th>
                                <th>车辆单日价格</th>
                                <th>操作</th>
                            </tr>
                            @foreach($data as $k => $v)
                            <tr>
                                <td>{{ $v['car_name'] }}</td>
                                <td><a href="{{ $v['car_img'] }}" target="_Blank"><img src="{{ $v['car_img'] }}" alt="" width="50" height="50"/></a></td>
                                <td>总数量:{{ $v['car_number'] }}&nbsp;&nbsp;&nbsp;&nbsp;未分配车辆:{{ $v['num'] or $v['car_number'] }}</td>
                                <td>{{ $v['type_name'] }}</td>
                                <td>{{ $v['brand_name'] }}</td>
                                <td>{{ $v['car_price'] }}</td>
                                <td>
                                    <a href="{{url('carDel')}}/{{ $v['car_id'] }}">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <!--三级联动-->
                <script>
                    $(function(){
                        $(".carType").change(function(){
                            var type_id = $("#car1").val();
                            var brand_id = $("#car2").val();
                                $.getJSON("{{ url('carSel') }}",{type_id:type_id,brand_id:brand_id},function(msg){
                                        str = "<table class=\"table\"><tr><th>车辆名字</th><th></th><th>车辆数量详情</th><th>车辆品牌</th><th>车辆类型</th>"+
                                             "<th>车辆单日价格</th><th>操作</th></tr>";
                                        $.each(msg,function(i,v){
                                            str +="<tr>" +
                                            "<td>"+msg[i].car_name+"</td>" +
                                            "<td><img src='"+msg[i].car_img+"' width='50' height=\"50\"/></td>" +
                                            "<td></td>" +
                                            "<td>"+msg[i].type_name+"</td>" +
                                            "<td>"+msg[i].brand_name+"</td>" +
                                            "<td>"+msg[i].car_price+"</td>" +
                                            "<td><a href='carDel/"+msg[i].car_id+"'>删除</a></td>" +
                                            "</tr>"
                                        });
                                        $("#look").html(str);
                                    }
                                );
                        });
                        $("#car_brand").change(function(){
                            var type_id = $("#carType").val();
                            var brand_id = $(this).val();
                            alert(type_id);
                            alert(brand_id);
                        });
                    });
                       $(function(){
                          she=$("a[href='{{ url('carList') }}']");
                          she.parent().parents('li').siblings(".active").children('.pointer').remove();
                          she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
                          she.parent().parents('li').siblings(".active").removeClass("active");
                          she.addClass("active");
                          she.closest('ul').addClass("active");
                          she.parent().parents("li").addClass("active");
                          she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
                       });
                </script>
                <!-- orders table -->
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
