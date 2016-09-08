<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <script src="home/js/b.js" charset="utf-8"></script>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>就租车吧—中国互联网租车领跑者,全国连锁.神速预订！</title>
    <meta name="description" content="SEO：描述内容">
    <meta name="keywords" content="SEO：站点关键字">
    <link type="text/css" rel="stylesheet" href="home/css/all.css">
    <link type="text/css" rel="stylesheet" href="home/css/calendar.css">
    <link type="text/css" rel="stylesheet" href="home/css/layer.css">
    <script type="text/javascript" src="home/js/jquery-1.js"></script>
    <script type="text/javascript" src="home/js/jquery.js"></script>
    <script type="text/javascript" src="home/js/api"></script>
    <script type="text/javascript" src="home/js/getscript"></script>
    <script type="text/javascript" src="home/js/ApiConfig.js"></script>
    <script type="text/javascript" src="home/js/layer.js"></script>
    <script type="text/javascript" src="home/js/dateRange.js"></script>
    <script type="text/javascript" src="home/js/dateTools.js"></script>
    <script type="text/javascript" src="home/js/all.js"></script>
    <script>
        var rh='';
        function IsPC() {
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }
        if (rh != 'pc') {
            if (!IsPC())
                location.href = "http://m.dafang24.com";
        }
    </script>
    <script src="home/js/bsl.js" charset="UTF-8" type="text/javascript"></script>
    <script src="home/js/Enter.js" charset="UTF-8" id="BridgeRCVEnter" type="text/javascript"></script>
    <script src="home/js/main_icon_invite_mess_api.js" charset="UTF-8" type="text/javascript"></script>
    <link href="home/css/main.css" type="text/css" rel="stylesheet">
    <link href="home/css/fix.css" type="text/css" rel="stylesheet">
</head>
<body>
<!--头部-->

<div class="top">
    <a id="ibangkf" href="http://www.ibangkf.com">客服系统</a>
    <script language="javascript" src="http://c.ibangkf.com/i/c-hhyhhy.js"></script>
    <div class="top_box">
        <a href="" rel="nofollow">中国互联网连锁租车品牌</a>
        <ul class="top_menu">
            <li class="top_user">
                @if(empty(Session::get('user_name')))
                <div class="no_user" style="display: block;">
                    <a href="login_reg" rel="nofollw">注册</a>
                    <a href="login" rel="nofollw">登陆</a>
                </div>
                @else
                <div class="yes_user" style="display: block;">
                    <a href="" rel="nofollow">{{ Session::get('user_name') }}</a>
                    <div class="arrow"><div></div></div>
                    <div class="userInfo">
                        <p><a href="{{ url('order') }}" rel="nofollow">订单管理</a></p>
                        <p><a href="{{ url('userInfo')}}" rel="nofollow">账户管理</a></p>
                        <p><a href="{{ url('logOut') }}">退出</a></p>
                    </div>
                </div>
                @endif
            </li>
            <li class="top_mobile">
                <a href="" target="_blank" rel="nofollow">
                    <i class="icon icon_phone"></i>
                    手机预订
                    <div class="QR_code">
                        <div class="QR_code_caret"></div>
                        <div class="QR_code_img"><img src="home/images/code.png"></div>
                        <div class="QR_code_text">扫一扫，即刻体验</div>
                    </div>
                </a>
            </li>
            <li class="top_phone">400-060-0112</li>
        </ul>
    </div>
</div>
<!--菜单-->
<div class="menu">
    <div>
        <i class="icon icon_logo"></i>
        <ul class="menu_box">
            <li class=" on_menu"><a href="{{ url('/') }}">首页</a></li>
            <li class=""><a href="{{ url('driving') }}">短租自驾</a></li>
            <li class=""><a href="lease_car">长租服务</a></li>
            <li class=""><a href="e_rent_car">企业租车</a></li>
            <li class=""><a href="" target="_blank">以租代购</a></li>
            <li class=""><a href="">门店查询</a></li>
            <li class=""><a href="">优惠活动</a></li>
            <li class="" id="last_menu"><a href="" target="_blank">招商加盟</a></li>
        </ul>
    </div>
</div>

<script>
    var page = ['index', 'driving', 'lease', 'firmcar', 'newcarshoping', 'citymap', 'newslist', 'jiameng'];
    jQuery(".menu_box li")[0].className = " on_menu";
    jQuery(page).each(function (i, obj) {
        jQuery(".menu_box li")[i].className = jQuery(".menu_box li")[i].className.replace("on_menu", " ");
        if (location.href.toLowerCase().indexOf(obj) > 1) {
            jQuery(".menu_box li")[i].className += " on_menu";
        }
    })
</script>