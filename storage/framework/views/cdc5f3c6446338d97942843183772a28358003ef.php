<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="<?php echo e(asset('admin')); ?>/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo e(asset('admin')); ?>/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo e(asset('admin')); ?>/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin')); ?>/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin')); ?>/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin')); ?>/css/icons.css" />

    <!-- libraries -->
    <link href="<?php echo e(asset('admin')); ?>/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/css/compiled/tables.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <!-- navbar -->
    <?php echo $__env->make('common.admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end navbar -->

    <!-- sidebar -->
    <?php echo $__env->make('common.admin_left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->

        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in <?php echo e(asset('admin')); ?>/js/theme.js -->
                <div class="table-wrapper products-table section"  >
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>服务点添加</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block" >
                        <div class="pull-right">

                        </div>
                    </div>
                    <div class="row-fluid" style="width:500px;float:left;">
                        <form action="<?php echo e(url('addServer')); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <table class="table table-hover" >
                                <tr>
                                    <td>服务点名称:</td>
                                    <td><input type="text" required="" name="server_name"/></td>
                                    <input type="hidden" id="city_name" name="city_name"/>
                                </tr>
                                <tr>
                                    <td>省/市:</td>
                                    <td>
                                        <select name="one" id="address_one" style="height: 30px" class="map">
                                            <option value="0">请选择...</option>
                                            <?php foreach($data as $k => $v){?>
                                            <option id="address" value="<?php echo $v['address_id']?>" s="<?php echo e($v['address_name']); ?>"><?php echo $v['address_name']?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>县/区:</td>
                                    <td>
                                        <select name="two" id="address_two" style="height: 30px" class="map">
                                            <option value="0">请选择...
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>服务点地址：</td>
                                    <td>
                                        <textarea required="required" name="street" id="add" cols="10" rows="3"></textarea>
                                        <span id=""></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>交通路线：</td>
                                    <td>
                                        <textarea required="required" name="traffic_line" id="add" cols="10" rows="3"></textarea>
                                        <span id=""></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>输入坐标：</td>
                                    <td>
                                        <input type="text" name="coordinate1" required="required" style="width: 83px;"/>&nbsp;，
                                        <input type="text" name="coordinate2" required="required" style="width: 83px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-info" style="float: right;" value="添加服务点"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="row-fluid" style="width: 50%;height: 400px;float:right;">
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
                        <style type="text/css">
                            body, html,#allmap {width: 100%;height: 100%; margin:0;font-family:"微软雅黑";}
                        </style>
                        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=4Illl9vffDsxg3qPNzDIm6wrtsXMNWP2"></script>
                        <div id="allmap"></div>
                    </div>
                </div>
                <!-- end products table -->
                <script src="<?php echo e(asset('admin')); ?>/js/js.js"></script>
                <!--百度地图接口-->
                <script type="text/javascript">
                    var map = new BMap.Map("allmap");  // 创建Map实例
                    var geoc = new BMap.Geocoder();
                    var s = '天安门';

                    // 页面加载时显示地图
                    $(function(){
                        map.centerAndZoom(s,15);
                    });

                    // 展示用户选择位置地图
                    $(".map").change(function(){
                        s_one = $("#address_one").find("option:selected").text();
                        s_two = $("#address_two").find("option:selected").text();
                        s = s_one + s_two;
                        $("#city_name").val(s_one);
                            // 百度地图API功能
                            map.centerAndZoom(s,15);      // 初始化地图,用城市名设置地图中心点
                            setTimeout(function(){
                                map.setZoom(14);
                            }, 2000);  //2秒后放大到14级
                            //单击获取点击的经纬度
                            map.addEventListener("click",function(e){
                                $("input[name=coordinate1]").val(e.point.lng);
                                $("input[name=coordinate2]").val(e.point.lat);
                            });
                            map.enableScrollWheelZoom(true);
                            map.addEventListener("click", function(e){
                            var pt = e.point;
                            geoc.getLocation(pt, function(rs){
                                var addComp = rs.addressComponents;
                                var add = addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber;
                                $("#add").val(add);
                            });
                        });
                    })
                </script>

                <!--联动-->

                <script>
                       $(function(){
                           $("#address_one").change(function(){
                               var id = $(this).val();
                               $.getJSON("<?php echo e(url('addressTwo')); ?>",{id:id},function(msg){
                                   if(msg == 0){
                                       $("#address_three").empty();
                                       $("#address_two").empty();
                                       $("#address_three").html("<option value='0'>请选择...</option>");
                                       $("#address_two").html("<option value='0'>请选择...</option>");
                                   }else{
                                       //alert(msg);
                                       str ="<option value='0'>请选择...</option>";
                                       for(i=0;i<msg.length;i++){
                                           str +="<option value="+msg[i].address_name+">"+msg[i].address_name+"</option>"
                                       }
                                       $("#address_two").html(str);
                                       $("#address_three").empty();
                                       $("#address_three").html("<option value='0'>请选择...</option>");
                                   }
                               });
                           });

                           she=$("a[href='<?php echo e(url('address')); ?>']");
                            she.parent().parents('li').siblings(".active").children('.pointer').remove();
                            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
                            she.parent().parents('li').siblings(".active").removeClass("active");
                            she.addClass("active");
                            she.closest('ul').addClass("active");
                            she.parent().parents("li").addClass("active");
                            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
                       });
                </script>
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="<?php echo e(asset('admin')); ?>/js/jquery-latest.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/theme.js"></script>

</body>
</html>
