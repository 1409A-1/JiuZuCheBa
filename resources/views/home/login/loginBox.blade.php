    <html lang="en"><head>
    <meta charset="UTF-8">
    <meta content="webkit" name="renderer">
    <title>登录</title>
    <script src="home/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="home/js/layer.js" type="text/javascript"></script>
    <style>
        *{margin: 0;padding: 0;font-family: "Microsoft YaHei",sans-serif}
        a:link,a:active,a:visited { text-decoration: none }
        button{outline:none;position: relative;overflow: hidden}
        button i{position: absolute;left: -100%;top: 0;width: 100%;height: 100%;background-image: -moz-linear-gradient(0deg,rgba(255,255,255,0),rgba(255,255,255,0.5),rgba(255,255,255,0));background-image: -webkit-linear-gradient(0deg,rgba(255,255,255,0),rgba(255,255,255,0.5),rgba(255,255,255,0));transform: skewx(-25deg);-o-transform: skewx(-25deg);-moz-transform: skewx(-25deg);-webkit-transform: skewx(-25deg)}
        button .active{left:100%;-moz-transition:0.5s;-o-transition:0.5s;-webkit-transition:0.5s;transition:0.5s;}
        /*登录框*/
        .loginBox{width: 286px;background: #fff;padding: 30px}
        .loginBox>div{width: 286px;padding-bottom: 10px;-moz-user-select: none;-webkit-user-select: none;-ms-user-select: none;user-select: none;}
        .loginBox input{width: 240px;height: 30px;line-height: 30px;text-indent: 10px;outline:none;border: 0;color: #949494}
        .loginBox button{width: 100%;height: 40px;background: #337bd7;color: #fff;font-size: 13px;border: 0;margin-top: 10px;position: relative;overflow: hidden}
        /*标题*/
        .loginBox .title{width: 100%;height: 38px;border-bottom: 2px solid #C5C5C5;}
        .loginBox .title>div{width: 50px;height: 38px;border-bottom: 2px solid #337bd7;color: #337bd7;font-size: 25px;float: left}
        .loginBox .title>span{float: right;color: #c5c5c5;font-size: 12px;margin-top: 20px}
        .loginBox .title>span a{color: #337bd7;cursor: pointer}
        /*输入*/
        .input_body{margin-top: 30px;}
        .input_body .active{border-color: #337bd7;}
        .input_body .active::after,
        .input_body .active::before{background: #337bd7;}
        .input_body .active input{color: #337bd7;}
        .inputBox{width: 100%;height: 30px;border-bottom: 1px solid #c5c5c5;color:#c5c5c5;position: relative}
        .inputBox::after,.inputBox::before{content: ''; width: 1px ;height: 7px;background:#c5c5c5;position: absolute;bottom: 0}
        .inputBox::after{right: 0}
        .inputBox::before{left: 0}
        .infoBox .error{border-color: #FF6666}
        .infoBox .error::after,
        .infoBox .error::before{background: #FF6666;}
        .infoBox .error input{color: #FF6666}
        .errorPrompt{width: 100%;height: 16px;text-align: center;text-shadow: 2px 2px 10px #fff;font-size: 12px;color: #FF6666;margin-top:20px}
        #login_pw0{display: none}
        /*登录*/
        .login .inputBox{margin-top: 50px;}
        .forgetPw{float: right;color: #c5c5c5;font-size: 12px;margin-top: 10px}
        .forgetPw:hover{color: #337bd7;cursor: pointer}
        .login .errorPrompt{margin-top: 30px}

        /*icon*/
        .icon_login{display:inline-block;background: url("home/images/login/icon.png") no-repeat;float: right;}
        .icon_l1{width: 12px;height: 18px;background-position:-21px 0;margin-top: 6px;margin-right: 10px}
        .icon_l11{width: 12px;height: 18px;background-position:-21px -19px;margin-top: 6px;margin-right: 10px}
        .icon_l2{width: 20px;height: 12px;background-position:-33px -3px;margin-top: 9px;margin-right: 6px}
        .icon_l22{width: 20px;height: 12px;background-position:-33px -22px;margin-top: 9px;margin-right: 6px}
    </style>
</head>
<body>
<!--登录注册-->
<div class="loginBox">
    <div>
        <div class="login">
            <div class="title">
                <div>登录</div>
                <span>没有账号？<a target="_blank" href="{{ url('register') }}">立即注册</a></span>
            </div>
            <div class="input_body">
                <div id="login_name_box" class="inputBox">
                    <input type="tel" id="login_name" maxlength="11" placeholder="我的用户名">
                    <!-- <i class="icon_login icon_l1"></i> -->
                </div>
                <div id="login_pw_box" class="inputBox">
                    <input type="password" id="login_pw" maxlength="18" placeholder="我的密码">
                    <input type="text" id="login_pw0" maxlength="18" value="我的密码">
                    <!-- <i class="icon_login icon_l2"></i> -->
                </div>
                <div id="loginError" class="errorPrompt"></div>
                <button id="login" style="cursor: pointer">登 录<i></i></button>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{session('path')}}" id="path"/>
</div>
<script>
    $(function () {
        IE8();
        var phone = $("#login_name"),
                pw = $("#login_pw"),
                phoneBox = $("#login_name_box"),
                pwBox = $("#login_pw_box"),
                error = $("#loginError"),
                // phoneReg = /^0?(13[0-9]|14[0-9]|15[0-9]|16[0-9]|17[0-9]|18[0-9]|19[0-9])[0-9]{8}$/;
                phoneReg = /^[\w_]{1,10}$/;

        //手机号
        phone.focus(function () {
            phoneBox.addClass("active")
                    .find("i").removeClass("icon_l1").addClass("icon_l11");
            $(this).bind('keyup', function () {
                phoneBox.removeClass("error");
                error.html("");
            });
        })
            .blur(function () {
                phoneBox.removeClass("active error")
                    .find("i").removeClass("icon_l11").addClass("icon_l1");
            });
        //密码
        pw.focus(function () {
            pwBox.addClass("active")
                    .find("i").removeClass("icon_l2").addClass("icon_l22");
            $(this).bind('keyup', function () {
                pwBox.removeClass("error");
                error.html("");
            });
        })
            .blur(function () {
                pwBox.removeClass("active error")
                    .find("i").removeClass("icon_l22").addClass("icon_l2");
            });

        //登录按钮
        $("#login").click(function () {
            $(this).attr("disabled", true);
            $("#login").find("i").addClass("hover");
            setTimeout(function () {
                $("#login").find("i").removeClass("hover");
            }, 1000);
            var loginInfo = {
                "account": phone.val(),
                "password": pw.val(),
                "_token": '{{ csrf_token() }}'
            };
            if (phone.val() == "") {
                phone.focus();
                error.html("请输入用户名");
                phoneBox.addClass("error");
            } else {
                if (phoneReg.test(phone.val())) {
                    if (pw.val() == "") {
                        pw.focus();
                        error.html("请输入密码");
                        pwBox.addClass("error");
                    } else {
                        if (pw.val().length < 6) {
                            pw.focus();
                            error.html("密码至少6位");
                            pwBox.addClass("error");
                        } else {
                            loginProving(loginInfo);//判断账号密码是否匹配
                        }
                    }
                }
                else {
                    phone.focus();
                    error.html("用户名不符合要求！只能使用数字、字母、下划线！");
                    phoneBox.addClass("error");
                }
            }
            $(this).attr("disabled", false);
        });
    });
    //登录验证
    function loginProving(loginInfo) {
        var error=$("#loginError");
        jQuery.ajax({
            // url: login_customer_url,
            // dataType: 'jsonp',
            url: "{{  url('loginPro') }}",
            dataType: 'json',
            data: loginInfo,
            type: 'post',
            success: function (result) {
                if (result > 0) {
                    error.html("登录成功！");
                    // $.cookie("login_user", JSON.stringify(result.customer), { expires: 7, path: "/" });
                    // $.cookie("login_token", result.token, { expires: 7, path: "/" });
                    // $.cookie("login_hyzxcx", JSON.stringify(result.checkstatus), { expires: 7, path: "/" });
                    top.location.href = 'short';
                } else {
                    var msg = "";
                    switch (result) {
                        case -1:
                            msg = "账号或密码错误！";
                            break;
                        case -2:
                            msg = "连续尝试5次登录失败，已经被锁定，请10分钟之后再试！";
                            break;
                        case -3:
                            msg = "今天连续10次尝试登录失败，账户将自动锁定，请明天再试！";
                            break;
                        default:
                            msg = "服务器出错！";
                            break;
                    }
                    error.html(msg);
                }
            }
        });
    }
    //IE8、9下input placeholder属性不兼容
    function IE8() {
        var loPhone = $("#login_name"),//登录
                loPw = $("#login_pw"),
                loPw0 = $("#login_pw0");

        if ($.browser.msie && ($.browser.version == "8.0" || "9.0")) {
            loPhone.val("我的手机号")
                    .focus(function () {
                        if ($(this).val() == "我的手机号") {
                            $(this).val("")
                        }
                    })
                    .blur(function () {
                        if ($(this).val() == "") {
                            $(this).val("我的手机号")
                        }
                    });

            //密码框
            loPw.hide();//登录
            loPw0.show();

            //登录 密码
            loPw0.focus(function () {
                $(this).hide();
                loPw.show().focus();
            });
            loPw.blur(function () {
                if ($(this).val() == "") {
                    loPw.hide();
                    loPw0.show();
                }
            });

        }
    }
</script>
</body>
</html>