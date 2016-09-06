<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <title>会员中心-订单信息</title>
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/all.css">
    <link type="text/css" rel="stylesheet" href="../resources/assets/home/public/user.css">
    <script type="text/javascript" src="../resources/assets/home/public/jquery-1.js"></script>
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
            <a href="order_list" class="active">订单列表</a>
            <a id="topingjia">评价订单</a>
            <h5>账户管理</h5>
            <a href="user_info" >账户信息</a>
            <a href="benefit_list" >优惠券</a>
        </div>
        <div class="right">
            <!--我的主页-->
            <div class="order shortOrder show">
                <h4>短租订单</h4>
                <ul class="order1">
                    <li class="active">全部订单</li>
                    <li>预约中<a></a></li>
                    <li>租赁中<a></a></li>
                    <li>已完成<a></a></li>
                    <li>已取消<a></a></li>
                </ul>
            {{--全部订单--}}
              <div id="show">
                    <span style="display: block">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                            @if(array_key_exists('all',$order))
                               @foreach($order['all'] as $k=>$v)
                                 <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a>{{$v['ord_sn']}}</h5>
                                            <div>
                                                <img src="" alt="{{$v['car_img']}}">
                                                <div class="info">
                                                    <a>{{$v['car_name']}}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{date('Y/m/d H:i',$v['dep_time'])}}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{date('Y/m/d H:i',$v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥{{$v['ord_price']}}</li>
                                                    <li class="state">
                                                       @if($v['ord_pay']==0)
                                                            <a>未付款</a>
                                                       @elseif($v['ord_pay']==1)
                                                            <a>已付款 未提车</a>
                                                       @elseif($v['ord_pay']==2)
                                                            <a>车辆使用中</a>
                                                       @elseif($v['ord_pay']==3)
                                                            <a>完成</a>
                                                       @elseif($v['ord_pay']==4)
                                                            <a>待评价</a>
                                                       @elseif($v['ord_pay']==5)
                                                            <a>订单已取消</a>
                                                       @elseif($v['ord_pay']==6)
                                                            <a> 预约中</a>
                                                       @endif
                                                    </li>
                                                    @if($v['ord_pay']==0)
                                                        <li class="cen">取消订单</li>
                                                    @elseif($v['ord_pay']==1)
                                                        <li class="cen">取消订单</li>
                                                    @elseif($v['ord_pay']==2)
                                                        <li class="cen">车辆使用中</li>
                                                    @elseif($v['ord_pay']==3)
                                                        <li class="cen">去评价</li>
                                                    @elseif($v['ord_pay']==4)
                                                        <li class="cen">去评价</li>
                                                    @elseif($v['ord_pay']==5)
                                                        <li class="cen">删除订单</li>
                                                    @elseif($v['ord_pay']==6)
                                                        <li class="cen">查看详情</li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                               @endforeach
                            @else
                                <p class="noMore">暂无订单...</p>
                            @endif
                    </span>
                    {{--预约中--}}
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        {{--订单展示页面--}}
                        @if(array_key_exists(6,$order))
                            @foreach($order['6'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a>{{$v['ord_sn']}}</h5>
                                            <div>
                                                <img src="" alt="{{$v['car_img']}}">
                                                <div class="info">
                                                    <a>{{$v['car_name']}}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{date('Y/m/d H:i',$v['dep_time'])}}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{date('Y/m/d H:i',$v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥{{$v['ord_price']}}</li>
                                                    <li class="state">
                                                            <a> 预约中</a></li>
                                                        <li class="cen">取消订单</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无订单...</p>
                        @endif
                    </span>

                    {{--租赁中--}}
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        @if(array_key_exists(2,$order))
                            @foreach($order['2'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a>{{$v['ord_sn']}}</h5>
                                            <div>
                                                <img src="" alt="{{$v['car_img']}}">
                                                <div class="info">
                                                    <a>{{$v['car_name']}}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{date('Y/m/d H:i',$v['dep_time'])}}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{date('Y/m/d H:i',$v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥{{$v['ord_price']}}</li>
                                                    <li class="state">
                                                        <a> 租赁中</a></li>
                                                    <li class="cen">详情查看</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无订单...</p>
                        @endif
                    </span>

                    {{--已完成--}}
                    <span style="display: none">
                        <ul class="order2">
                            <li style="width: 440px">订单详情</li>
                            <li>时间</li>
                            <li>支付金额</li>
                            <li>订单状态</li>
                            <li>操作</li>
                        </ul>
                        <ul class="order3"></ul>
                        @if(array_key_exists(3,$order))
                            @foreach($order['3'] as $k=>$v)
                                <div class="No">
                                    <ul class="order3">
                                        <li>
                                            <h5><a>订单号：</a>{{$v['ord_sn']}}</h5>
                                            <div>
                                                <img src="" alt="{{$v['car_img']}}">
                                                <div class="info">
                                                    <a>{{$v['car_name']}}</a>
                                                    <div class="carIcon">
                                                        <div>
                                                            <i class="icon icon_car1"></i>
                                                            <a>三厢</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car2"></i>
                                                            <a>手动</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car3"></i>
                                                            <a>1.4L</a>
                                                        </div>
                                                        <div>
                                                            <i class="icon icon_car4"></i>
                                                            <a>乘坐5人</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li class="time">
                                                        <div>
                                                            取车时间<br>
                                                            {{date('Y/m/d H:i',$v['dep_time'])}}
                                                        </div>
                                                        <div>
                                                            还车时间<br>
                                                            {{date('Y/m/d H:i',$v['des_time'])}}
                                                        </div>
                                                    </li>
                                                    <li class="cen">总额：￥{{$v['ord_price']}}</li>
                                                    <li class="state">
                                                        <a> 完成</a></li>
                                                    <li class="cen">详情查看</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <p class="noMore">暂无订单...</p>
                        @endif
                    </span>

                    {{--已取消 --}}
                    <span style="display: none">
                    <ul class="order2">
                        <li style="width: 440px">订单详情</li>
                        <li>时间</li>
                        <li>支付金额</li>
                        <li>订单状态</li>
                        <li>操作</li>
                    </ul>
                    <ul class="order3"></ul>
                    @if(array_key_exists(5,$order))
                        @foreach($order['5'] as $k=>$v)
                            <div class="No">
                                <ul class="order3">
                                    <li>
                                        <h5><a>订单号：</a>{{$v['ord_sn']}}</h5>
                                        <div>
                                            <img src="" alt="{{$v['car_img']}}">
                                            <div class="info">
                                                <a>{{$v['car_name']}}</a>
                                                <div class="carIcon">
                                                    <div>
                                                        <i class="icon icon_car1"></i>
                                                        <a>三厢</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car2"></i>
                                                        <a>手动</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car3"></i>
                                                        <a>1.4L</a>
                                                    </div>
                                                    <div>
                                                        <i class="icon icon_car4"></i>
                                                        <a>乘坐5人</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li class="time">
                                                    <div>
                                                        取车时间<br>
                                                        {{date('Y/m/d H:i',$v['dep_time'])}}
                                                    </div>
                                                    <div>
                                                        还车时间<br>
                                                        {{date('Y/m/d H:i',$v['des_time'])}}
                                                    </div>
                                                </li>
                                                <li class="cen">总额：￥{{$v['ord_price']}}</li>
                                                <li class="state">
                                                    <a> 订单已取消</a></li>
                                                <li class="cen">详情查看</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    @else
                        <p class="noMore">暂无订单...</p>
                    @endif
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
            var $li = $('.order1 li');
            var $div = $('#show span');
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