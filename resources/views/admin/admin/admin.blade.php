<style>

</style>
<link rel="stylesheet" href="{{asset('admin')}}/css/compiled/index.css" type="text/css" media="screen" />
@include('common.admin_header')
@include('common.admin_left')
<div class="content">
    <div class="container-fluid">
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">{{ $sum }}</span>
                        <a href="{{ url('carList') }}" style="color: #000000">车辆总数</a>
                    </div>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">{{ $user }}</span>
                        <a href="{{ url('adminList') }}" style="color: #000000">用户数量</a>
                    </div>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">{{ $order }}</span>
                        <a href="{{ url('orderLists') }}" style="color: #000000">订单数量</a>
                    </div>
                </div>
                <div class="span3 stat last">
                    <div class="data">
                        <span class="number">{{ $server }}</span>
                        <a href="{{ url('addressList') }}" style="color: #000000">服务点数量</a>
                    </div>
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
<script src="{{asset('admin')}}/js/jquery-latest.js"></script>
<script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
<script src="{{asset('admin')}}/js/jquery-ui-1.10.2.custom.min.js"></script>
<!-- knob -->
<script src="{{asset('admin')}}/js/jquery.knob.js"></script>
<!-- flot charts -->
<script src="{{asset('admin')}}/js/theme.js"></script>

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