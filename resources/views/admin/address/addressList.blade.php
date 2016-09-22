<!DOCTYPE html>
<html>
<head>
	<title>服务点列表</title>
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
                            <h4>服务点列表</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table">
                            <tr>
                                <th>服务点编号</th>
                                <th>服务点名称</th>
                                <th>所属地区</th>
                                <th>服务点地址</th>
                                <th>交通路线</th>
                                <th>操作</th>
                            </tr>
                            <tr>
                                <?php foreach($data as $k => $v){?>
                                <tr>
                                    <td>{{{$v['server_id']}}}</td>
                                    <td>{{$v['server_name']}}</td>
                                    <td>{{$v['address_name']}}</td>
                                    <td>{{$v['street']}}</td>
                                    <td>{{$v['traffic_line']}}</td>
                                    <td>
                                        <a href="{{ url('addressDel') }}/<?php echo $v['server_id']?>">删除</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tr>
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
            she=$("a[href='{{ url('addressList') }}']");
            she.parent().parents('li').siblings(".active").children('.pointer').remove();
            she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
            she.parent().parents('li').siblings(".active").removeClass("active");
            she.addClass("active");
            she.closest('ul').addClass("active");
            she.parent().parents("li").addClass("active");
            she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
        })
    </script>

</body>
</html>
