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
                            <h4>地区搜索</h4>
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
                            <input type="text" class="search" />
                            <a class="btn-flat success new-product" id="ins">添加型号</a>
                        </div>
                    </div>
                    <script src="{{asset('admin')}}/js/js.js"></script>

                    <div class="row-fluid" style="width:500px;">
                        <table class="table">
                            <tr>
                                <th>城市搜索:</th>
                                <td>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="text" name="select" style="height: 30px;" placeholder="首字母搜索、汉字搜索"/>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <div id="content"></div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main container -->
    <script>
        $(function(){
            $("input[name=select]").keyup(function(){
                var server_name = $("input[name=select]").val();
                var _token = $("input[name=_token]").val();
                $.getJSON("addrSelect",{server_name:server_name,_token:_token},function(msg){
                    console.log(msg);
                    if(msg == 1){
                        $('#content').html("对不起您搜索的内容暂时没有找到！");
                    } else if(msg == 0) {
                        $('#content').html("");
                    } else {
                        var html="";
                        $.each(msg,function(key,val){
                            html+='<table>'+'<tr>'+'<td>'+msg[key]['address_name']+'</td>'+'</tr>'+'</table>';
                        });
                        $('#content').html(html);
                    }
                });
            });
        });
    </script>
	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
