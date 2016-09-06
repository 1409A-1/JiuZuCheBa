<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <title>会员中心-优惠券</title>
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/all.css">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/user.css">
    <script type="text/javascript" src="../resources/assets/home/public/jquery-1.js"></script>
<body>

    <style>
        benefit{
            display: none;
        }
    </style>
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
            <a href="user_info" >账户信息</a>
            <a href="benefit_list"  class="active">优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="order shortOrder show">
                <h4>我的优惠券</h4>
                <div class="coupon">
                    <div class="coupon_tit">
                        <span class="active">未使用</span>
                        <span>已使用</span>
                        <span>已过期</span>
                    </div>
                     <span id="yh">
                          <!--未使用-->
                        <benefit style="display: block">
                            @if(array_key_exists(0,$yh))
                               @foreach($yh['0'] as $k=>$v)
                                 <ul class="order3">
                                   <li style="height: 122px">
                                     <div>
                                        <img src="../resources/assets/home/public/yh.jpg" alt="图片">
                                        <div class="info">
                                            <a>{{$v['benefit_name']}}</a>
                                        </div>
                                        <ul>
                                            <li class="time" style="margin-right: 200px">
                                                <div>
                                                    优惠开始<br>
                                                    {{date('y/m/d H:i:s',$v['begin_time'])}}
                                                </div>
                                                <div>
                                                    优惠结束<br>
                                                    {{date('y/m/d H:i:s',$v['end_time'])}}
                                                </div>
                                            </li>
                                            <li class="cen">优惠金额：￥{{$v['ord_price']}}</li>
                                        </ul>
                                     </div>
                                   </li>
                                 </ul>
                               @endforeach
                            @else
                                <div class="noMore">暂无此类优惠券...</div>
                            @endif
                        </benefit>
                          <!--已使用-->
                        <benefit>
                         @if(array_key_exists(1,$yh))
                             @foreach($yh['1'] as $k=>$v)
                                 <ul class="order3">
                                     <li style="height: 122px">
                                         <div>
                                             <img src="../resources/assets/home/public/yh.jpg" alt="图片">
                                             <div class="info">
                                                 <a>{{$v['benefit_name']}}</a>
                                             </div>
                                             <ul>
                                                 <li class="time" style="margin-right: 200px">
                                                     <div>
                                                         优惠开始<br>
                                                         {{date('y/m/d H:i:s',$v['begin_time'])}}
                                                     </div>
                                                     <div>
                                                         优惠结束<br>
                                                         {{date('y/m/d H:i:s',$v['end_time'])}}
                                                     </div>
                                                 </li>
                                                 <li class="cen">优惠金额：￥{{$v['ord_price']}}</li>
                                             </ul>
                                         </div>
                                     </li>
                                 </ul>
                             @endforeach
                         @else
                             <div class="noMore">暂无此类优惠券...</div>
                         @endif
                        </benefit>
                            <!--已过期-->
                        <benefit>
                            <!--未使用-->
                            @if(array_key_exists('old',$yh))
                                @foreach($yh['old'] as $k=>$v)
                                    <ul class="order3">
                                        <li style="height: 122px">
                                            <div>
                                                <img src="../resources/assets/home/public/yh.jpg" alt="图片">
                                                <div class="info">
                                                    <a>{{$v['benefit_name']}}</a>
                                                </div>
                                                <ul>
                                                    <li class="time" style="margin-right: 200px">
                                                        <div>
                                                            优惠开始<br>
                                                            {{date('y/m/d H:i:s',$v['begin_time'])}}
                                                        </div>
                                                        <div>
                                                            优惠结束<br>
                                                            {{date('y/m/d H:i:s',$v['end_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">优惠金额：￥{{$v['ord_price']}}</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @else
                                <div class="noMore">暂无此类优惠券...</div>
                            @endif
                        </benefit>
                        <!--暂无此类优惠券-->
                  </span>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        window.onload = function()
        {
            var $li = $('.coupon_tit span');
            var $div = $('#yh benefit');
            $li.click(function(){
                var $this = $(this);
                var $t = $this.index();
                $li.removeClass();
                $this.addClass('active');
                $div.css('display','none');
                $div.eq($t).css('display','block');
            })
        }
    });
</script>