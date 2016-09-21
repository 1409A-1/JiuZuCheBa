<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>

    {{--引用css样式--}}
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/tables.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
    <script src="{{asset('admin')}}/dat/WdatePicker.js"></script>
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
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>订单管理</h4>
                        </div>
                    </div>

                    <button  class="btn btn-info" style="float: right" id="search"/>搜索</button>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <input type="text"  class="text" style="float: right; width: 120px;margin-right: 40px" placeholder="结束时间" id="d4322" onFocus="WdatePicker({minDate:'#F{$dp.$D(\'d4321\',{d:1});}'})">
                            <input type="text"  class="text" style="float: right; width: 120px;margin-right: 20px" placeholder="开始时间" id="d4321" onFocus="WdatePicker({maxDate:'#F{$dp.$D(\'d4322\',{d:-1});}'})">
                            <div class="ui-select">
                                <select id="status">
                                    <option value="0">所有</option>
                                    <option value="1">未付款</option>
                                    <option value="2">已付款</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    {{--<div class="row-fluid filter-block">--}}
                        {{--<div class="pull-right">--}}
                            {{--<form action="{{ url('orderInquiry') }}" method="post" >--}}
                                {{--<div style="float: left">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}"/>--}}
                                    {{--<select name="orderIn" id="" style="height:100%;width:120px;">--}}
                                        {{--<option value="0">所有</option>--}}
                                        {{--<option value="1">未付款</option>--}}
                                        {{--<option value="2">已付款</option>--}}
                                        {{--<option value="3">已付款未取车</option>--}}
                                        {{--<option value="4">未还车</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                {{--<div style="float: left;">--}}
                                    {{--<input type="submit" class="btn btn-info" value="搜索"/>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
//搜索
            $("#search").click(function(){
              var start = $("#d4321").val();  //开始时间
              var end =  $("#d4322").val();     //结束时间
              var status =  $("#status").val();     //结束时间
              $.getJSON("{{ url('orderInquiry') }}", {start:start, end:end, status:status}, function(e){
                alert(e)
              });
            })

        })
    </script>

</body>
</html>
