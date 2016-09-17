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

    <!-- open sans font -->

    <!--[if lt IE 9]>
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
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>网站用户</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                        </div>
                    </div>

                    <div class="row-fluid">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        用户账号
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>取车服务点
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>还车服务点
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>取车时间
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>还车时间
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆类型
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆品牌
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆名称
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>申请时间
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>订单状态
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <!-- row -->
                                @foreach($order as $k => $v)
                                <tr class="first">
                                    <td class="description">
                                        {{$v['user_name']}}
                                    </td>
                                    <td class="description">
                                       {{$v['start_city']}} | {{$v['start_dis']}} | 
                                       {{$v['start_name']}}
                                    </td>
                                    <td class="description">
                                       {{$v['end_city']}} | {{$v['end_dis']}} | 
                                       {{$v['end_name']}}
                                    </td>
                                    <td class="description">
                                       {{$v['dep_time']}}
                                    </td>
                                    <td class="description">
                                       {{$v['des_time']}}
                                    </td>
                                    <td class="description">
                                       {{$v['type_name']}}
                                    </td><td class="description">
                                       {{$v['brand_name']}}
                                    </td>
                                    <td class="description">
                                       {{$v['car_name']}}
                                    </td>
                                    <td class="description">
                                       {{$v['apply_time']}}
                                    </td>
                                    <td class="description">
                                    @if ($v['apply_status'] == 0)
                                        <span class="label label-success">申请中</span>
                                    @elseif ($v['apply_status'] == 1)
                                        <span class="label label-success">申请通过</span>
                                    @elseif ($v['apply_status'] == 2)
                                        <span class="label label-info">申请未通过</span>
                                    @elseif ($v['apply_status'] == 3)
                                        <span class="label label-info">申请已取消</span>
                                    @endif
                                    </td>
                                    <td class="description">
                                    @if ($v['apply_status'] == 0)
                                        <ul class="actions" style="float:left">
                                        <li><a href="javascript:void(0)" class="check" serverId="{{$v['server_id']}}" carId="{{$v['car_id']}}" tel="{{$v['tel']}}" dep_time="{{$v['dep_time']}}" start="{{$v['start_city']}} | {{$v['start_dis']}} | {{$v['start_name']}}" applyId="{{$v['apply_id']}}">审核</a></li>
                                        </ul>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
                                <!-- row -->
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <!-- end products table -->

                <!-- orders table -->
                
                <!-- end orders table -->

                <!-- users table -->
                
                <!-- end users table -->
            </div>
        </div>
    </div>
    <!-- end main container -->

	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- knob -->
    <script src="{{asset('admin')}}/js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="{{asset('admin')}}/js/jquery.flot.js"></script>
    <script src="{{asset('admin')}}/js/jquery.flot.stack.js"></script>
    <script src="{{asset('admin')}}/js/jquery.flot.resize.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

    <script type="text/javascript">
        $(function () {
            // Ajax分页
            /*$(document).delegate(".page","click",function(){
                page=$(this).attr('page');
                search=$("#search").val()?$("#search").val():"all";
                //alert(search);
                $.get("userListPage/"+page,function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.user.length; i++){
                        str+='<tr class="first"><td>'+msg.user[i].user_name+'</td><td class="description">'+msg.user[i].tel+'</td><td class="description">'+msg.user[i].reg_time+'</td><td class="description">'+msg.user[i].credit+'</td></tr>';
                    }
                    $("#tbody").empty();
                    $("#tbody").append(str);
                    $("#nowpage").val(msg.page);
                    $(".pagination").empty();
                    str2='<ul><li><a href="javascript:void(0)" class="page" page="'+msg.prev+'">&#8249;</a></li>'
                        for (i = 1; i <= msg.pages; i++){
                            str2+='<li><a class="'
                            if (msg.page == i){
                            str2+='active';
                            }
                            str2+=' page" href="javascript:void(0)" page="'+i+'">'+i+'</a></li>'
                        }
                        str2+='<li><a href="javascript:void(0)" class="page" page="'+msg.next+'">&#8250;</a></li></ul>'
                        $(".pagination").append(str2);
                },'json')
            })*/

            she=$("a[href='http://www.test.com/JiuZuCheBa/public/longOrderList']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

            //长订单审核
            $(".check").click(function(){
                she = $(this);
                applyId = $(this).attr("applyId");
                serverId = $(this).attr("serverId");
                carId = $(this).attr("carId");
                tel = $(this).attr("tel");
                dep_time = $(this).attr("dep_time");
                start = $(this).attr("start");
                _token=$("input[name=_token]").val();
                $.post("longOrderCheck", {applyId: applyId, serverId: serverId, carId: carId, tel: tel, dep_time: dep_time, start: start, _token: _token}, function (msg) {
                    //alert(msg);
                    if (msg == "success") {
                        she.parents("td").prev().html('<span class="label label-success">申请通过</span>');
                        she.remove();
                    } else if (msg == "false") {
                        she.parents("td").prev().html('<span class="label label-info">申请未通过</span>');
                        she.remove();
                    }
                })
            })

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

            

            // jQuery Flot Chart
            var visits = [[1, 50], [2, 40], [3, 45], [4, 23],[5, 55],[6, 65],[7, 61],[8, 70],[9, 65],[10, 75],[11, 57],[12, 59]];
            var visitors = [[1, 25], [2, 50], [3, 23], [4, 48],[5, 38],[6, 40],[7, 47],[8, 55],[9, 43],[10,50],[11,47],[12, 39]];

            var plot = $.plot($("#statsChart"),
                [ { data: visits, label: "Signups"},
                 { data: visitors, label: "Visits" }], {
                    series: {
                        lines: { show: true,
                                lineWidth: 1,
                                fill: true, 
                                fillColor: { colors: [ { opacity: 0.1 }, { opacity: 0.13 } ] }
                             },
                        points: { show: true, 
                                 lineWidth: 2,
                                 radius: 3
                             },
                        shadowSize: 0,
                        stack: true
                    },
                    grid: { hoverable: true, 
                           clickable: true, 
                           tickColor: "#f9f9f9",
                           borderWidth: 0
                        },
                    legend: {
                            // show: false
                            labelBoxBorderColor: "#fff"
                        },  
                    colors: ["#a7b5c5", "#30a0eb"],
                    xaxis: {
                        ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4,"APR"], [5,"MAY"], [6,"JUN"], 
                               [7,"JUL"], [8,"AUG"], [9,"SEP"], [10,"OCT"], [11,"NOV"], [12,"DEC"]],
                        font: {
                            size: 12,
                            family: "Open Sans, Arial",
                            variant: "small-caps",
                            color: "#697695"
                        }
                    },
                    yaxis: {
                        ticks:3, 
                        tickDecimals: 0,
                        font: {size:12, color: "#9da3a9"}
                    }
                 });

            function showTooltip(x, y, contents) {
                $('<div id="tooltip">' + contents + '</div>').css( {
                    position: 'absolute',
                    display: 'none',
                    top: y - 30,
                    left: x - 50,
                    color: "#fff",
                    padding: '2px 5px',
                    'border-radius': '6px',
                    'background-color': '#000',
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }

            var previousPoint = null;
            $("#statsChart").bind("plothover", function (event, pos, item) {
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;

                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(0),
                            y = item.datapoint[1].toFixed(0);

                        var month = item.series.xaxis.ticks[item.dataIndex].label;

                        showTooltip(item.pageX, item.pageY,
                                    item.series.label + " of " + month + ": " + y);
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;
                }
            });
        });
    </script>

</body>
</html>