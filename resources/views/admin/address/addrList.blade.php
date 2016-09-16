<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('admin')}}/bootstrap/css/bootstrap.min.css"/>
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
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="{{asset('admin')}}/css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>
        
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
                    <script src="{{asset('admin')}}/js/js.js"></script>

                    <div class="row-fluid" style="width:100%;">
                        <table class="table">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        @foreach($data as $v)
                            <tr>
                                <td><span class="city" id="{{ $v['address_id'] }}" style=""><h5>{{ $v['address_name'] }}</h5></span></td>
                                @foreach($v['son'] as $r)
                                <td><span class="type" id="{{ $r['address_id'] }}" style="cursor: pointer">{{ $r['address_name'] }}</span></td>
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
    <script src="{{ asset('admin') }}/js/js.js"></script>
    <script>
        $(function(){
            $(".type").click(function(){
                var id = $(this).attr('id');
                var _token = $("input[name=_token]").val();
                $.ajax({
                    dataType:"Json",
                    type:"post",
                    url:"{{ url('typeInfo') }}",
                    data:{id:id,_token:_token},
                    success:function(msg){
                        //alert(msg.address_name);
                        str ="<table class='table'>" +
                        "<tr>" +
                        "<td><span style='font-size: 20px; color: #060301;'>" +msg.address_name+
                        "</span></td></tr>" ;
                        if(msg.type == 0){
                            str +="<tr><td><span style='font-size: 25px;'>城市类型:</span></td><td><span style='font-size: 25px;'>普通城市</span></td></tr>";
                        }else if(msg.type == 1) {
                            str +="<tr><td><span style='font-size: 25px;'>城市类型:</span>:</td><td><span style='font-size: 25px;color: #f68a1c;'>热门城市</span></td></tr>";
                        }else if (msg.type == 2){
                            str +="<tr><td><span style='font-size: 25px;'>城市类型:</span>:</td><td><span style='font-size: 25px;color: #f6422e;'>旅游城市</span></td></tr>";
                        }
                        str +="<tr><td><button class='btn btn-info'>切换城市类型</button></td></tr>";
                        str +="</table>";
                        $("#typeArray").html(str);
                    }
                });
            });
        });
    </script>
    <!-- end main container -->
	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
