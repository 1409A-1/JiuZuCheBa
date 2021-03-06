<!DOCTYPE html>
<html>
<head>
	<title>服务点车辆列表</title>
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
                    <div class="row-fluid head" style="padding-bottom:30px">
                        <div class="span12">
                            <h4>服务点车辆列表</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select id="address_one">
                                  <option value="">请选择城市
                                  @foreach($address as $k => $v)
                                  <option value="{{$v['address_id']}}">{{$v['address_name']}}
                                  @endforeach
                                </select>
                            </div>
                            <div class="ui-select">
                                <select id="address_two">
                                  <option value="">请选择地区
                                </select>
                            </div>
                            <div class="ui-select">
                                <select id="address_three">
                                  <option value="">请选择服务点
                                </select>
                            </div>
                            <input type="text" placeholder="请输入车辆名称" class="search" id="search" />
                            <a class="btn-flat success new-product" href="{{URL('carServer')}}">服务点车辆分配</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        服务点
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆名称
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆数量
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <!-- row -->
                                @foreach($car as $k => $v)
                                <tr class="first">
                                    <td class="description">
                                        {{$v['city_name']." | ".$v['district']." | ".$v['server_name']}}
                                    </td>
                                    <td class="description" serverId="{{$v['server_id']}}" carId="{{$v['car_id']}}" carNumber="{{$v['number']}}">
                                        {{$v['car_name']}}
                                    </td>
                                    <td class="description">
                                        <span class="number">{{$v['number']}}</span>辆
                                    </td>
                                </tr>
                                @endforeach
                                <!-- row -->
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                      <ul>
                        <li><a href="javascript:void(0)" class="page" page="{{$prev}}">&#8249;</a></li>
                        @for ($i = 1; $i <= $pages; $i++)
                            <li><a class="
                            @if ($page == $i)
                            active
                            @endif
                             page" href="javascript:void(0)" page="{{$i}}">{{$i}}</a></li>
                        @endfor
                        <li><a href="javascript:void(0)" class="page" page="{{$next}}">&#8250;</a></li>
                      </ul>
                    </div>
                    <input type="hidden" value="1" id="nowpage">
                </div>
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
            $(document).delegate(".page","click",function(){
                page=$(this).attr('page');
                search1=$("#address_one").val()?$("#address_one").val():"all";
                search2=$("#address_two").val()?$("#address_two").val():"all";
                search3=$("#address_three").val()?$("#address_three").val():"all";
                search4=$("#search").val()?$("#search").val():"all";
                $.get("carServerPage/"+page+"/"+search1+"/" +search2+"/"+search3+"/"+search4,function(msg){
                    str="";
                    for(i=0; i<msg.car.length; i++){
                        str+='<tr class="first"><td class="description">'+msg.car[i].city_name+' | '+msg.car[i].district+' | '+msg.car[i].server_name+'</td><td class="description" serverId="'+msg.car[i].server_id+'" carId="'+msg.car[i].car_id+'" carNumber="'+msg.car[i].number+'">'+msg.car[i].car_name+'</td><td class="description"><span class="number">'+msg.car[i].number+'</span>辆</td></tr>'
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
            })

            //地区联动
            $("#address_one").change(function(){
                var id = $(this).val();
                page=1;
                search1=$("#address_one").val()?$("#address_one").val():"all";
                search2=$("#address_two").val()?$("#address_two").val():"all";
                search3=$("#address_three").val()?$("#address_three").val():"all";
                search4=$("#search").val()?$("#search").val():"all";
                if (id == '') {
                    $("#address_three").html("<option value=''>请选择服务点</option>");
                    $("#address_two").html("<option value=''>请选择地区</option>");
                } else {
                    $.getJSON("{{ url('addressTwo') }}",{id:id},function(msg){
                    //alert(msg);
                    str ="<option value=''>请选择地区</option>";
                    for(i=0;i<msg.length;i++){
                       str +="<option value="+msg[i].address_name+">"+msg[i].address_name+"</option>"
                    }
                    $("#address_two").html(str);
                    $("#address_three").empty();
                    $("#address_three").html("<option value=''>请选择服务点</option>");
                    });
                    $.getJSON("carServerPage/"+page+"/"+search1+"/" +search2+"/"+search3+"/"+search4,function(msg){
                    str="";
                    for(i=0; i<msg.car.length; i++){
                        str+='<tr class="first"><td class="description">'+msg.car[i].city_name+' | '+msg.car[i].district+' | '+msg.car[i].server_name+'</td><td class="description" serverId="'+msg.car[i].server_id+'" carId="'+msg.car[i].car_id+'" carNumber="'+msg.car[i].number+'">'+msg.car[i].car_name+'</td><td class="description"><span class="number">'+msg.car[i].number+'</span>辆</td></tr>'
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
                    })
                }
            });
            //服务点联动
            $("#address_two").change(function(){
                var id = $(this).val();
                page=1;
                search1=$("#address_one").val()?$("#address_one").val():"all";
                search2=$("#address_two").val()?$("#address_two").val():"all";
                search3=$("#address_three").val()?$("#address_three").val():"all";
                search4=$("#search").val()?$("#search").val():"all";
                if (id == '') {
                    $("#address_three").html("<option value=''>请选择服务点</option>");
                } else {
                    $.getJSON("{{ url('serverSelect') }}/"+search1+'/'+search2,function(msg){
                    //alert(msg);
                    str ="<option value=''>请选择服务点</option>";
                    for(i=0;i<msg.length;i++){
                       str +="<option value="+msg[i].server_name+">"+msg[i].server_name+"</option>"
                    }
                    $("#address_three").html(str);
                    });
                    $.getJSON("carServerPage/"+page+"/"+search1+"/" +search2+"/"+search3+"/"+search4,function(msg){
                    str="";
                    for(i=0; i<msg.car.length; i++){
                        str+='<tr class="first"><td class="description">'+msg.car[i].city_name+' | '+msg.car[i].district+' | '+msg.car[i].server_name+'</td><td class="description" serverId="'+msg.car[i].server_id+'" carId="'+msg.car[i].car_id+'" carNumber="'+msg.car[i].number+'">'+msg.car[i].car_name+'</td><td class="description"><span class="number">'+msg.car[i].number+'</span>辆</td></tr>'
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
                    })
                }
            });
            //服务点搜索
            $("#address_three").change(function(){
                var id = $(this).val();
                page=1;
                search1=$("#address_one").val()?$("#address_one").val():"all";
                search2=$("#address_two").val()?$("#address_two").val():"all";
                search3=$("#address_three").val()?$("#address_three").val():"all";
                search4=$("#search").val()?$("#search").val():"all";
                $.getJSON("carServerPage/"+page+"/"+search1+"/" +search2+"/"+search3+"/"+search4,function(msg){
                str="";
                for(i=0; i<msg.car.length; i++){
                    str+='<tr class="first"><td class="description">'+msg.car[i].city_name+' | '+msg.car[i].district+' | '+msg.car[i].server_name+'</td><td class="description" serverId="'+msg.car[i].server_id+'" carId="'+msg.car[i].car_id+'" carNumber="'+msg.car[i].number+'">'+msg.car[i].car_name+'</td><td class="description"><span class="number">'+msg.car[i].number+'</span>辆</td></tr>'
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
                })
            })

            //车辆名称搜索
            $("#search").keydown(function(e){
                if (e.keyCode==13) {
                    page=1;
                    search1=$("#address_one").val()?$("#address_one").val():"all";
                    search2=$("#address_two").val()?$("#address_two").val():"all";
                    search3=$("#address_three").val()?$("#address_three").val():"all";
                    search4=$("#search").val()?$("#search").val():"all";
                    $.getJSON("carServerPage/"+page+"/"+search1+"/" +search2+"/"+search3+"/"+search4,function(msg){
                    str="";
                    for(i=0; i<msg.car.length; i++){
                        str+='<tr class="first"><td class="description">'+msg.car[i].city_name+' | '+msg.car[i].district+' | '+msg.car[i].server_name+'</td><td class="description" serverId="'+msg.car[i].server_id+'" carId="'+msg.car[i].car_id+'" carNumber="'+msg.car[i].number+'">'+msg.car[i].car_name+'</td><td class="description"><span class="number">'+msg.car[i].number+'</span>辆</td></tr>'
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
                    })
                }
            })

            she=$("a[href='{{ url('carServer') }}']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

            //服务点车辆数量点击后变为输入框
            $(document).delegate(".number", 'click', function(){
                carNumber = $(this).html();
                str="<input type='text' class='newNumber' value='"+carNumber+"'/>";
                $(this).replaceWith(str);
            })

            //输入框失焦事件
            $(document).delegate(".newNumber", 'blur', function(){
                serverId = $(this).parent().prev().attr("serverId");
                carId = $(this).parent().prev().attr("carId");
                carNumber = $(this).parent().prev().attr("carNumber");
                //alert(carId)
                reg = /^\d+$/;
                newNumber = $(this).val();
                if (!reg.test(newNumber)) {
                    $(this).next("span").remove();
                    $(this).parent().append("<span style='color: red'>请输入正确的车辆数量");
                } else {
                    $(this).next("span").remove();
                    if (carNumber == newNumber){
                        $(this).replaceWith("<span class='number'>"+carNumber+"</span>");
                    } else {
                        $(this).replaceWith("<span class='number'>"+newNumber+"</span>");
                        $.get("carServerUpdate/"+serverId+"/"+carId+"/"+newNumber, function(){
                        })
                    }
                }
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