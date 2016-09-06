<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <title>会员中心-个人信息</title>
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/all.css">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/user.css">
<body>
    <!--头部-->
    <ins id="qiao-wrap">
        <ins style="position: fixed; bottom: 0px;" class="qiao-flash-storage" id="qiao-flash-storage">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" id="FlashLocalStorage" align="middle" height="5" width="5">
                <param name="wmode" value="transparent"><param name="allowscriptaccess" value="always"><param name="movie" value="http://webim.qiao.baidu.com/f/pool/swf/local_storage.swf">
                <embed wmode="transparent" allowscriptaccess="always" src="../resources/assets/home/public/local_storage.swf" name="FlashLocalStorage" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" align="middle" height="5" width="5">
            </object></ins><ins style="visibility: hidden; display: none;" class="qiao-invite-wrap" id="qiao-invite-wrap"><ins class="qiao-invite-decoration"></ins><ins style="visibility: hidden;" class="qiao-invite-text"><p style="font-size:12px;font-family:宋体;font-color:#000000;">欢迎您，有什么可以帮助您的么？</p>
            </ins><ins class="qiao-invite-accept">现在咨询</ins><a class="qiao-invite-reject">稍后再说</a><a class="qiao-invite-close"></a><ins class="qiao-invite-form"><ins class="qiao-invite-form-inner"><textarea placeholder="您可直接在这里和我们联系！" class="qiao-invite-input"></textarea><a class="qiao-invite-send">发送</a></ins></ins></ins><ins style="visibility: hidden; display: none;" class="qiao-mess-wrap" id="qiao-mess-wrap"><ins class="qiao-mess-container" id="qiao-mess-container"><ins class="qiao-mess-head" id="qiao-mess-head"><ins id="qiao-mess-head-text" class="qiao-mess-head-text"></ins><a id="qiao-mess-head-close" data-status="max" class="qiao-mess-head-close"></a></ins><ins class="qiao-mess-body" id="qiao-mess-body"><iframe src="" style="display: none;" name="qiao-mess-iframe" id="qiao-mess-iframe"></iframe><form accept-charset="utf-8" action="http://qiao.baidu.com/v3/?module=default&amp;controller=index&amp;action=doMess&amp;siteid=6567291&amp;page_id=&amp;ucid=2941205" target="qiao-mess-iframe" method="post" class="qiao-mess-form qiao-mess-clearfix"><ins class="qiao-mess-clearfix"><ins class="qiao-mess-clearfix qiao-mess-item-mess"><ins style="display:none">留言内容</ins><textarea name="bd_bp_messText" class="" placeholder="请在此输入留言内容，我们会尽快与您联系。"></textarea><ins class="qiao-mess-star">*</ins></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">姓名<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messName" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">电话<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messPhone" class="qiao-mess-item-body" placeholder="请输入您的电话号码"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">地址<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messAddress" class="qiao-mess-item-body" placeholder="最多100个字符"></ins></ins><ins class="qiao-mess-item qiao-mess-clearfix"><ins class="qiao-mess-item-head">邮箱<ins class="qiao-mess-star" style="display:none">*</ins></ins><ins class="qiao-mess-input-wrap"><input name="bd_bp_messEmail" class="qiao-mess-item-body" placeholder="请输入合法邮箱名"></ins></ins><input style="display:none" value="大方租车—中国互联网租车领跑者,全国连锁.神速预订,48元起！" name="bd_bp_title" type="hidden"><input style="display:none" value="https://www.baidu.com/link?url=rBH8duhEszxR6WomeRnDLFrl4bnR8jhj-C2noO_xI2p_W5tZzyGs2rBgLdMEsVLj&amp;wd=&amp;eqid=e84d05c40006e7ee0000000257c61d1c" name="bd_bp_referer" type="hidden"><input style="display:none" value="1472601430611" name="bd_bp_tick" type="hidden"><input style="display:none" value="" name="bd_bp_bid" type="hidden"></form></ins><ins class="qiao-mess-foot" id="qiao-mess-foot"><a id="qiao-mess-foot-send-btn" class="qiao-mess-foot-send-btn">发送</a><ins class="qiao-mess-foot-logo"></ins></ins></ins></ins></ins><div class="top">    <div class="top_box">
        <a href="http://www.dafang24.com/" rel="nofollow">中国互联网连锁租车品牌</a>
        <ul class="top_menu">
            <li class="top_user">
                <div style="display: none;" class="no_user">
                    <a href="" rel="nofollow">注册</a>
                    <a href="" rel="nofollow">登录</a>
                </div>
                <div class="yes_user">
                    <a href="" rel="nofollow">{{ Session::get('user_name') }}</a>
                    <div class="arrow"><div></div></div>
                    <div class="userInfo">
                        <a href="user_info" rel="nofollow">账户管理</a>
                        <a href="message" rel="nofollow">公开留言</a>
                        <a href="login_out">退出</a>
                    </div>
                </div>
            </li>
            <li class="top_mobile">
                <a href="" target="_blank" rel="nofollow">
                    <i class="icon icon_phone"></i>
                    手机预订
                    <div class="QR_code">
                        <div class="QR_code_caret"></div>
                        <div class="QR_code_img"><img src="../resources/assets/home/public/code.png"></div>
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
            <li class=""><a href="">首页</a></li>
            <li class=""><a href="">短租自驾</a></li>
            <li class=""><a href="">长租服务</a></li>
            <li class=""><a href="">企业租车</a></li>
            <li class=""><a href="" target="_blank">以租代购</a></li>
            <li class=""><a href="">门店查询</a></li>
            <li class=""><a href="">优惠活动</a></li>
            <li class="" id="last_menu"><a href="" target="_blank">招商加盟</a></li>
        </ul>
    </div>
</div>
<!--内容-->
<div class="userBox">
    <div>
        <div class="left">
            <h5 id="toIndex">我的主页</h5>
            <h5>订单管理</h5>
            <a href="order_list">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a id="toUser" class="active">账户信息</a>
            <a href="benefit_list">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="index">

            </div>
           <!--账户信息-->
            <div class="user_info" style="display: block;">
                <h4>账户信息</h4>
                <div class="user_info1">
                    基本信息
                    <ul>
                        <li>
                            <a>*</a> 姓名：
                            <input value="{{ $info['user_name'] }}" id="name" style="margin-left:45px" type="text">
                        </li>
                        <li style="position:relative">
                            <a>*</a> 手机号：
                            <input value="{{ $info['tel'] }}" disabled id="phone" style="margin-left:58px;" type="text">
                        </li>
                        <li>
                            <a>&nbsp;</a> 紧急联系人：
                            <input id="name1" type="text">
                        </li>
                        <li>
                            <a>&nbsp;</a> 紧急联系人手机：
                            <input id="phone1" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info2">
                    重要信息
                    <ul>
                        <li>
                            <a style="color:#FD1E2E">&nbsp;&nbsp;</a> 身份证号码：
                            <input id="identity_card_no" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info2">
                    其它联系方式
                    <ul>
                        <li>
                            QQ：
                            <input id="qq" style="margin-left:60px" type="text">
                        </li>
                        <li style="margin-left:82px">
                            邮箱：
                            <input id="email" style="margin-left:78px" type="text">
                        </li>
                    </ul>
                </div>
                <div class="user_info3">
                    确认修改
                    <ul>
                        <li>
                            <a href="update_pass"><button id="toUpdatePw">修改密码</button></a>
                        </li>
                    </ul>
                </div>
                <button id="confirm">确认修改<i></i></button>
            </div>
        </div>
    </div>
</div>
    <!--底部-->
<div class="footer">
    <div class="footerBox">
        <ul class="f1">
            <li>
                <h4>租车预订说明</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/1" target="_blank">服务时间</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/2" target="_blank">服务预订</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/3" target="_blank">租车资格</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/5" target="_blank">预定流程</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/6" target="_blank">取还车说明</a>
            </li>
            <li>
                <h4>会员管理</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/7" target="_blank">会员章程</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/8" target="_blank">会员细则</a>
            </li>
            <li>
                <h4>紧急事务处理</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/9" target="_blank">保险责任</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/18" target="_blank">事故处理</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/19" target="_blank">紧急救援</a>
            </li>
            <li>
                <h4>费用及理赔</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/10" target="_blank">费用说明</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/11" target="_blank">理赔说明</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/14" target="_blank">常见问题</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/13" target="_blank">注意事项</a>
            </li>
            <li>
                <h4>帮助中心</h4>
                <a href="http://www.dafang24.com/Home/HelpDetails/17" target="_blank">联系我们</a>
                <a href="http://www.dafang24.com/Home/HelpDetails/22" target="_blank">招聘英才</a><br>
                <a href="http://www.dafang24.com/Home/HelpDetails/35" target="_blank">关于我们</a>
            </li>
        </ul>
        <div class="f2">
            <div class="f3">
                <div>
                    <a href="http://www.dafang24.com/Home/NewsList?t_id=3">新闻资讯</a>
                    <a href="http://www.dafang24.com/home/appraise">客户评价</a>
                    <a href="http://www.dafang24.com/Home/NewsList?t_id=43">租车攻略</a>
                </div>
                <p>
                    COPYRIGHT©2011-2016 DAFANG24.COM ALL RIGHTS RESERVED.&nbsp;&nbsp;
                    武汉大方汽车租赁有限公司&nbsp;&nbsp;
                    版权所有&nbsp;&nbsp;
                    鄂ICP备&nbsp;11005157号-3
                </p>
            </div>
            <div class="f4">
                <i class="icon icon_message"></i>
                <h1>400 060 0112</h1>
                <h2>WEB@DAFANG24.COM</h2>
            </div>
        </div>
        <div class="f5">
            <div class="f6">
                <span>战略合作伙伴</span>
                <i class="icon_2 icon2_baidu"></i>
                <i class="icon_2 icon2_163"></i>
                <i class="icon_2 icon2_sohu"></i>
                <i class="icon_2 icon2_58"></i>
                <i class="icon_2 icon2_sina"></i>
                <i class="icon_2 icon2_jrtt"></i>
            </div>
            <div class="f7">
                <span>资质证书</span>
                <i class="icon_2 icon2_kx"></i>
                <i class="icon_2 icon2_360"></i>
            </div>
        </div>
        <div class="f8">
            友情链接：
            <div>
                    <a href="http://www.fuhai68.com/" target="_blank">黄江二手车</a>
                    <a href="http://www.weihk.cn/" target="_blank">香港购物</a>
                    <a href="http://www.kaihuacar.com/" target="_blank">事故车交易网</a>
                    <a href="http://www.zyczg.com/" target="_blank">专用车中国</a>
                    <a href="http://travel.ptotour.com/" target="_blank">旅游攻略</a>
                    <a href="http://www.baicheng.com/" target="_blank">百程旅行网</a>
                    <a href="http://www.qulv.com/" target="_blank">趣旅网</a>
                    <a href="http://sh.zyue.com/" target="_blank">上海学车网</a>
                    <a href="http://www.shiyan.cc/" target="_blank">十堰旅行社</a>
                    <a href="http://www.huizuche.com/" target="_blank">国际租车</a>
                    <a href="http://www.cx580.com/" target="_blank">违章代办</a>
                    <a href="http://jiaxiao.jsyks.com/" target="_blank">驾校考试网</a>
                    <a href="http://www.023yts.com/" target="_blank">重庆旅行社报价</a>
                    <a href="http://wuhan.gongjiao.com/" target="_blank">武汉公交</a>
                    <a href="http://www.hbcct.com.cn/" target="_blank">武汉旅行社</a>
                    <a href="http://wuhan.cncn.com/" target="_blank">武汉旅游攻略</a>
                    <a href="http://www.99ly.com.cn/" target="_blank">青年旅行社</a>
                    <a href="http://www.ganji.com/sunata/" target="_blank">二手索纳塔</a>
                    <a href="http://www.ganji.com/qida/" target="_blank">二手骐达 </a>
            </div>
        </div>
    </div>
</div>