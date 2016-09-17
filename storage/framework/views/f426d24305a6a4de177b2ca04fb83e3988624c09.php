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
                        <form action="<?php echo e(url('carIns')); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
                            <table class="table">
                                <tr>
                                    <td>车辆名称:</td>
                                    <td>
                                        <input type="text" name="car_name" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆类型:</td>
                                    <td>
                                        <select name="type_id" style="height: 100%;" id="">
                                            <option value="0">请选择...</option>
                                            <?php foreach($data as $k => $v){?>
                                            <option value="<?php echo $v['type_id']?>"><?php echo $v['type_name']?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆品牌:</td>
                                    <td>
                                        <select name="brand_id" style="height: 100%;" id="">
                                            <option value="0">请选择...</option>
                                            <?php foreach($arr as $k => $v){?>
                                            <option value="<?php echo $v['brand_id']?>"><?php echo $v['brand_name']?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆图片:</td>
                                    <td>
                                        <input type="file" name="car_img" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>单日价格:</td>
                                    <td>
                                        <input type="text" name="car_price" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="添加" class="btn btn-info"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- end products table -->
                <!-- orders table -->
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="<?php echo e(asset('admin')); ?>/js/jquery-latest.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/theme.js"></script>
    <script>
        $(function(){
            she=$("a[href='http://www.test.com/JiuZuCheBa/public/carIns']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        })
    </script>

</body>
</html>
