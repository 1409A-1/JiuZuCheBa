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
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>
        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>车辆品牌</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />Filter users
                                  <option />Signed last 30 days
                                  <option />Active users
                                </select>
                            </div>
                            <input type="text" class="search" id="search" />
                            <a class="btn-flat success new-product" href="{{URL('brandAdd')}}">+ 添加车辆品牌</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                        车辆品牌
                                    </th>
                                    <!-- <th class="span3">
                                        <span class="line"></span>Description
                                    </th> -->
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <!-- row -->
                                @foreach($carbrand as $k => $v)
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="{{asset('admin')}}/img/table-img.png" />
                                        </div>
                                        <a href="#" class="name">{{$v['brand_name']}} </a>
                                    </td>
                                    <!-- <td class="description">
                                        if you are going to use a passage of Lorem Ipsum.
                                    </td> -->
                                    <td>
                                        <!-- <span class="label label-success">Active</span> -->
                                        <ul class="actions" style="float:left">
                                            <li><a href="brandUpdate/{{$v['brand_id']}}">编辑</a></li>
                                            <li class="last"><a class="del" href="javascript:void(0)" bid={{$v['brand_id']}}>删除</a></li>
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
            // Ajax搜索&分页
            $(document).delegate(".page","click",function(){
                page=$(this).attr('page');
                search=$("#search").val()?$("#search").val():"all";
                //alert(search);
                $.get("brandListPage/"+page+"/"+search+"/0",function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.carbrand.length; i++){
                        str+='<tr class="first"><td><input type="checkbox" /><div class="img"><img src="{{asset('admin')}}/img/table-img.png" /></div><a href="#" class="name">'+msg.carbrand[i].brand_name+'</a></td><td><ul class="actions" style="float:left"><li><a href="brandUpdate/'+msg.carbrand[i].brand_id+'">编辑</a></li><li class="last"><a class="del" href="javascript:void(0)" bid='+msg.carbrand[i].brand_id+'>删除</a></li</ul></td></tr>'
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
            $("#search").blur(function(){
                //alert(1)
                search=$(this).val()=="" ? "all" :$(this).val();
                //alert(search)
                $.get("brandListPage/1/"+search+"/0",function(msg){
                //alert(msg)
                str="";
                for(i=0; i<msg.carbrand.length; i++){
                    str+='<tr class="first"><td><input type="checkbox" /><div class="img"><img src="{{asset('admin')}}/img/table-img.png" /></div><a href="#" class="name">'+msg.carbrand[i].brand_name+'</a></td><td><ul class="actions" style="float:left"><li><a href="brandUpdate/'+msg.carbrand[i].brand_id+'">编辑</a></li><li class="last"><a class="del" href="javascript:void(0)" bid='+msg.carbrand[i].brand_id+'>删除</a></li></ul></td></tr>'
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

            // Ajax搜索&分页&删除
            $(document).delegate(".del","click",function(){
                page=$("#nowpage").val();
                search=$("#search").val()?$("#search").val():"all";
                del=$(this).attr("bid");
                //alert(search);
                $.get("brandListPage/"+page+"/"+search+"/"+del,function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.carbrand.length; i++){
                        str+='<tr class="first"><td><input type="checkbox" /><div class="img"><img src="{{asset('admin')}}/img/table-img.png" /></div><a href="#" class="name">'+msg.carbrand[i].brand_name+'</a></td><td><ul class="actions" style="float:left"><li><a href="brandUpdate/'+msg.carbrand[i].brand_id+'">编辑</a></li><li class="last"><a class="del" href="javascript:void(0)" bid='+msg.carbrand[i].brand_id+'>删除</a></li</ul></td></tr>'
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