@if(empty(session('user_name')))
    @include('common.home_header')
    <link type="text/css" rel="stylesheet" href="home/css/login.css">
    <script type="text/javascript" src="home/js/jquery-validate.js"></script>
    <!--登录注册-->
    <div class="infoBox noCopy">
        <div>
            <!--登录-->
            <div class="login">
                <div class="title">
                    <div>登录</div>
                    <span>没有账号？<a href="{{ URL('loginReg') }}">立即注册</a></span>
                </div>
                <div class="input_body">
                    <form action="loginPro" method="post" id="login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="inputBox" id="login_name_box">
                            <input placeholder="我的用户名" style="width: 100%;" maxlength="11" name="user_name" type="tel" required="required">
                            {{--<i class="icon_login icon_l1"></i>--}}
                        </div>
                        <div class="inputBox" id="login_pw_box">
                            <input placeholder="我的密码"style="width: 100%" maxlength="18" name="password" type="password" required="required">
                            {{--<i class="icon_login icon_l2"></i>--}}
                        </div>
                        <span class="forgetPw">忘记密码？</span>
                        <div class="errorPrompt" id="loginError"><!--错误提示--></div>
                        <button id="login" style="cursor: pointer;">登 录</button>
                        <button style="cursor: pointer; background-color: #00aa00" onclick="location='{{ url('oAuth') }}'">微 信 登 录</button>
                    </form>
                </div>
            </div>
            <!--忘记密码-->
            <div class="findPw">
                <div class="title">
                    <div>找回密码</div>
                    <span><a id="return1">返回登录</a></span>
                </div>
                <div class="input_body">
                    <div class="inputBox" id="find_name_box">
                        <input placeholder="请输入手机号码" maxlength="11" id="find_name" type="tel">
                        <i class="icon_login icon_l1"></i>
                    </div>
                    <div class="dx_code">
                        <input placeholder="请输入短信验证码" maxlength="6" id="find_code" type="text">
                        <button id="find_send_code">发送验证码</button>
                    </div>
                    <div class="errorPrompt" id="findError"><!--错误提示--></div>
                    <button id="find">确认找回<i></i></button>
                </div>
            </div>
            <!--修改密码-->
            <div class="changePw">
                <div class="title">
                    <div>修改密码</div>
                    <span><a id="return2">返回登录</a></span>
                </div>
                <div class="input_body">
                    <div class="inputBox" id="ch_pw1_box">
                        <input placeholder="请输入6位以上密码" maxlength="18" id="ch_pw1" type="password">
                        <input value="请输入6位以上密码" maxlength="18" id="ch_pw10" type="text">
                        <i class="icon_login icon_l2"></i>
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
