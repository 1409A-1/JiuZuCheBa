<!DOCTYPE html>
<html>
<head>
	<title>Detail Admin - Tables showcase</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
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

        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in {{asset('admin')}}/js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>Products</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">

                    </div>
                    <script src="{{asset('admin')}}/js/js.js"></script>
                    <script>
                        $(function(){
                            $("#ins").click(function(){
                                location.href='{{url('pack_ins')}}';
                            });
                        });
                    </script>
                    <div class="row-fluid">
                        <table class="table">
                            <tr>
                                <th>套餐名称</th>
                                <th>套餐价</th>
                                <th>租车天数</th>
                                <th>操作</th>
                            </tr>
                            <?php foreach($data as $k => $v){?>
                            <tr>
                                <td><?php echo $v['pack_name']?></td>
                                <td><?php echo $v['pack_price']?></td>
                                <td><?php echo $v['pack_day']?></td>
                                <td>
                                    <a href="{{url('packDel')}}/<?php echo $v['pack_id']?>" ><span class="glyphicon glyphicon-remove-circle"></span></a>
                                </td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <!-- orders table -->
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
          she=$("a[href='{{ url('packIns') }}']");
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
