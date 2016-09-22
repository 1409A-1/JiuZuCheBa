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
                                    <option value="0">所有订单</option>
                                    <option value="1">未付款订单</option>
                                    <option value="2">已付款订单</option>
                                    <option value="3">长租订单</option>
                                    <option value="4">短租订单</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid" id="look">
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
                            @foreach($data as $key => $val)
                            <tr>
                                <td>{{ $val['user_name'] }}</td>
                                <td>{{ $val['ord_sn'] }}</td>
                                <td>
                                    @if ($val['ord_type'] == 1)
                                        短租
                                    @else
                                        长租
                                    @endif
                                </td>
                                <td>没有套餐</td>
                                <td>{{ $val['ord_price'] }}</td>
                                <td>
                                    @if($val['ord_pay'] == 0)
                                        订单尚未付款
                                    @elseif($val['ord_pay'] == 1)
                                        已付款，尚未提车
                                    @elseif ($val['ord_pay'] == 2)
                                        车辆正在被租赁中
                                    @elseif ($val['ord_pay'] == 3)
                                        已还车，订单结算完毕
                                    @elseif ($val['ord_pay'] == 4)
                                        待评价
                                    @else
                                        订单已取消
                                    @endif
                                </td>
                                <td>无</td>
                                <td>{{ date('Y-m-d H:i:s',$val['add_time']) }}</td>
                                <td>无</td>
                                <td>
                                    @if($val['ord_pay'] == 0)
                                        <a href=''>提醒付款</a>||
                                        <a href="{{ url('orderInfo') }}/{{ $val['ord_id'] }}">查看详情</a>
                                    @elseif($val['ord_pay'] == 1)
                                        <a href=''>提醒取车</a>||
                                        <a href="{{ url('orderInfo') }}/{{ $val['ord_id'] }}">查看详情</a>
                                    @elseif ($val['ord_pay'] == 2)
                                        <a href=''>提醒还车</a>&nbsp;&nbsp;
                                        <a href="{{ url('orderInfo') }}/{{ $val['ord_id'] }}">查看详情</a>
                                    @else
                                        <a href="{{ url('orderInfo') }}/{{ $val['ord_id'] }}">查看详情</a>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
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
                     html = "<table class=\"table\"><tr><th>用户名称</th><th>订单号</th><th>租车类型</th><th>套餐类型</th><th>订单总价</th>"+
                            "<th>订单状态</th><th>订单备注</th><th>添加时间</th><th>身份证号</th><th>操作</th></tr>";
                  $.each(e, function(i,v){
                     html += "<tr><td>"+e[i]['user_name']+"</td><td>"+e[i]['ord_sn']+"</td>"
                    if(e[i]['ord_type']==1){
                        html += "<td>短租</td><td>没有套餐</td><td>"+e[i]['ord_price']+"</td>"
                    } else {
                        html += "<td>长租</td><td>没有套餐</td><td>"+e[i]['ord_price']+"</td>"
                    }
                    if(e[i]['ord_pay'] == 0){
                       html += "<td>订单尚未付款</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    } else if(e[i]['ord_pay'] == 1){
                       html += "<td>已付款，尚未提车</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    } else if(e[i]['ord_pay'] == 2){
                       html += "<td>车辆正在被租赁中</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    } else if(e[i]['ord_pay'] == 3){
                       html += "<td>已还车，订单结算完毕</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    } else if(e[i]['ord_pay'] == 4){
                       html += "<td>待评价</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    } else {
                       html += "<td>订单已取消</td><td>无</td><td>"+getLocalTime(e[i]['add_time'])+"</td><td>无</td>"
                    }
                    if(e[i]['ord_pay'] == 0){
                       html+=  "<td><a href=''>提醒付款</a>||<a href=\"{{ url('orderInfo') }}/{{ $val['ord_id'] }}\">查看详情</a></td></tr>"
                    }else if(e[i]['ord_pay'] == 1){
                       html+=  "<td><a href=''>提醒取车</a>||<a href=\"{{ url('orderInfo') }}/{{ $val['ord_id'] }}\">查看详情</a></td></tr>"
                    }else if(e[i]['ord_pay'] == 2){
                       html+=  "<td><a href=''>提醒还车</a>||<a href=\"{{ url('orderInfo') }}/{{ $val['ord_id'] }}\">查看详情</a></td></tr>"
                    }else{
                       html+=  "<td><a href=\"{{ url('orderInfo') }}/{{ $val['ord_id'] }}\">查看详情</a></td></tr>"
                    }
                  })
                     html += "</table>";
                  $("#look").html(html);
              });
            })

//时间戳的转化
    function getLocalTime(nS) {
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
    }

        })
    </script>

</body>
</html>
