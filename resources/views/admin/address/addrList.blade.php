<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>
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
    <script src="{{asset('admin')}}/js/js.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
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
                            <h4>地区列表</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                    </div>
                    <div class="row-fluid" style="width:100%;">
                        <table class="table">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        @foreach($data as $v)
                            <tr>
                                <td><span class="city" id="{{ $v['address_id'] }}" style="cursor: pointer"><h5>{{ $v['address_name'] }}</h5></span></td>
                                @foreach($v['son'] as $r)
                                  <td><span class="type" id="{{ $r['address_id'] }}" style="">{{ $r['address_name'] }}</span></td>
                                @endforeach
                            </tr>
                        @endforeach
                        </table>
                        <div id="typeArray"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".city").click(function(){
                var id = $(this).attr('id');
                var _token = $("input[name=_token]").val();
                $.ajax({
                    dataType:"Json",
                    type:"post",
                    url:"{{ url('typeInfo') }}",
                    data:{id:id,_token:_token},
                    success:function(msg){
                        //alert(msg.address_name);
                        str ="<table class='table'><tr>" +
                        "<td><span style='font-size: 20px; color: #ff0000;' id='add_id' a_id="+ msg.address_id +" >" + msg.address_name +
                        "</span></td></tr>" ;
                        if(msg.type == 0){
                            str +="<tr><td><span style='font-size: 25px;'>城市类型</span></td><td><select style='height: 30px' id='change_type'><option type='0'>普通城市</option><option type='2'>热门城市</option><option type='1'>旅游城市</option></select></td></tr>";  //普通
                        }else if(msg.type == 1) {
                            str +="<tr><td><span style='font-size: 25px;'>城市类型</span></td><td><select style='height: 30px' id='change_type'><option type='1'>旅游城市</option><option type='0'>普通城市</option><option type='2'>热门城市</option></select></td></tr>"; //热门
                        }else if (msg.type == 2){
                            str +="<tr><td><span style='font-size: 25px;'>城市类型</span></td><td><select style='height: 30px' id='change_type'><option type='2'>热门城市</option><option type='1'>旅游城市</option><option type='0'>普通城市</option></select></td></tr>"; //旅游
                        }
                        str +="<tr><td><button class='btn btn-info' id='change'>切换城市类型</button></td></tr>";
                        str +="</table>";
                        $("#typeArray").html(str);
                    }
                });
            });

            $(document).delegate('#change','click',function(){
               var type =  $("#change_type").find("option:selected").attr('type');  //要更改成的type  id
               var a_id = $("#add_id").attr('a_id');                                //要修改的id
                $.ajax({
                    type:"get",
                    url:"{{ url('changeAddType') }}",
                    data:{type:type,a_id:a_id},
                    success:function(msg){
                        if(msg==1){
                            location.href='addrList'
                        } else {
                            alert('修改失败');
                        }
                    }
                })
            })


            she=$("a[href='http://www.test.com/JiuZuCheBa/public/addrList']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        });
    </script>
    <!-- end main container -->
	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
