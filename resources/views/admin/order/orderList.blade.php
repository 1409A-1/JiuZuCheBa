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
                            <h4>订单管理</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table">
                            <tr>
                                <th>用户名称</th>
                                <th>订单号</th>
                                <th>租车类型</th>
                                <th>套餐类型</th>
                                <th>订单总价</th>
                                <th>订单状态</th>
                                <th>订单备注</th>
                                <th>添加时间</th>
                                <th>身份证号</th>
                                <th>操作</th>
                            </tr>
                            <?php foreach($data as $key => $val){?>
                            </tr>
                                <td><?php echo $val['user_name']?></td>
                                <td><?php echo $val['ord_sn']?></td>
                                <td><?php
                                        if ($val['ord_type'] == 1) {
                                            echo "短租";
                                        } else {
                                            echo "长租";
                                        }
                                    ?>
                                </td>
                                <td><?php
                                    if($val['ord_package'] == 0){
                                        echo "没有套餐";
                                    }else{
                                        echo $val['pack_name'];
                                    }
                                    ?></td>
                                <td><?php echo $val['ord_price']?></td>
                                <td><?php
                                        if($val['ord_pay'] == 0){
                                            echo "订单尚未付款";
                                        } else if($val['ord_pay'] == 1){
                                            echo "已付款，尚未提车";
                                        } else if ($val['ord_pay'] == 2){
                                            echo "车辆正在被租赁中";
                                        } else if ($val['ord_pay'] == 3) {
                                            echo "已还车，订单结算完毕";
                                        } else if ($val['ord_pay'] == 4) {
                                            echo "待评价";
                                        } else if ($val['ord_pay'] == 5) {
                                            echo "订单已取消";
                                        } else if ($val['ord_pay'] == 6) {
                                            echo "订单申请中（长租申请）";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $val['note']?></td>
                                <td><?php echo date('Y-m-d H:i:s',$val['add_time']) ?></td>
                                <td><?php echo $val['id_card']?></td>
                                <td>
                                    <?php
                                    if($val['ord_pay'] == 0){
                                        ?>
                                        <a href=''>提醒付款</a>&nbsp;&nbsp;
                                        <a href="{{ url('orderInfo') }}/<?php echo $val['ord_id']?>">查看详情</a>
                                        <?php
                                    } else if($val['ord_pay'] == 1){
                                            ?>
                                        <a href=''>提醒取车</a>&nbsp;&nbsp;
                                        <a href="{{ url('orderInfo') }}/<?php echo $val['ord_id']?>">查看详情</a>
                                        <?php
                                    } else if ($val['add_time'] <time()){
                                        if($val['ord_pay'] == 3){
                                            ?>
                                            <a href="{{ url('orderInfo') }}/<?php echo $val['ord_id']?>">查看详情</a>
                                        <?php
                                        }else{
                                            ?>
                                            <a href="{{ url('orderInfo') }}/<?php echo $val['ord_id']?>">查看详情</a>
                                        <?php
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <!-- orders table -->
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>
    <script>
        $(function(){
            she=$("a[href='{{ url('orderLists') }}']");
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
