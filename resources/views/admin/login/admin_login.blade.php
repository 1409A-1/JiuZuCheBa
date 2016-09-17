<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>Detail Admin - Sign in</title>
    
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin')}}/css/lib/font-awesome.css" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="{{asset('admin')}}/css/compiled/signin.css" type="text/css" media="screen" />

    <!-- open sans font -->
    {{--<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />--}}

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


    <!-- background switcher -->
    <div class="bg-switch visible-desktop">
        <div class="bgs">
            <a href="#" data-img="landscape.jpg" class="bg active">
                <img src="{{asset('admin')}}/img/bgs/landscape.jpg" />
            </a>
            <a href="#" data-img="blueish.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/blueish.jpg" />
            </a>            
            <a href="#" data-img="7.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/7.jpg" />
            </a>
            <a href="#" data-img="8.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/8.jpg" />
            </a>
            <a href="#" data-img="9.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/9.jpg" />
            </a>
            <a href="#" data-img="10.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/10.jpg" />
            </a>
            <a href="#" data-img="11.jpg" class="bg">
                <img src="{{asset('admin')}}/img/bgs/11.jpg" />
            </a>
        </div>
    </div>


    <div class="row-fluid login-wrapper">
        <a href="index.html">
            <img class="logo" src="{{asset('admin')}}/img/logo-white.png" />
        </a>

        <div class="span4 box">
            <div class="content-wrap">
                <h6>就租车吧 后台管理员登陆</h6>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input class="span12" name="username" type="text" required="required" placeholder="Your Username" />
                <span id="user_name" style="color: red;"></span>
                <input class="span12" name="password" type="password" required="required" placeholder="Your Password" />
                <span id="password" style="color:red;"></span>
                {{--<a href="#" class="forgot">忘记密码？联系管理员。</a>--}}
                <div class="remember">
                    {{--<input id="remember-me" type="checkbox"/>--}}
                    {{--<label for="remember-me">七天免登陆</label>--}}
                </div>
                <button class="btn-glow primary login" id="signin">登陆</button>
            </div>
        </div>
        <script src="{{asset('admin')}}/js/js.js"></script>
        <script>
            $(function(){
                $("#signin").click(function(){
                    var username = $("input[name=username]").val();
                    var password = $("input[name=password]").val();
                    var token = $("input[name=_token]").val();
                    $.ajax({
                        type:'post',
                        url:"{{URL('signin')}}",
                        data:{username:username,password:password,_token:token},
                        success:function(msg){
                            if(msg == 1){
                                location.href='indexs';
                            }else if(msg == 2){
                               alert("密码错误");
                            }else{
                                alert("用户名错误或不存在");
                            }
                        }
                    });
                });
            });
        </script>
        <div class="span4 no-account">
        </div>
    </div>

	<!-- scripts -->
    <script src="{{asset('admin')}}/js/jquery-latest.js"></script>
    <script src="{{asset('admin')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin')}}/js/theme.js"></script>

    <!-- pre load bg imgs -->
    <script type="text/javascript">
        $(function () {
            // bg switcher
            var $btns = $(".bg-switch .bg");
            $btns.click(function (e) {
                e.preventDefault();
                $btns.removeClass("active");
                $(this).addClass("active");
                var bg = $(this).data("img");

                $("html").css("background-image", "url('{{asset('admin')}}/img/bgs/" + bg + "')");
            });

        });
    </script>

</body>
</html>