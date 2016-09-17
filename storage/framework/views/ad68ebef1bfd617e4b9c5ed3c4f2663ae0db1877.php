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
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
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
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="<?php echo e(asset('admin')); ?>/css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>
        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in <?php echo e(asset('admin')); ?>/js/theme.js -->
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
                    <script src="<?php echo e(asset('admin')); ?>/js/js.js"></script>
                    <script>
                        $(function(){
                            $("#ins").click(function(){
                                location.href='model_add';
                            });
                        });
                    </script>
                    <div class="row-fluid" style="width:500px;">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <table class="table table-hover">
                                <tr>
                                    <td>请输入省/直辖市:</td>
                                    <td>
                                        <input type="text" name="city_one" required="" style="width:60px;"/>
                                        首字母：
                                        <input type="text" name="city_one_p" value="" required="" style="width: 60px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>请输入市/区:</td>
                                    <td>
                                        <input type="text" name="city_two" required="" style="width:60px;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>城市类型</td>
                                    <td>
                                        <input type="radio" value="0" style="margin-top: -2px;" checked="checked"  name="type"/>&nbsp;&nbsp;普通城市&nbsp;&nbsp;
                                        <input type="radio" value="1" style="margin-top: -2px;" name="type"/>&nbsp;&nbsp;热门城市&nbsp;&nbsp;
                                        <input type="radio" value="2" style="margin-top: -2px;" name="type"/>&nbsp;&nbsp;旅游城市&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-info" id="type_ins">添加城市</button>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                    </div>
                </div>
                <!-- end products table -->
                <script>
                    $(function(){
                        $("input[name=city_one]").keyup(function(){
                            var name = $("input[name=city_one]").val();
                            var _token = $("input[name=_token]").val();
                            $.ajax({
                                type:"post",
                                url:"<?php echo e(url('ping')); ?>",
                                data:{name:name,_token:_token},
                                success:function(msg){
                                    $("input[name=city_one_p]").val(msg);
                                }
                            });

                        });
                       $("#type_ins").click(function(){
                           var city_one = $("input[name=city_one]").val();
                           var token = $("input[name=_token]").val();
                           var city_one_p = $("input[name=city_one_p]").val();
                           var city_two = $("input[name=city_two]").val();
                           var type = $('input:radio:checked').val();
                           $.ajax({
                               type:"post",
                               url:"<?php echo e(url('typeIns')); ?>",
                               data:{city_one:city_one,city_one_p:city_one_p,city_two:city_two,type:type,_token:token},
                               success:function(msg){
                                   if(msg == 1){
                                        alert("省/直辖市不能为空");
                                   }else if(msg == 2){
                                        alert("首字母不能为空");
                                   }else if(msg == 3){
                                        alert("市/区不能为空");
                                   }else if(msg == 4){
                                        alert("城市已经存在请不要重复添加");
                                   }else{
                                       location.href='<?php echo e(url('addrist')); ?>';
                                   }
                               }
                           });
                       });

                       she=$("a[href='http://www.test.com/JiuZuCheBa/public/addrIns']");
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
    <!-- end main container -->

	<!-- scripts -->
    <script src="<?php echo e(asset('admin')); ?>/js/jquery-latest.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/theme.js"></script>

</body>
</html>
