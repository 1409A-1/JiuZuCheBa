@if(empty(session('user_name')))
    @include('common.home_header')
    <link type="text/css" rel="stylesheet" href="home/css/login.css">
    <script type="text/javascript" src="home/js/login.js"></script>
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
                        <div class="inputBox" id="login_name_box">
                            <input placeholder="我的用户名" maxlength="11" id="login_name" type="tel">
                            <!-- <i class="icon_login icon_l1"></i> -->
                        </div>
                        <div class="inputBox" id="login_pw_box">
                            <input placeholder="我的密码" maxlength="18" id="login_pw" type="password">
                            <!-- <i class="icon_login icon_l2"></i> -->
                        </div>
                        <span class="forgetPw">忘记密码？</span>
                        <div class="errorPrompt" id="loginError"><!--错误提示--></div>
                        <button id="login" style="cursor: pointer">登 录<i></i></button>
                        <button style="cursor: pointer; background-color: #00aa00" onclick="location='{{ url('oAuth') }}'">微 信 登 录</button>
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
                          <div style="font-size:12px;color:#615656;margin-top:5px;">*如果一分钟内没有收到校验短信，您可以再次点击获取“发送验证码”，此服务免费。</div>
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
                        <div class="inputBox" id="ch_pw2_box">
                            <input placeholder="请再次确认密码" maxlength="18" id="ch_pw2" type="password">
                            <input value="请再次确认密码" maxlength="18" id="ch_pw20" type="text">
                            <i class="icon_login icon_l2"></i>
                        </div>
                        <div class="errorPrompt" id="chError"><!--错误提示--></div>
                        <button id="ch">确认修改<i></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--底部-->
    @include('common.home_footer')
@else
    <script>
        window.location.href = "short";
    </script>
@endif
