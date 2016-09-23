var _token = $("meta[name='_token']").attr('content');

$(function(){
    if(Customer&&Customer.customer_id){
        location.href = '/usercenter/myorder';
    }else{
        registerEvent();//注册
        // IE8();
    }
});

//注册
function registerEvent() {
    var reg_code = $("#reg_code"),
        name=$("#reg_name"),
        phone=$("#reg_phone"),
        pw=$("#reg_pw"),
        code = $("#reg_send_code"),
        nameBox = $("#reg_name_box"),
        phoneBox=$("#reg_phone_box"),

        pwBox=$("#reg_pw_box"),
        error=$("#regError"),
        nameReg = /^[\w_]{1,10}$/;
        phoneReg = /^0?(13[0-9]|15[0-35-9]|18[0-9]|14[57]|17[0-9])[0-9]{8}$/;

    //用户名
    name.focus(function(){
        nameBox.addClass("active")
            .find("i").removeClass("icon_l3").addClass("icon_l33");
        $(this).bind('keyup', function(){
            nameBox.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
        nameBox.removeClass("active error")
            .find("i").removeClass("icon_l33").addClass("icon_l3");
    });
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
    //密码
    pw.focus(function(){
        pwBox.addClass("active")
            .find("i").removeClass("icon_l2").addClass("icon_l22");
        $(this).bind('keyup', function(){
            pwBox.removeClass("error");
            error.html("");
        });
    })
        .blur(function(){
        pwBox.removeClass("active error")
            .find("i").removeClass("icon_l22").addClass("icon_l2");

    });
    //短信验证码 输入
    reg_code.focus(function(){
            $(this).addClass("active").bind('keyup', function(){
                reg_code.removeClass("error");
                error.html("");
            });
        })
        .blur(function(){
            reg_code.removeClass("active error");
        });
    //短信验证码 发送
    code.click(function(){
        //手机号
        if(phone.val()==""){
            phone.focus();
            error.html("请输入手机号码");
            phoneBox.addClass("error");
            return;
        }
        if(!phoneReg.test(phone.val())){
            phone.focus();
            error.html("手机号码不正确");
            phoneBox.addClass("error");
            return;
        }
        //密码
        if(pw.val()==""){
            pw.focus();
            error.html("请输入密码");
            pwBox.addClass("error");return;
        }
        if(pw.val().length<6){
            pw.focus();
            error.html("密码至少6位");
            pwBox.addClass("error");return;
        }
        code.attr("disabled", true).html("发送中");
        sendCode(phone.val());//发送验证码
    });


    //注册按钮
    $("#reg").click(function(){
        $("#reg").find("i").addClass("active");
        setTimeout(function(){
            $("#reg").find("i").removeClass("active");
        }, 1000);
        //用户名
        if (name.val() == "") {
            name.focus();
            error.html("请输入用户名");
            nameBox.addClass("error");
            return;
        }
        if(!nameReg.test(name.val())){
            name.focus();
            error.html("用户名不符合要求！只能使用数字、字母、下划线！");
            nameBox.addClass("error");
            return;
        }
        //手机号
        if(phone.val()=="" || phone.val()=="请输入手机号码"){
            phone.focus();
            error.html("请输入手机号码");
            phoneBox.addClass("error");
            return;
        }
        if(!phoneReg.test(phone.val())){
            phone.focus();
            error.html("手机号码不正确");
            phoneBox.addClass("error");
            return;
        }
        //密码
        if(pw.val()==""){
            pw.focus();
            error.html("请输入密码");
            pwBox.addClass("error");return;
        }
        if(pw.val().length<6){
            pw.focus();
            error.html("密码至少6位");
            pwBox.addClass("error");return;
        }
        //短信验证码
        if(reg_code.val()=="" || reg_code.val()=="请输入短信验证码"){
            reg_code.focus();
            error.html("请输入短信验证码");return;
        }

        //此处为机构id编号 (add 2016-08-04 ck)
        //添加门店唯一标识码，会员注册扫描二维码解析网址获得门店唯一码，根据门店唯一码判别当前会员所属门店
        // var re = /^[0-9]*[1-9][0-9]*$/;
        // var num=GetQueryString("key");
        // if (!re.test(num)) {
        //     num = 0;
        // }

        var data={
            "name": $("#reg_name").val(),
            "phone": $("#reg_phone").val(),
            "password": $("#reg_pw").val(),
            "customer_source": 1,
            // "shopkey": num,
            "_token": _token
        };
        // data.dx_code=reg_code.val();//用户输入的短信验证码

        register(data);//注册请求
    });

    //用户协议
    $("#win").click(function(){
        layer.open({
            type: 1,
            area: ['816px', '560px'],
            shade: [0.8, '#000'],
            scrollbar: false,
            title: '用户协议',
            content: $(".protocol")
        });
    });
}

//注册 发送验证码
function sendCode(phone){
    var button=$("#reg_send_code");
    $.ajax({
        url: sendnumreg,//注册短信验证码发送  接口
        data: { "phone": phone },
        dataType: 'jsonp',
        success: function (result) {
            //判断发送是否成功
            if (result.state == 1) {
                //发送成功
                layer.tips('短信发送成功', button,{tips: [2, '#0FA6D8']});
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
                //var msg = "验证码发送失败";
                //layer.tips(msg, button, { tips: [2, '#0FA6D8'] });
                //button.html("发送验证码");
                //button.attr("disabled", false);

                switch (result.state) {
                    case -2:
                        msg = "手机号不能为空.";
                        break;
                    case -3:
                        msg = "手机号已被注册.";
                        break;
                    case -4:
                        msg = "验证码错误.";
                        break;
                    default:
                        msg = "服务器错误,请稍候再试.";
                }
                layer.tips(msg, '#reg', { tips: [2, '#0FA6D8'] });
                $("#reg").attr("disabled", false).html("注 册");
            }
        },
        error: function () {
            layer.tips('远程服务器出错了', button, { tips: [2, '#0FA6D8'] });
            button.html("发送验证码");
            button.attr("disabled", false);
        }
    })
}

//注册请求
function register(data) {
    //不再使用手机验证码，直接使用注册ajax
    $.ajax({
        // url: register_customer_url_new,
        // dataType: 'jsonp',
        url: registerPro,
        dataType: 'json',
        data: data,
        type: 'post',
        success: function (result) {
            if (result > 0) {
                // $.cookie("login_user", JSON.stringify(result.customer), { expires: 7, path: "/" });
                // $.cookie("login_token", result.token, { expires: 7, path: "/" });
                
                msg = '注册成功！';
                layer.tips(msg, '#reg', { tips: [2, '#0FA6D8'] });
                setTimeout(function () { location.href = 'short' }, 2000);
            }
            else {
                //此处加一个 短信验证码错误  的状态
                //例如：result.state=-4  表示短信验证码错误
                switch (result) {
                    case -1:
                        msg = '用户名已存在！';
                        break;
                    case -2:
                        msg = "手机号已被注册！";
                        break;
                    case -3:
                        msg = "验证码错误！";
                        break;
                    default:
                        msg = "服务器错误,请稍候再试！";
                }
                layer.tips(msg, '#reg', { tips: [2, '#0FA6D8'] });
                $("#reg_phone").val('');
                $("#reg_pw").val('');
                $("#reg_code").val('');
                $("#reg").attr("disabled", false).html("注 册");
            }
        },
        error: function () {
            msg = '远程服务器出错了';
            layer.tips(msg, '#reg', { tips: [2, '#0FA6D8'] });
            $("#reg").attr("disabled", false).html("注 册");
        }
    })
    //先验证验证码是否正确
    // var phone = $("#reg_phone").val();
    // var code = $("#reg_code").val();

    // $("#reg").attr("disabled", true).html("请求中...");
    // var msg;

    // $.ajax({
    //     url: sendnumreg,
    //     dataType: 'jsonp',
    //     data: { "phone": phone, code: code },
    //     success: function (result) {
    //         if (result.state == 2) {
    //             // 原注册ajax，已放在上面直接登陆，跳过手机验证码
    //         } else if (result.state == -4) {
    //             layer.tips('验证码错误', '#regError', { tips: [2, '#0FA6D8'] });
    //             $("#reg").attr("disabled", false).html("注册")
    //         }
    //     },
    //     error: function () {
    //          layer.tips('远程服务器出错了', '#find', { tips: [2, '#0FA6D8'] });
    //          button.attr("disabled", false);
    //     }
    // });    
}

//IE8、9下input placeholder属性不兼容
// function IE8(){
//     var rePhone=$("#reg_phone"),
//         rePw=$("#reg_pw"),
//         rePw0=$("#reg_pw0"),
//         reCode=$("#reg_code");

//     if($.browser.msie&&($.browser.version == "8.0"||"9.0")){
//         rePhone.val("请输入手机号码")
//             .focus(function(){
//                 if($(this).val()=="请输入手机号码"){
//                     $(this).val("")
//                 }
//             })
//             .blur(function(){
//                 if($(this).val()==""){
//                     $(this).val("请输入手机号码")
//                 }
//             });
//         reCode.val("请输入短信验证码")
//             .focus(function(){
//                 if($(this).val()=="请输入短信验证码"){
//                     $(this).val("")
//                 }
//             })
//             .blur(function(){
//                 if($(this).val()==""){
//                     $(this).val("请输入短信验证码")
//                 }
//             });

//         //密码框
//         rePw.hide();//注册
//         rePw0.show();

//         //注册 密码
//         rePw0.focus(function(){
//             $(this).hide();
//             rePw.show().focus();
//         });
//         rePw.blur(function(){
//             if($(this).val()==""){
//                 rePw.hide();
//                 rePw0.show();
//             }
//         });
//     }
// }

//(add 2016-08-04 ck)用正则表达式获取地址栏参数：（ 强烈推荐，既实用又方便！）
function GetQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}