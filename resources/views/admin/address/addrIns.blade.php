<!DOCTYPE html>
<html>
<head>
	<title>地区添加</title>
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/tables.css" type="text/css" media="screen" />
    <!--三级联动插件-->
    <script type="text/javascript" src="{{ asset('admin') }}/js/area.js"></script>
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
                            <h4>地区添加</h4>
                        </div>
                    </div>
                    <div class="row-fluid filter-block">
                    </div>
                    <div class="row-fluid" style="width:100%;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <table class="table table-hover">
                            <tr>
                                <td>请选择省：</td>
                                <td><select id="province" runat="server" name="province" style="height: 100%;"></select></td>
                            </tr>
                            <tr>
                                <td>请选择市：</td>
                                <td><select id="city" runat="server" name="city" style="height: 100%;"></select>&nbsp;&nbsp;<span id="citys" style="color: #fd6f16;"></span></td>
                            </tr>
                            <tr>
                                <td>请选择县：</td>
                                <td><select id="county" runat="server" name="county" style="height: 100%;"></select>&nbsp;&nbsp;<span id="countys" style="color: #fd6f16;"></span></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" id="sub" value="添加城市" class="btn btn-info"/>&nbsp;&nbsp;<span id="subs" style="color: #fd6f16;"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <script type="text/javascript">
                    setup()
                </script>
                <script src="{{ asset('admin') }}/js/js.js"></script>
                <script>
                    $(function(){
                       $("#sub").click(function(){
                           var city = $("#city").val();
                           var token = $("input[name=_token]").val();
                           var county = $("#county").val();
                           $.ajax({
                               type:'post',
                               url:"{{ url('typeIns') }}",
                               data:{city:city,_token:token,county:county},
                               success:function(msg){
                                   if(msg == 1){
                                       $("#citys").html("地级市不能为空");
                                   } else if (msg == 2){
                                       $("#countys").html("市、县级市、县不能空");
                                       $("#citys").empty();
                                   } else if (msg == 3){
                                       $("#subs").html("请不要重复添加");
                                       $("#citys").empty();
                                       $("#countys").empty();
                                   } else if (msg == 0){
                                       location.href='{{ url('addrList') }}'
                                   }
                               }
                           });
                       });

                        she=$("a[href='{{ url('addrIns') }}']");
                        she.parent().parents('li').siblings(".active").children('.pointer').remove();
                        she.parent().parents('li').siblings(".active").children(".active").removeClass("active");
                        she.parent().parents('li').siblings(".active").removeClass("active");
                        she.addClass("active");
                        she.closest('ul').addClass("active");
                        she.parent().parents("li").addClass("active");
                        she.parent().parents("li").prepend('<div class="pointer"><div class="arrow"></div><div class="arrow_border"></div></div>');
                    });
                </script>
        </div>
    </div>
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

</body>
</html>
