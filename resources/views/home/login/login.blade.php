@if(empty(session('user_name')))
    @include('common.home_header')
    <link type="text/css" rel="stylesheet" href="home/css/login.css">
    <script type="text/javascript" src="home/js/jquery-validate.js"></script>
    <!--登录注册-->
    <div class="infoBox noCopy">
        <div>
            <div>
                <!--登录-->
                <div class="login">
                    <div class="title">
                        <div>登录</div>
                        <span>没有账号？<a href="{{ URL('loginReg') }}">立即注册</a></span>
                    </div>
                    <div class="input_body">
                        <form action="{{ url('loginPro') }}" method="post" id="login">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="inputBox" id="login_name_box">
                                <input placeholder="我的用户名" style="width: 100%;" maxlength="11" name="user_name" type="tel" required="required">
                            </div>
                            <div class="inputBox" id="login_pw_box">
                                <input placeholder="我的密码"style="width: 100%" maxlength="18" name="password" type="password" required="required">
                            </div>
                            <div class="errorPrompt" id="loginError"><!--错误提示--></div>
                            <button id="login" style="cursor: pointer;">登 录</button>
                        </form>
                        <button style="cursor: pointer; background-color: #00aa00" onclick="location='{{ url('oAuth') }}'">微 信 登 录</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--底部-->
    @include('common.home_footer')
    <script>
        $(function(){
            $("#login").validate({
                errorElement : 'p',
                success : function (label) {
                    label.addClass('success');
                },
                rules:{
                    user_name:{
                        required:true
                    },
                    password:{
                        required:true
                    }
                },
                messages:{
                    user_name:{
                        required:"<span style='font-size: 12px;color: #fd5d0d;'>该用户名必填</span>"
                    },
                    password:{
                        required:"<span style='font-size: 12px;color: #fd5d0d;'>密码必填</span>"
                    }
                }
            })
        })
    </script>
@else
    <script>
        location.href='short';
    </script>
@endif
