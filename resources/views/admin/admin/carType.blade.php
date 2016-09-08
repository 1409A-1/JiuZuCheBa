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
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span3">
                                        <input type="checkbox" />
                                        车辆型号编号
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>车辆型号
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>编辑
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <?php foreach($data as $k => $v){?>
                                <tr class="first" id="del<?php echo $v['type_id']?>">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <img src="{{asset('admin')}}/img/table-img.png" />
                                        </div>
                                        <a href="#" class="name">Generate Lorem </a>
                                    </td>
                                    <td>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <a href="#" class="name"><?php echo $v['type_name']?></a>
                                    </td><td>
                                        <a href="javascript:void(0)"  class="name" onclick="del(<?php echo $v['type_id']?>)">删除</a>
                                        <a href="#" class="name">详情</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end products table -->
                <!--jquery删除-->
                <script src="{{asset('admin')}}/js/js.js"></script>
                <script>
                        function del(type_id){
                            var token = $('input[name=_token]').val();
                            $.ajax({
                                type:"post",
                                url:"{{URL('typeDel')}}",
                                data:{type_id:type_id,_token:token},
                                success:function(msg){
                                    if(msg == 1){
                                        $('#del'+type_id).remove();
                                    }
                                }
                            });
                        }
                </script>
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