var Customer = JSON.parse(jQuery.cookie("login_user"));

$(function () {
    loginInfo();//判断是否登录
});
//登录信息
function loginInfo() {
    if (Customer && Customer.customer_id>0) {
        $(".no_user").hide();
        $(".yes_user").show();
        $(".yes_user>a").html(Customer.customer_name);
    }
}
function exit() {
    jQuery.cookie("login_user", null, { expires: 0, path: "/" });
    jQuery.cookie("login_token", null, { expires: 0, path: "/" });
    window.location.reload();
}

//IE8不支持 JS indexOf方法，在此判断并添加该方法
function index_Of() {
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function (elt /*, from*/) {
            var len = this.length >>> 0;
            var from = Number(arguments[1]) || 0;
            from = (from < 0)
                ? Math.ceil(from)
                : Math.floor(from);
            if (from < 0)
                from += len;
            for (; from < len; from++) {
                if (from in this &&
                    this[from] === elt)
                    return from;
            }
            return -1;
        };
    }
}

//百度离线宝
function baidu_lxb() {
    //使用提示
    $("#telInput").focus(function () {
        $(".explain").slideDown(300);
    });
    $(".phone").hover(function () { }, function () {
        $("#telInput").blur();
        $(".explain").slideUp(300)
    });

    //拨打电话
    document.getElementById("callBtn").onclick = function () {
        lxb.call(document.getElementById("telInput"));
    };
}

//cookies 设置
function setCookie(c_name, value, expiredays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + expiredays);
    document.cookie = c_name + "=" + escape(value) +
        ((expiredays == null) ? "" : ";expires=" + exdate.toGMTString())
}
//取值
function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    //return "";
}

//计算页码
function page_number(x, y) {
    var a = x / y,
        b = parseInt(x / y);
    if (a > b)
        return b + 1;
    else
        return b;
}

//幻灯片
function slide() {
    var p = $(".img li");
    p.eq(0).addClass("active");//默认显示第一张图片
    for (var i = 0; i < p.length; i++) $(".tit").append("<li></li>");
    var t = $(".tit li");
    t.eq(0).addClass("active");
    t.eq(t.length - 1).addClass("last_tit");
    t.hover(function () {
        t.removeClass("active");
        $(this).addClass("active");
        var num = t.index($(this));
        p.removeClass("active").eq(num).addClass("active");
    });
    var m = 0;
    function roll() {//滚动
        t.eq(m).removeClass("active");
        p.eq(m).removeClass("active");
        if (m == p.length - 1)
            m = -1;
        t.eq(m + 1).addClass("active");
        p.eq(m + 1).addClass("active");
        m++;
    }
    var autoMove = setInterval(roll, 5000);//定时滚动
    $(".slide").hover(function () {//鼠标悬浮在幻灯片上方时停止滚动
        clearInterval(autoMove);
    }, function () {
        autoMove = setInterval(roll, 5000);
    });
}