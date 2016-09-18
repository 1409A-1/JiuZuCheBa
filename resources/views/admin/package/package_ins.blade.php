<!DOCTYPE html>
<html>
<head>
	<title>套餐管理</title>
    
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
<body>

    <!-- navbar -->
    @include('common.admin_header')
    <!-- end navbar -->

    <!-- sidebar -->
    @include('common.admin_left')
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in {{asset('admin')}}/js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>套餐添加</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                        </div>
                    </div>
                    <script src="{{asset('admin')}}/js/js.js"></script>
                    <script>
                        $(function(){
                            $("#ins").click(function(){
                                location.href='package';
                            });
                        });
                    </script>
                    <div class="row-fluid">
                        <form action="{{url('packInsert')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <table class="table">
                                <tr>
                                    <td>套餐名称:</td>
                                    <td><input type="text" required="required" name="pack_name" value="打包套餐"/></td>
                                </tr>
                                <tr>
                                    <td>套餐价格:</td>
                                    <td><input type="text" required="required" name="pack_price"/></td>
                                </tr>
                                <tr>
                                    <td>天数:</td>
                                    <td><input type="text" required="required" name="pack_day"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" >
                                        <input type="submit"  class="btn btn-info" value="添加套餐"/>
                                    </td>
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
    <script>
        $(function(){
          she=$("a[href='http://www.test.com/JiuZuCheBa/public/packIns']");
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
