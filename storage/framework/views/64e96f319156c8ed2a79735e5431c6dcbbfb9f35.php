<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - New User Form</title>
    
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin')); ?>/css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/css/compiled/new-user.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <!-- <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
     -->
    <!--[if lt IE 9]>
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
            <div id="pad-wrapper" class="new-user">
                <div class="row-fluid header">
                    <h3>车辆品牌添加</h3>
                </div>

                <div class="row-fluid form-wrapper">
                    <!-- left column -->
                    <div class="span9 with-sidebar">
                        <div class="container">
                            <form class="new_user_form inline-input" method="post" action="<?php echo e(URL('brandAdd')); ?>" />
                                <div class="span12 field-box">
                                    <label>品牌:</label>
                                    <input class="span9" type="text" required name="brand_name" />
                                </div>
                                 <?php if(count($errors) > 0): ?>
                                    <div style="margin-left:110px">
                                        <ul style="color:red">
                                            <?php foreach($errors->all() as $error): ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                <div class="span11 field-box actions">
                                    <input type="submit" class="btn-glow primary" value="确认添加" />
                                    <span>OR</span>
                                    <input type="reset" value="放弃" class="reset" />
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- side right column -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="<?php echo e(asset('admin')); ?>/js/jquery-latest.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('admin')); ?>/js/theme.js"></script>

    <script type="text/javascript">
        $(function () {
            $("input[type=text]").focus();
            $("input[type=reset]").click(function(){
                $("input[type=text]").focus();
            });
            
            // toggle form between inline and normal inputs
            var $buttons = $(".toggle-inputs button");
            var $form = $("form.new_user_form");

            $buttons.click(function () {
                var mode = $(this).data("input");
                $buttons.removeClass("active");
                $(this).addClass("active");

                if (mode === "inline") {
                    $form.addClass("inline-input");
                } else {
                    $form.removeClass("inline-input");
                }
            });

            she=$("a[href='<?php echo e(url('brandList')); ?>']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        });
    </script>

</body>
</html>