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
                    <div class="row-fluid head" style="padding-bottom:30px">
                        <div class="span12">
                            <h4>前台图片列表</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <a class="btn-flat success new-product" href="{{URL('pictureAdd')}}">+ 添加前台图片</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        图片类型
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>预览
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>图片说明
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <!-- row -->
                                @foreach($data as $k => $v)
                                <tr class="first">
                                    <td class="description">
                                        @if ($v['type'] == 0)
                                        首页轮播图
                                        @elseif ($v['type'] == 1)
                                        活动图片
                                        @elseif ($v['type'] == 2)
                                        新闻图片
                                        @endif
                                    </td>
                                    <td class="description">
                                        <img src="{{$v['dir']}}" alt="{{$v['alt']}}" width="300">
                                    </td>
                                    <td class="description">
                                        {{$v['alt']}}
                                    </td>
                                    <td class="description">
                                        <ul class="actions" style="float:left">
                                            <li class="last"><a class="del" href="javascript:void(0)" bid="{{$v['picture_id']}}">删除</a></li>
                                            @if ($v['isUse'] == 0)
                                            <li class="last"><a class="isUse" href="javascript:void(0)" bid="{{$v['picture_id']}}">不使用</a></li>
                                            @elseif ($v['isUse'] == 1)
                                            <li class="last"><a class="isUse" href="javascript:void(0)" bid="{{$v['picture_id']}}">使用</a></li>
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
            $(document).delegate(".page","click",function(){
                page=$(this).attr('page');
                //alert(search);
                $.get("pictureDel/"+page+"/0",function(msg){
                    //alert(msg)
                    //return false;
                    str="";
                    for(i=0; i<msg.picture.length; i++){
                        str+='<tr class="first"><td>';
                        if (msg.picture[i].type == 0) {
                            str+="首页轮播图";
                        } else if(msg.picture[i].type == 1) {
                            str+="活动图片";
                        } else if(msg.picture[i].type == 2) {
                            str+="新闻图片";
                        }
                        str+='</td><td><img src="'+msg.picture[i].dir+'" alt="'+msg.picture[i].alt+'" height="40px"></td>'
                        str+='<td>'+msg.picture[i].alt+'</td>';
                        str+='<td><ul class="actions" style="float:left"><li class="last"><a class="del" href="javascript:void(0)" bid='+msg.picture[i].picture_id+'>删除</a></li>'
                        if (msg.picture[i].isUse==0) {
                            str+='<li class="last"><a class="isUse" href="javascript:void(0)" bid="'+msg.picture[i].picture_id+'">不使用</a></li>'
                        } else if (msg.picture[i].isUse==1) {
                            str+='<li class="last"><a class="isUse" href="javascript:void(0)" bid="'+msg.picture[i].picture_id+'">使用</a></li>'
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

            she=$("a[href='{{ url('picture') }}']");
            she.parent().siblings(".active").children('.pointer').remove();
            she.parent().siblings(".active").children(".active").removeClass("active");
            she.parent().siblings(".active").removeClass("active");
            she.parent().addClass("active");
            she.parent().prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

            // Ajax分页&删除
            $(document).delegate(".del","click",function(){
                page=$("#nowpage").val();
                del=$(this).attr("bid");
                //alert(search);
                $.get("pictureDel/"+page+"/"+del,function(msg){
                    //alert(msg)
                    str="";
                    for(i=0; i<msg.picture.length; i++){
                        str+='<tr class="first"><td>';
                        if (msg.picture[i].type == 0) {
                            str+="首页轮播图";
                        } else if(msg.picture[i].type == 1) {
                            str+="活动图片";
                        } else if(msg.picture[i].type == 2) {
                            str+="新闻图片";
                        }
                        str+='</td><td><img src="'+msg.picture[i].dir+'" alt="'+msg.picture[i].alt+'" height="40px"></td>'
                        str+='<td>'+msg.picture[i].alt+'</td>';
                        str+='<td><ul class="actions" style="float:left"><li class="last"><a class="del" href="javascript:void(0)" bid='+msg.picture[i].picture_id+'>删除</a></li>'
                        if (msg.picture[i].isUse==0) {
                            str+='<li class="last"><a class="isUse" href="javascript:void(0)" bid="'+msg.picture[i].picture_id+'">不使用</a></li>'
                        } else if (msg.picture[i].isuse==1) {
                            str+='<li class="last"><a class="isUse" href="javascript:void(0)" bid="'+msg.picture[i].picture_id+'">使用</a></li>'
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

            //修改图片使用状态
            $(document).delegate('.isUse', 'click', function(){
                pictureId = $(this).attr("bid");
                she = $(this);
                $.get("pictureEdit/"+pictureId, function(msg){
                    if (msg.status == "unuse"){
                        she.replaceWith('<a class="isUse" href="javascript:void(0)" bid="'+pictureId+'">使用</a>');
                    }else if (msg.status == "usabled") {
                        she.replaceWith('<a class="isUse" href="javascript:void(0)" bid="'+pictureId+'">不使用</a>');
                    }else if (msg.status == "turnFull") {
                        alert("轮播图最多显示5张")
                    }else if (msg.status == "activeFull") {
                        alert("活动图片最多显示3张")
                    }
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