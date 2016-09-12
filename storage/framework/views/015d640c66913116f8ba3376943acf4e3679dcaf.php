<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <title>就租车吧—中国互联网租车领跑者,全国连锁.神速预订！</title>
    <meta name="description" content="SEO：描述内容">
    <meta name="keywords" content="SEO：站点关键字">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('home')); ?>/css/all.css">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('home')); ?>/css/calendar.css">
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('home')); ?>/css/layer.css">

    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/jquery-1.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/api"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/getscript"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/layer.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/ApiConfig.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/dateRange.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/dateTools.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('home')); ?>/js/all.js"></script>


    <link href="<?php echo e(asset('home')); ?>/css/main.css" type="text/css" rel="stylesheet">
    <link href="<?php echo e(asset('home')); ?>/css/fix.css" type="text/css" rel="stylesheet">

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
                <?php if(empty(Session::get('user_name'))): ?>
                <div class="no_user" style="display: block;">
                    <a href="loginReg" rel="nofollw">注册</a>
                    <a href="login" rel="nofollw">登陆</a>
                </div>
                <?php else: ?>
                <div class="yes_user" style="display: block;">
                    <a href="" rel="nofollow"><?php echo e(Session::get('user_name')); ?></a>
                    <div class="arrow"><div></div></div>
                    <div class="userInfo">
                        <p><a href="<?php echo e(url('userInfo')); ?>" rel="nofollow">账户管理</a></p>
                        <p><a href="<?php echo e(url('message')); ?>" rel="nofollow">公开留言</a></p>
                        <p><a href="<?php echo e(url('logout')); ?>">退出</a></p>

                    </div>
                </div>
                <?php endif; ?>
            </li>
            <li class="top_mobile">
                <a href="" target="_blank" rel="nofollow">
                    <i class="icon icon_phone"></i>
                    手机预订
                    <div class="QR_code">
                        <div class="QR_code_caret"></div>
                        <div class="QR_code_img"><img src="<?php echo e(asset('home')); ?>/images/code.png"></div>
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
            <li class=" on_menu"><a href="<?php echo e(url('/')); ?>">首页</a></li>
            <li class=""><a href="<?php echo e(url('short')); ?>">短租自驾</a></li>
            <li class=""><a href="<?php echo e(url('long')); ?>">长租服务</a></li>
        </ul>
    </div>
</div>

<script>
    var page = ['index', 'short', 'long'];
    jQuery(".menu_box li")[0].className = " on_menu";
    jQuery(page).each(function (i, obj) {
        jQuery(".menu_box li")[i].className = jQuery(".menu_box li")[i].className.replace("on_menu", " ");
        if (location.href.toLowerCase().indexOf(obj) > 1) {
            jQuery(".menu_box li")[i].className += " on_menu";
        }
    })
</script>
