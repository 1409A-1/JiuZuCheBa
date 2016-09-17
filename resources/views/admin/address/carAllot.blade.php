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
                            <h4>服务点车辆分配</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right" style="margin-right: 360px">
                            <a href="carServerList" class="btn-flat success new-product" >服务点车辆信息列表</a>
                        </div>
                    </div>
                    <div class="row-fluid" style="width:600px; height:500px">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <table class="table table-hover" style="height:400px; margin-left: 30px">
                                <tr>
                                    <td>请选择服务点：</td>
                                    <td style="width:470px">
                                        <select name="server_id" style="height:30px">
                                            <option value="0" required>请选择</option>
                                            @foreach($server as $key => $val)
                                            <option value="{{$val['server_id']}}">{{$val['city_name']."|".$val['district']."|".$val['server_name']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>请选择车辆:</td>
                                    <td>
                                        <select name="car_id" style="height:30px">
                                            <option value="0" required>请选择</option>
                                            @foreach($carInfo as $key => $val)
                                            <option value="{{$val['car_id']}}">{{$val['car_name']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆数量：</td>
                                    <td>
                                        <input type="text" name="number" required="" style="width:60px;"/> <span>辆 </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <input type="submit" class="btn-glow primary" style="margin-left:180px" value="确认添加" />
                                    <span>OR</span>
                                    <input type="reset" value="放弃" class="reset" />
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
                <!-- end products table -->
                <!-- orders table -->
                <!-- end users table -->
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
<script>
    $(function(){
        //服务点选择验证
        $("select[name=server_id]").change(function(){
            //alert(1);
            if ($(this).val() == 0) {
                $(this).next().remove();
                $(this).after("<font style='color:red'>请选择服务点</font>");
            } else {
                $(this).next().remove();
                car_id = $("select[name=car_id]").val();
                //不能提交重复信息
                if (car_id != 0) {
                    $.ajax({
                        type: 'post',
                        url: 'carUnique',
                        async: false,
                        data: {server_id: $(this).val(), car_id: car_id, _token:$("input[name=_token]").val()},
                        success:function(msg){
                            if (msg=="no") {
                            $("select[name=car_id]").next().remove();
                            $("select[name=car_id]").after("<font style='color:red'>该车辆信息已存在</font>");
                            }
                        }  
                    })
                }
            }
        })
        //车辆信息验证
        $("select[name=car_id]").change(function(){
            she=$(this);
            if ($(this).val() == 0) {
                $(this).next().remove();
                $(this).after("<font style='color:red'>请选择车辆信息</font>");
            } else {
                $(this).next().remove();
                server_id = $("select[name=server_id]").val();
                //不能提交重复信息
                if (server_id != 0) {
                    $.ajax({
                        type: 'post',
                        url: 'carUnique',
                        async: false,
                        data: {server_id: server_id, car_id:$(this).val(), _token:$("input[name=_token]").val()},
                        success:function(msg){
                            if (msg=="no") {
                            she.next().remove();
                            she.after("<font style='color:red'>该车辆信息已存在</font>");
                            }
                        }  
                    })
                }
            }
        })
        //车辆数量验证
        $("input[name=number]").blur(function(){
            reg = /^\d+$/;
            if ($(this).val() == '') {
                $(this).nextAll('font').remove();
                $(this).next().after("<font style='color:red'>请输入车辆数量</font>");
            } else {
                if (reg.test($(this).val())) {
                    $(this).nextAll('font').remove();
                } else {
                    $(this).nextAll('font').remove();
                    $(this).next().after("<font style='color:red'>请输入车辆数量</font>");
                }
            }
        })
        //Ajax提交
        $("input[type=submit]").click(function(){
            $("select[name=server_id]").trigger("change");
            $("select[name=car_id]").trigger("change");
            $("input[name=number]").trigger("blur");
            if ($(".table font").length==0) {
                $.post("carServerAdd",{server_id: $("select[name=server_id]").val(), car_id: $("select[name=car_id]").val(), number: $("input[name=number]").val(), _token:$("input[name=_token]").val()}, function(msg){
                    if (msg=='success'){
                        alert("添加成功");
                    }
                })
            }
        })
        //重置按钮
        $("input[type=reset]").click(function(){
            $("select[name=server_id]").val(0);
            $("select[name=car_id]").val(0);
            $("input[name=number]").val('');
            $(".table font").remove();
         })

        she=$("a[href='http://www.test.com/JiuZuCheBa/public/carServer']");
        she.parent().parents('li').siblings(".active").children('.pointer').remove();
        she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
        she.parent().parents('li').siblings(".active").removeClass("active");
        she.addClass("active");
        she.closest('ul').addClass("active");
        she.parent().parents("li").addClass("active");
        she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

    })
</script>
