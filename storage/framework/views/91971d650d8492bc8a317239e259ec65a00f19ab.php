<!-- this page specific styles -->
<link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/css/compiled/index.css" type="text/css" media="screen" />
<!-- navbar -->
<?php echo $__env->make('common.admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end navbar -->

<!-- sidebar -->
<?php echo $__env->make('common.admin_left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end sidebar -->

<!-- main container -->
<div class="content">
    <div class="container-fluid">

        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">2457</span>
                        visits
                    </div>
                    <span class="date">Today</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">3240</span>
                        users
                    </div>
                    <span class="date">February 2014</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">322</span>
                        orders
                    </div>
                    <span class="date">This week</span>
                </div>
                <div class="span3 stat last">
                    <div class="data">
                        <span class="number">$2,340</span>
                        sales
                    </div>
                    <span class="date">last 30 days</span>
                </div>
            </div>
        </div>
        <!-- end upper main stats -->
        <div id="pad-wrapper">
            <div class="row-fluid ui-elements">
                <h1 style="color: #696efd;">欢迎的登陆&nbsp;&nbsp;<b>就租车吧</b>&nbsp;&nbsp;后台管理系统</h1>
            </div>
        </div>
    </div>
    </iframe>  
</div>


<!-- scripts -->
<script src="<?php echo e(asset('admin')); ?>/js/jquery-latest.js"></script>
<script src="<?php echo e(asset('admin')); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('admin')); ?>/js/jquery-ui-1.10.2.custom.min.js"></script>
<!-- knob -->
<script src="<?php echo e(asset('admin')); ?>/js/jquery.knob.js"></script>
<!-- flot charts -->
<script src="<?php echo e(asset('admin')); ?>/js/theme.js"></script>

<script type="text/javascript">
    $(function () {

        // jQuery Knobs
        $(".knob").knob();

        // jQuery UI Sliders
        $(".slider-sample1").slider({
            value: 100,
            min: 1,
            max: 500
        });
        $(".slider-sample2").slider({
            range: "min",
            value: 130,
            min: 1,
            max: 500
        });
        $(".slider-sample3").slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 40, 170 ],
        });
    });
</script>

</body>
</html>