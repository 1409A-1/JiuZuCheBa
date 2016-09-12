@include('common.home_header')
<link type="text/css" rel="stylesheet" href="home/css/orderFinish.css">

<script>
    eval('var result = ' + '{!! $info !!}');
</script>
<script type="text/javascript" src="home/js/orderFinish.js"></script>
<!--导航标题-->
<div class="title">
    <div class="titleL">当前位置：短租自驾 > 选择车型 > 提交订单 > 订单完成</div>
    <div class="titleR">
        <div>
            <hr class="ok">
            <h3 class="r1">1</h3>
            <h3 class="r2">2</h3>
            <h3 class="r3">3</h3>
        </div>
        <ul>
            <li>选择车型</li>
            <li>提交订单</li>
            <li>订单完成</li>
        </ul>
    </div>
</div>
<!--订单信息-->
<div class="orderInfoBox">
    <!--订单成功-->
    <div id="orderSuccess">
        <div class="orderList clear">
            <h2><p><a href="">返回订单中心</a></p></h2>
            <h3>感谢您，订单提交成功！</h3>
            <ul class="clear" id="orderInfo">
                <li class="l1">
                    应付总价：
                    <a></a>
                </li>
                <li class="orderNum l2">
                    订单号：
                    <a></a>
                </li>
                <li class="l3">
                    租车人：
                    <a></a>
                </li>
                <li class="l4">
                    租期：
                    <a></a>
                </li>
                <li class="l5">
                    取车时需要刷取预授权：
                    <a></a>
                </li>
            </ul>
            <p id="yifu_p" style="font-size:20px; color:red;"></p>
            <p>
                *就租车吧提醒您，请通过信用卡或银行交纳车辆预授权，以保障您的合法权益。
            </p>
        </div>
        <div class="orderInfo clear">
            <p>订单信息</p>
            <div class="YcarList clear">
                <img draggable="false" src="" id="carImg">
                <div class="carInfo">
                    <b></b>
                    <div class="carIcon">
                        <div>
                            <i class="icon icon_car1"></i>
                            <a></a>
                        </div>
                        <div>
                            <i class="icon icon_car2"></i>
                            <a></a>
                        </div>
                        <div>
                            <i class="icon icon_car3"></i>
                            <a></a>
                        </div>
                        <div>
                            <i class="icon icon_car4"></i>
                            <a></a>
                        </div>
                    </div>
                </div>
                <div class="timeCar clear" id="takeInfo">
                    <h4><p></p></h4>
                    <ul>
                        <li class="addH">
                            <span>取车时间：</span>
                            <a></a>
                        </li>
                        <li>
                            <span>取车地址：</span>
                            <a></a>
                        </li>
                    </ul>
                </div>
                <div class="timeCar clear" id="returnInfo">
                    <h4 class="carBack"><p></p></h4>
                    <ul>
                        <li class="addH">
                            <span>还车时间：</span>
                            <a id="time"></a>
                        </li>
                        <li>
                            <span>还车地址：</span>
                            <a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="go_carList">
            <a href="{{ url('orderInfo') }}?ord_id={{ $ord_id }}"><button style="cursor: pointer">订单详情</button></a>
            <a href="{{ url('zfbPay') }}?ord_sn={{ $ord_sn }}"><button style="cursor: pointer">在线支付</button></a>
        </div>
        <div class="YtextList">
            <div>
                <strong>如何取车</strong>
                <p>
                    1.取车时请携带本人有效身份证、驾照正副本、本人信用卡，取车时将冻结3,000元租车预授权。若无足额信用卡的，可由有信用卡的亲友担保<br/>
                    2.请您准时取车，超时取车，起租时间按预订取车时间起算。
                </p>
            </div>
            <div>
                <strong>退改规则</strong>
                <p>
                    修改或取消订单，请提前致电400 060 0112：取车时间在10:00-20:00时，请提前2小时申请；取车时间在10:00-20:00之外，请您尽早致电申请。<br/>
                    （小贴士：如果您修改订单或取消订单重新预订，价格可能会发生变化。）
                </p>
            </div>
        </div>
    </div>
    <!--订单失败-->
    <div id="orderFail">
        <div class="orderList orderLost">
            <h2><p><a href="">返回订单中心</a></p></h2>
            <h3>十分抱歉，您的订单提交失败！请联系 4000600112</h3>
        </div>
    </div>
    <form id="fm" action="">
        <input type="hidden" value="" name="out_trade_no" id="out_trade_no" />
        <input type="hidden" value="" name="subject" id="subject" />
        <input type="hidden" value="" name="total_fee" id="total_fee" />
    </form>
</div>
<!--底部-->
@include('common.home_footer')
