@include('common.home_header')
<link type="text/css" rel="stylesheet" href="{{asset('home')}}/css/submitOrder.css">
<script>
    eval('var result = ' + '{!! $info !!}');
</script>
<script type="text/javascript" src="{{asset('home')}}/js/orderDetail.js"></script>
<!--导航标题-->
<div class="title">
    <div class="titleL">当前位置：订单管理 > 短租订单 > 订单详情</div>
</div>
<!--订单信息-->
<div class="orderInfoBox" style="min-height: 600px">
    <div class="left" style="position:relative;">
        <h4>订单详情</h4>
        <ul class="basicInfo">
            <li>订单号：<a></a></li>
            <li>取车时请携带：<a>身份证、驾驶证和信用卡</a></li>
            <li>订单状态：<a></a></li>
            <li>预授权金额：<a></a></li>
        </ul>
        <!--基本信息-->
        <div class="carInfo">
            <div class="carInfoL">
                <img src="">
                租期：<b></b>
            </div>
            <div class="carInfoR">
                <!--车辆信息-->
                <h2></h2>
                <div class="carIcon">
                    <i class="icon icon_car1"></i>
                    <a></a>
                    <i class="icon icon_car2"></i>
                    <a></a>
                    <i class="icon icon_car3"></i>
                    <a></a>
                    <i class="icon icon_car4"></i>
                    <a></a>
                </div>
                <!--优惠信息-->
                <div class="discountInfo">
                    <span>优惠信息：</span>
                    <a>暂无优惠信息</a>
                </div>
                <!--取还车信息-->
                <div class="storeInfo">
                    <div class="storeInfoL">
                        <div class="take">取</div>
                        <div class="return">还</div>
                    </div>
                    <div class="storeInfoR">
                        <h5></h5>
                        <p>
                            取车时间：<a></a><br>
                            取车地址：<a></a>
                        </p>

                        <h5></h5>
                        <p>
                            还车时间：<a  id="time"></a><br>
                            还车地址：<a></a>
                        </p>
                    </div>
                </div>
                <div class="contactphone">

                </div>
            </div>
        </div>
    </div>
    <div class="right">
        <h4>费用明细</h4>
        <ul>
            <li>
                基本租车费<a id="discount"><!--优惠金额--></a>
                <div class="basicPrice">
                    <b><!--基本租车费--></b>
                    <div></div>
                </div>
                <ul class="priceDetail"><!--每日价格--></ul>
            </li>
            <li id="basic">
                基本保险费<a></a>
                <b></b>
            </li>
            <li id="counterFee">
                手续费
                <b></b>
            </li>
            <li class="differentStore">
                异店还车费
                <b>0</b>
            </li>
            <li class="yesGo">
                <c></c>
                <b></b>
            </li>
            <li id="yifu">
                已付
                <b></b>
            </li>
            <li style="border-bottom:none;">应付总金额 ：<b style="float:right;font-size: 16px;color: #ea5506;">元</b> <b id="sumPrice"></b></li>
        </ul>
        <a href="{{ url('zfbPay') }}?ord_sn={{ $ord_sn }}">
            <div id="ysq_button" style="cursor:pointer;display:none;height:40px;width:100px;top:120px;right:26px;text-align:center;line-height:40px;border-radius:4px;background-color:#ea5506;color:#fff;float: right; margin-right: 20px">
            立即支付
            </div>
        </a>
    </div>
</div>
<form id="fm" action="/usercenter/Alipay">
    <input type="hidden" value="" name="out_trade_no" id="out_trade_no" />
    <input type="hidden" value="" name="subject" id="subject" />
    <input type="hidden" value="" name="total_fee" id="total_fee" />
</form>
<!--底部-->
@include('common.home_footer')