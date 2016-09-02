$(function(){
    if(Customer&&Customer.customer_id){
        //location.href='userIndex.html'
        login();//登录
        findPw();//找回密码
        changePw();//修改密码
        IE8();
    }else{
        login();//登录
        findPw();//找回密码
        changePw();//修改密码
        IE8();
    }
});

//登录
function login() {
    var phone = $("#login_name"),
        pw = $("#login_pw"),
        phoneBox = $("#login_name_box"),
        pwBox = $("#login_pw_box"),
        error = $("#loginError"),
        phoneReg = /^0?(13[0-9]|15[0-35-9]|18[0-9]|14[57]|17[0678])[0-9]{8}$/;

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
            "login_ip": loginIP,
            "password": pw.val(),
            "isbind": '',
            "openid": ''
        };
        if (phone.val() == "") {
            phone.focus();
            error.html("请输入手机号码");
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
                error.html("手机号码不正确");
                phoneBox.addClass("error");
            }
        }
        $(this).attr("disabled", false);
    });

    //忘记密码
    $(".forgetPw").click(function () {
        $(".login").hide();
        $(".findPw").show();
    });
}

//登录验证
function loginProving(loginInfo) {
    var error=$("#loginError");
    jQuery.ajax({
        url: login_customer_url,
        dataType: 'jsonp',
        data: loginInfo,
        success: function (result) {
            if (result.state > 0) {
                error.html("登录成功");
                $.cookie("login_user", JSON.stringify(result.customer), { expires: 7, path: "/" });
                $.cookie("login_token", result.token, { expires: 7, path: "/" });
                $.cookie("login_hyzxcx", JSON.stringify(result.checkstatus), { expires: 7, path: "/" });
                if (localStorage.getItem("page_jump") == 501) {
                    location.href = '/usercenter/myorder';//回到订单页
                } else {
                    window.location.href = "/home/index";
                }
            } else {
                var msg = "";
                switch (result.state) {
                    case -1:
                        msg = "账号或密码错误.";
                        break;
                    case -2:
                        msg = "连续尝试5次登录失败，已经被锁定，请10分钟之后再试.";
                        break;
                    case -3:
                        msg = "今天连续10次尝试登录失败，账户将自动锁定，请明天再试.";
                        break;
                    default:
                        msg = "服务器出错.";
                        break;
                }
                error.html(msg);
            }
        }
    });
}

//找回密码 发送验证码
function sendCode(phone,code){
    var button;
    if(code){//检验验证码
        button=$("#find");
        button.attr('disabled', true).css({"background":"#ddd"});
        $.ajax({
            url: lookpassword,
            data: { "phone": phone ,code:code },
            dataType: 'jsonp',
            success: function (result) {
                if (result.state == 2) {
                    $(".findPw").hide();
                    $(".changePw").show().attr({'phone':$("#find_name").val()});
                } else {
                    var msg = "";
                    switch (result.state) {
                        case -1:
                            msg = "验证码发送失败，请稍后重试";
                            break;
                        case -2:
                            msg = "该手机号未注册";
                            break;
                        case -3:
                            msg = "验证码不正确.";
                            break;
                        default:
                            msg = "失败!";
                            break;
                    }
                    layer.tips(msg, '#find',{tips: [2, '#0FA6D8']});
                    button.attr("disabled", false);
                }
            },
            error: function () {
                layer.tips('远程服务器出错了', '#find',{tips: [2, '#0FA6D8']});
                button.attr("disabled", false);
            }
        })
    }else{//发送验证码
        button=$("#find_send_code");
        $.ajax({
            url: lookpassword,
            data: { "phone": phone },
            dataType: 'jsonp',
            success: function (result) {
                if (result.state == 1) {
                    //验证码发送成功
                    layer.tips('短信发送成功', '#find_send_code',{tips: [2, '#0FA6D8']});
                    var sec=60,
                        timing=setInterval(function(){
                            button.html(""+sec+"秒后可重新发送");
                            if(sec==0){
                                clearInterval(timing);
                                button.attr("disabled", false).html("发送验证码");
                            }
                            sec--;
                        },1000);
                } else {
                    var msg = "";
                    switch (result.state) {
                        case -1:
                            msg = "验证码发送失败.";
                            break;
                        case -2:
                            msg = "未找到该手机号注册记录.";
                            break;
                        default:
                            msg = "失败!";
                            break;
                    }
                    layer.tips(msg, '#find_send_code',{tips: [2, '#0FA6D8']});
                    button.attr("disabled", false);
                }
            },
            error: function () {
                layer.tips('远程服务器出错了', '#find_send_code',{tips: [2, '#0FA6D8']});
                button.attr("disabled", false);
            }
        })
    }

}

//找回密码
function findPw(){
    //返回登录
    $("#return1").click(function(){
        $(".findPw").hide();
        $(".login").show();
    });

    var phone=$("#find_name"),
        phoneBox=$("#find_name_box"),
        error=$("#findError"),
        code=$("#find_send_code"),
        find_code=$("#find_code"),
        phoneReg=/^0?(13[0-9]|15[0-35-9]|18[0-9]|14[57]|17[0678])[0-9]{8}$/;

    //手机号
    phone.focus(function(){
        phoneBox.addClass("active")
            .find("i").removeClass("icon_l1").addClass("icon_l11");
        $(this).bind('keyup', function(){
            phoneBox.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
            phoneBox.removeClass("active error")
                .find("i").removeClass("icon_l11").addClass("icon_l1");
        });
    //短信验证码 输入
    find_code.focus(function(){
        $(this).addClass("active").bind('keyup', function(){
            find_code.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
            find_code.removeClass("active error");
        });

    //短信验证码 发送
    code.click(function(){
        if(phone.val()==""){
            phone.focus();
            error.html("请输入手机号码");
            phoneBox.addClass("error");
        }else{
            if(phoneReg.test(phone.val())){
                code.attr("disabled", true).html("发送中");
                sendCode(phone.val());//发送验证码
            }
            else{
                phone.focus();
                error.html("手机号码不正确");
                phoneBox.addClass("error");
            }
        }
    });

    //确认找回 按钮
    $("#find").click(function(){
        $(this).find("i").addClass("hover");
        setTimeout(function(){
            $("#find").find("i").removeClass("hover");
        },1000);

        if(phone.val()==""){
            phone.focus();
            error.html("请输入手机号码");
            phoneBox.addClass("error");
        }else{
            if(phoneReg.test(phone.val())){
                if(find_code.val()==""){
                    find_code.focus();
                    error.html("请输入短信验证码");
                    find_code.addClass("error");
                }else{
                    sendCode(phone.val(),find_code.val());
                }
            }else{
                phone.focus();
                error.html("手机号码不正确");
                phoneBox.addClass("error");
            }
        }
    });
}

//修改密码
function changePw(){
    //返回登录
    $("#return2").click(function(){
        $(".changePw").hide();
        $(".login").show();
    });

    var pw1=$("#ch_pw1"),
        pw2=$("#ch_pw2"),
        pwBox1=$("#ch_pw1_box"),
        pwBox2=$("#ch_pw2_box"),
        error=$("#chError"),
        button=$("#ch");

    //密码
    pw1.focus(function(){
        pwBox1.addClass("active")
            .find("i").removeClass("icon_l2").addClass("icon_l22");
        $(this).bind('keyup', function(){
            pwBox1.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
            pwBox1.removeClass("active error")
                .find("i").removeClass("icon_l22").addClass("icon_l2");
        });
    //密码 确认
    pw2.focus(function(){
        pwBox2.addClass("active")
            .find("i").removeClass("icon_l2").addClass("icon_l22");
        $(this).bind('keyup', function(){
            pwBox2.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
            pwBox2.removeClass("active error")
                .find("i").removeClass("icon_l22").addClass("icon_l2");
        });

    //确认修改 按钮
    button.click(function(){
        $(this).find("i").addClass("hover");
        setTimeout(function(){
            $("#ch").find("i").removeClass("hover");
        },1000);
        if(pw1.val()==""){
            pw1.focus();
            error.html("请输入密码");
            pwBox1.addClass("error");
        }else{
            if(pw1.val().length<6){
                pw1.focus();
                error.html("密码至少6位");
                pwBox1.addClass("error");
            }else{
                if(pw2.val()==""){
                    pw2.focus();
                    error.html("请输入确认密码");
                    pwBox2.addClass("error");
                }else{
                    if(pw1.val()!=pw2.val()){
                        pw2.focus();
                        error.html("两次密码不一致");
                        pwBox2.addClass("error");
                    }else{
                        button.attr('disabled', true).css({"background":"#ddd"});
                        $.ajax({
                            url: updatepassword,
                            data: {
                                phone: $(".changePw").attr('phone'),
                                password:pw1.val()
                            },
                            dataType: 'jsonp',
                            success: function (r) {
                                if (r<0) {
                                    var msg = "";
                                    switch (r) {
                                        case -1:
                                            msg = '修改失败';
                                            break;
                                        case -2:
                                            msg = '参数错误';
                                            break;
                                        case -200:
                                            msg = '输入原始的密码不正确';
                                            break;
                                    }
                                    layer.tips(msg, '#ch',{tips: [1, '#0FA6D8']});
                                    button.attr('disabled', false).css({"background":"#ea5506"});
                                }
                                else {
                                    layer.tips('修改成功！', '#ch',{tips: [1, '#0FA6D8']});
                                    setTimeout(function () { location.href = '/home/index'; }, 2000);
                                }
                            },
                            error: function () {
                                layer.tips('服务器错误,请稍后再试', '#ch',{tips: [1, '#0FA6D8']});
                                button.attr('disabled', false).css({"background":"#ea5506"});
                            }
                        });
                    }
                }
            }
        }
    });
}

//IE8、9下input placeholder属性不兼容
function IE8(){
    var loPhone=$("#login_name"),//登录
        loPw=$("#login_pw"),
        loPw0=$("#login_pw0"),
        findPhone=$("#find_name"),//找回密码
        findCode=$("#find_code"),
        pw1=$("#ch_pw1"),//修改 密码
        pw10=$("#ch_pw10"),
        pw2=$("#ch_pw2"),
        pw20=$("#ch_pw20");

    if($.browser.msie&&($.browser.version == "8.0"||"9.0")){
        loPhone.val("我的手机号")
            .focus(function(){
                if($(this).val()=="我的手机号"){
                    $(this).val("")
                }
            })
            .blur(function(){
                if($(this).val()==""){
                    $(this).val("我的手机号")
                }
            });
        findPhone.val("请输入手机号码")
            .focus(function(){
                if($(this).val()=="请输入手机号码"){
                    $(this).val("")
                }
            })
            .blur(function(){
                if($(this).val()==""){
                    $(this).val("请输入手机号码")
                }
            });
        findCode.val("请输入短信验证码")
            .focus(function(){
                if($(this).val()=="请输入短信验证码"){
                    $(this).val("")
                }
            })
            .blur(function(){
                if($(this).val()==""){
                    $(this).val("请输入短信验证码")
                }
            });

        //密码框
        loPw.hide();//登录
        loPw0.show();

        pw1.hide();//修改
        pw10.show();
        pw2.hide();
        pw20.show();

        //登录 密码
        loPw0.focus(function(){
            $(this).hide();
            loPw.show().focus();
        });
        loPw.blur(function(){
            if($(this).val()==""){
                loPw.hide();
                loPw0.show();
            }
        });

        //修改 密码
        pw10.focus(function(){
            $(this).hide();
            pw1.show().focus();
        });//密码
        pw1.blur(function(){
            if($(this).val()==""){
                pw1.hide();
                pw10.show();
            }
        });
        pw20.focus(function(){
            $(this).hide();
            pw2.show().focus();
        });//确认密码
        pw2.blur(function(){
            if($(this).val()==""){
                pw2.hide();
                pw20.show();
            }
        });
    }
}