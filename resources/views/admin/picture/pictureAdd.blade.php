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
        
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in {{asset('admin')}}/js/theme.js -->
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>前台图片添加</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right" style="margin-right: 360px">
                            <a href="picture" class="btn-flat success new-product" >前台图片列表</a>
                        </div>
                    </div>
                    <form action="{{ url('pictureAdd') }}" method="post" enctype="multipart/form-data">
                    <div class="row-fluid" style="width:600px; height:500px">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <table class="table table-hover" style="height:400px; margin-left: 30px">
                                <tr>
                                    <td>请选择上传图片类型：</td>
                                    <td style="width:470px">
                                        <select name="type" style="height:30px">
                                            <option value="" required>请选择</option>
                                            <option value="0" required>首页轮播图</option>
                                            <option value="1" required>活动图片</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>请选择图片：</td>
                                    <td>
                                        <input type="file" name="img" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>请输入图片描述：</td>
                                    <td>
                                        <input type="text" name="alt" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <input type="submit" class="btn-glow primary" style="margin-left:180px" value="确认添加" />
                                    <span>OR</span>
                                    <input type="reset" value="重置" class="reset" />
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" id="usable">
                    </div>
                </div>
                </form>
                <!-- end products table -->
                <!-- orders table -->
                <!-- end users table -->
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
<script>
    $(function(){
        //form表单提交事件
        $("form").submit(function(){
            type = $("select[name='type']").val();
            //alert(type);
            if (type == '') {
                $("select[name='type']").after("<span style='color: red'>请选择图片类型</span>")
                return false;
            }
        })
        
        //重置按钮
        $("input[type=reset]").click(function(){
            $("select[name=server_id]").val(0);
            $("select[name=car_id]").val(0);
            $("input[name=number]").val('');
            $(".table font").remove();
         })

        she=$("a[href='{{ url('picture') }}']");
            she.parent().siblings(".active").children('.pointer').remove();
            she.parent().siblings(".active").children(".active").removeClass("active");
            she.parent().siblings(".active").removeClass("active");
            she.parent().addClass("active");
            she.parent().prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');

    })
</script>
