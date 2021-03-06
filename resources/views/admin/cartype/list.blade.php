<!DOCTYPE html>
<html>
<head>
	<title>车辆类型</title>
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
                            <h4>车辆类型</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <input type="text" class="search" id="search" />
                            <a class="btn-flat success new-product" href="typeAdds">+ 添加车辆类型</a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        车辆类型
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                             <tbody id="tbody">
                                <!-- row -->
                                @foreach($cartype as $k => $v)
                                <tr class="first">
                                    <td>
                                        {{$v['type_name']}}
                                    </td>
                                    <!-- <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td> -->
                                    <td>
                                        <!-- <span class="label label-success">Active</span> -->
                                        <ul class="actions" style="float:left">
                                            <li><a href="typeUpdate/{{$v['type_id']}}">编辑</a></li>
                                            @if ($v['car_id'] == '')
                                            <li class="last"><a class="del" href="javascript:void(0)" bid={{$v['type_id']}}>删除</a></li>
                                            @endif
                                        </ul>
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
            // Ajax搜索&分页
            $(document).delegate(".page","click",function(){
                page=$(this).attr('page');
                search=$("#search").val()?$("#search").val():"all";
                //alert(search);
                $.get("typeListPage/"+page+"/"+search+"/0",function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.cartype.length; i++){
                        str+='<tr class="first"><td>'+msg.cartype[i].type_name+'</td><td><ul class="actions" style="float:left"><li><a href="typeUpdate/'+msg.cartype[i].type_id+'">编辑</a></li>'
                        if (msg.cartype[i].car_id == null) {
                            str+='<li class="last"><a class="del" href="javascript:void(0)" bid='+msg.cartype[i].type_id+'>删除</a></li>'
                        }
                        str+='</ul></td></tr>'
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

            //Ajax搜索
            $("#search").keydown(function(e){
                if (e.keyCode == 13) {
                    search=$(this).val()=="" ? "all" :$(this).val();
                    //alert(search)
                    $.get("typeListPage/1/"+search+"/0",function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.cartype.length; i++){
                        str+='<tr class="first"><td>'+msg.cartype[i].type_name+'</td><td><ul class="actions" style="float:left"><li><a href="typeUpdate/'+msg.cartype[i].type_id+'">编辑</a></li>'
                        if (msg.cartype[i].car_id == null) {
                            str+='<li class="last"><a class="del" href="javascript:void(0)" bid='+msg.cartype[i].type_id+'>删除</a></li>'
                        }
                        str+='</ul></td></tr>'
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
                }
            })

            // Ajax搜索&分页&删除
            $(document).delegate(".del","click",function(){
                page=$("#nowpage").val();
                search=$("#search").val()?$("#search").val():"all";
                del=$(this).attr("bid");
                $.get("typeListPage/"+page+"/"+search+"/"+del,function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.cartype.length; i++){
                        str+='<tr class="first"><td>'+msg.cartype[i].type_name+'</td><td><ul class="actions" style="float:left"><li><a href="typeUpdate/'+msg.cartype[i].type_id+'">编辑</a></li>'
                        if (msg.cartype[i].car_id == null) {
                            str+='<li class="last"><a class="del" href="javascript:void(0)" bid='+msg.cartype[i].type_id+'>删除</a></li>'
                        }
                        str+='</ul></td></tr>'
                    }
                    $("#tbody").empty();
                    $("#tbody").append(str);
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

            she=$("a[href='{{ url('typeList') }}']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

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