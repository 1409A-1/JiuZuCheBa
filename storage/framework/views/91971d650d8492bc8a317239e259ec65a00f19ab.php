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

            <!-- UI Elements section -->
            <div class="row-fluid ui-elements">
                <h4>服务器负载</h4>
                <div class="span5 knobs">
                    <div class="knob-wrapper">
                        <input type="text" value="50" class="knob" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#30a1ec" data-bgcolor="#d4ecfd" data-width="150" />
                        <div class="info">
                            <div class="param">
                                <span class="line blue"></span>
                                Active users
                            </div>
                        </div>
                    </div>
                    <div class="knob-wrapper">
                        <input type="text" value="75" class="knob second" data-thickness=".3" data-inputcolor="#333" data-fgcolor="#3d88ba" data-bgcolor="#d4ecfd" data-width="150" />
                        <div class="info">
                            <div class="param">
                                <span class="line blue"></span>
                                % disk space usage
                            </div>
                        </div>
                    </div>                        
                </div>
                <div class="span6 showcase">
                    <div class="ui-sliders">
                        <div class="slider slider-sample1 vertical-handler"></div>
                        <div class="slider slider-sample2"></div>
                        <div class="slider slider-sample3"></div>
                    </div>
                    <div class="ui-group">
                        <a class="btn-flat inverse">Large Button</a>
                        <a class="btn-flat gray">Large Button</a>
                        <a class="btn-flat default">Large Button</a>
                        <a class="btn-flat primary">Large Button</a>
                    </div>                        

                    <div class="ui-group">
                        <a class="btn-flat icon">
                            <i class="tool"></i> Icon button
                        </a>
                        <a class="btn-glow small inverse">
                            <i class="shuffle"></i>
                        </a>
                        <a class="btn-glow small primary">
                            <i class="setting"></i>
                        </a>
                        <a class="btn-glow small default">
                            <i class="attach"></i>
                        </a>
                        <div class="ui-select">
                            <select>
                                <option selected="" />Dropdown
                                <option />Custom selects
                                <option />Pure css styles
                            </select>
                        </div>

                        <div class="btn-group">
                            <button class="glow left">LEFT</button>
                            <button class="glow right">RIGHT</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end UI elements section -->

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