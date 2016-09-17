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
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="{{asset('admin')}}/css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>
        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in {{asset('admin')}}/js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Products</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />Filter users
                                  <option />Signed last 30 days
                                  <option />Active users
                                </select>
                            </div>
                            <input type="text" class="search" />
                            <a class="btn-flat success new-product" id="ins">添加型号</a>
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
                    <div class="row-fluid" style="width:500px;">
                        <table class="table">
                            <tr>
                                <th>车辆名字</th>
                                <th>车辆类型</th>
                                <th>车辆品牌</th>
                                <th>车辆图片</th>
                                <th>车辆单日价格</th>
                                <th>操作</th>
                            </tr>
                            <?php foreach($data as $k => $v){?>
                            <tr>
                                <td><?php echo $v['car_name']?></td>
                                <td><?php echo $v['type_name']?></td>
                                <td><?php echo $v['brand_name']?></td>
                                <td><a href="<?php echo $v['car_img']?>" target="_Blank"><img src="<?php echo $v['car_img']?>" alt="" width="50" height="50"/><a></td>
                                <td><?php echo $v['car_price']?></td>
                                <td>
                                    <a href="{{url('carDel')}}/<?php echo $v['car_id']?>">删除</a>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <!--三级联动-->
                <script>
                       $(function(){
                           $("#address_one").change(function(){
                               var id = $(this).val();
                               $.getJSON("address_two",{id:id},function(msg){
                                   if(msg == 0){
                                       $("#address_three").empty();
                                       $("#address_two").empty();
                                       $("#address_three").html("<option value='0'>请选择...</option>");
                                       $("#address_two").html("<option value='0'>请选择...</option>");
                                   }else{
                                       //alert(msg);
                                       str ="<option value='0'>请选择...</option>";
                                       for(i=0;i<msg.length;i++){
                                           str +="<option value="+msg[i].address_id+">"+msg[i].address_name+"</option>"
                                       }
                                       $("#address_two").html(str);
                                       $("#address_three").empty();
                                       $("#address_three").html("<option value='0'>请选择...</option>");
                                   }
                               });
                           });
                           $("#address_two").change(function(){
                               var id = $(this).val();
                               $.getJSON("address_two",{id:id},function(msg){
                                   if(msg == 0){
                                       $("#address_three").empty();
                                       $("#address_three").html("<option value='0'>请选择...</option>");
                                   }else{
                                       //alert(msg);
                                       str ="<option value='0'>请选择...</option>";
                                       for(i=0;i<msg.length;i++){
                                           str +="<option value="+msg[i].address_id+">"+msg[i].address_name+"</option>"
                                       }
                                       $("#address_three").html(str);
                                   }
                               });
                           });
                          she=$("a[href='http://www.test.com/JiuZuCheBa/public/carList']");
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
