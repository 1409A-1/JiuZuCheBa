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
                            <h4>Products</h4>
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
                    <script>
                        $(function(){
                            $("#ins").click(function(){
                                location.href='model_add';
                            });
                        });
                    </script>
                    <div class="row-fluid" style="width:500px;">
                        <form action="{{url('carIns')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <table class="table">
                                <tr>
                                    <td>车辆名称:</td>
                                    <td>
                                        <input type="text" name="car_name" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆类型:</td>
                                    <td>
                                        <select name="type_id" id="">
                                            <option value="0">请选择...</option>
                                            <?php foreach($data as $k => $v){?>
                                            <option value="<?php echo $v['type_id']?>"><?php echo $v['type_name']?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆品牌:</td>
                                    <td>
                                        <select name="brand_id" id="">
                                            <option value="0">请选择...</option>
                                            <?php foreach($arr as $k => $v){?>
                                            <option value="<?php echo $v['brand_id']?>"><?php echo $v['brand_name']?></option>
                                            <?php }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>车辆图片:</td>
                                    <td>
                                        <input type="file" name="car_img" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>单日价格:</td>
                                    <td>
                                        <input type="text" name="car_price" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="添加" class="btn btn-info"/></td>
                                </tr>
                            </table>
                        </form>
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

</body>
</html>
