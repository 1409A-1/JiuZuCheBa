<!DOCTYPE html>
<html>
<head>
	<title>订单详情</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/tables.css" type="text/css" media="screen" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    @include('common.admin_header')
    @include('common.admin_left')
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
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
                                <th>出发服务点</th>
                                <th>到达服务点</th>
                                <th>提车时间</th>
                                <th>还车时间</th>
                                <th>车型</th>
                                <th>车辆品牌</th>
                                <th>优惠券</th>
                                <th>车辆详细信息</th>
                                <th>车辆单日价格</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <input type="hidden" name="ord_id" value="{{ $data['ord_id'] }}"/>
                                <td>{{ $data['server_name'] }}</td>
                                <td>{{ $data['destination'] }}</td>
                                <td>{{ date('Y-m-d H:i:s',$data['dep_time']) }}</td>
                                <td>{{ date('Y-m-d H:i:s',$data['des_time']) }}</td>
                                <td>{{ $data['type_name'] }}</td>
                                <td>{{ $data['brand_name'] }}</td>
                                <td>
                                    @if ($data['benefit_id'] != 0)
                                        {{ $data['benefit_name'] }}
                                    @else
                                        无
                                    @endif
                                </td>
                                <td>{{ $data['car_name'] }} <img src="{{ $data['car_img'] }}" alt="" style="width: 50px; height: 50px;"/></td>
                                <td>{{ $data['server_name'] }}</td>
                                <td>
                                    @if($arr['ord_pay'] == 1)
                                        <button id="ti" class="btn btn-info">提车</button>
                                        <button id="end" class="btn btn-info">返回上一页</button>
                                    @elseif ($arr['ord_pay'] == 2)
                                        <button id="huan" class="btn btn-info">还车</button>
                                        <button id="end" class="btn btn-info">返回上一页</button>
                                    @else
                                        <button id="end" class="btn btn-info">返回上一页</button>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <table class="table" id="carInformation">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <tr>
                                <td colspan="2" align="center"><h5>车辆还车记录&nbsp;&nbsp;&nbsp;&nbsp;(提示:本记录会影响用的积分)</h5></td>
                            </tr>
                            <tr>
                                <td>油耗情况:</td>
                                <td>
                                    <input type="radio" name="consumption" style="margin-top: -3px;" value="0" checked="checked"/>&nbsp;&nbsp;正常&nbsp;
                                    <input type="radio" name="consumption" style="margin-top: -3px;" value="1"/>&nbsp;&nbsp;偏少&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>车辆是否损坏:</td>
                                <td>
                                    <input type="radio" name="carDamage" value="0" style="margin-top: -3px;" checked="checked"/>&nbsp;&nbsp;&nbsp;&nbsp;是&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="carDamage" value="1" style="margin-top: -3px;"/>&nbsp;&nbsp;&nbsp;&nbsp;否
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><button id="sub" class="btn btn-info">还车</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    <!-- end main container -->
	<!-- scripts -->
        <script src="{{asset('admin')}}/js/js.js"></script>
        <script>
           $("#carInformation").hide();
            $(function(){
                $("#end").click(function(){
                    history.back(-1);
                });
            });
            $(function(){
                var id = $("input[name=ord_id]").val();
                $("#ti").click(function(){
                    location.href='{{ url('carry') }}/'+id;
                });
                $("#huan").click(function(){
                    $("#carInformation").show();

                });
                $("#sub").click(function(){
                    var consumption = $("input[name='consumption']:checked").val();
                    var carDamage = $("input[name='carDamage']:checked").val();
                    //var idd = $("input[name='consumption']").val();
                    var _token = $("input[name=_token]").val();
                    var id = $("input[name=ord_id]").val();
                    $.ajax({
                        type:"post",
                        url:"{{ url('integralManagement') }}",
                        data:{consumption:consumption,carDamage:carDamage,_token:_token,id:id},
                        success:function(msg){
                            if(msg == ''){
                                location.href='{{ url('still') }}/'+id;
                            }
                        }
                    });
                });
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
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
